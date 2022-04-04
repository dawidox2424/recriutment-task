<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){
            if (!$this->isPost()) {
                if ($_COOKIE['loggedUser']) {
                    $this->render('dashboard');
                } else
                return $this->render('login');
            }

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['Nie znaleziono takiego użytkownika.']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Użytkownik o podanym e-mailu nie istnieje!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Podałeś złe hasło!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function register(){
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $pesel = $_POST['pesel'];
        $email = $_POST['email'];
        $confirmedEmail = $_POST['confirmedEmail'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $phone = $_POST['phone'];
        $zipcode = $_POST['zipcode'];
        $street = $_POST['street'];
        $buildingNumber = $_POST['buildingNumber'];
        $apartmentNumber = $_POST['apartmentNumber'];
        $district = $_POST['district'];
        $captcha = $_POST['g-recaptcha-response'];

        if(empty($name)) {
            return $this->render('register', ['messages' => ['Wpisz proszę swoje Imię!']]);
        }
        if(empty($surname)) {
            return $this->render('register', ['messages' => ['Wpisz proszę swoje Nazwisko!']]);
        }

        if (!empty($pesel)) {
            if (!preg_match('/^[0-9]{11}$/', $pesel)) {
                return $this->render('register', ['messages' => ['Podany przez ciebie PESEL nie składa się z 11 cyfr!']]);
            }
            $arrWagi = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
            $intSum = 0;

            for ($i = 0; $i < 10; $i++) {
                $intSum += $arrWagi[$i] * $pesel[$i];
            }

            $int = 10 - $intSum % 10;
            $intControlNr = ($int == 10)?0:$int;

            if (!$intControlNr == $pesel[10]){
                return $this->render('register', ['messages' => ['Podany przez Ciebie PESEL jest błędny (walidacja wagowa)']]);
            }
        }

        if (empty($email)) {
            return $this->render('register', ['messages' => ['Wpisz proszę swój adres email!']]);
        }

        if (empty($password)) {
            return $this->render('register', ['messages' => ['Wpisz proszę swoje hasło!']]);
        }

        if (empty($phone)) {
            return $this->render('register', ['messages' => ['Wpisz proszę swój numer telefonu!']]);
        }

        if (empty($street)) {
            return $this->render('register', ['messages' => ['Wpisz proszę nazwę swojej ulicy!']]);
        }

        if (empty($buildingNumber)) {
            return $this->render('register', ['messages' => ['Wpisz proszę swój numer budynku!']]);
        }

        if (empty($district)) {
            return $this->render('register', ['messages' => ['Wybierz proszę z listy twoją dzielnicę!']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Sprawdź proszę poprawność haseł!']]);
        }

        if ($email !== $confirmedEmail) {
            return $this->render('register', ['messages' => ['Sprawdź proszę poprawność adresów email!']]);
        }
        if (!preg_match('/^([0-9]{2})(-[0-9]{3})?$/i', $zipcode)) {
            return $this->render('register', ['messages' => ['Podany przez ciebie kod pocztowy jest w złym formacie!']]);
        }

         if($this->userRepository->checkDatabaseForEmail($email)){
             return $this->render('register', ['messages' => ['Niestety, podany przez ciebie adres mailowy jest już zajęty!']]);
         }

        if (!($captcha)) {
            return $this->render('register', ['messages' => ['Zaznacz proszę weryfikację "nie jestem robotem"!']]);
        } else {
            $secret = '6LdOd0MfAAAAADPARY4hxW-4rxJvSx8mNdUxWxYv';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha);
            $responseData = json_decode($verifyResponse);

            if (!($responseData->success)){
                return $this->render('register', ['messages' => ['Błąd weryfikacji recaptcha!']]);
            }
        }

        $user = new User($name, $surname, $pesel, $email, md5($password), $phone, $zipcode, $street, $buildingNumber,
            $apartmentNumber, $district);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['Gratulację, zostałeś zarejestrowany!']]);
    }
}