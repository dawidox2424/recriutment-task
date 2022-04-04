<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Grafitti.php';
require_once __DIR__ . '/../repository/GrafittiRepository.php';
require_once __DIR__ . '/../repository/PropertyRepository.php';

class GrafittiController extends AppController
{
    private GrafittiRepository $GrafittiRepository;
    private PropertyRepository $PropertyRepository;

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../../public/uploads/';

    public function __construct()
    {
        parent::__construct();
        $this->GrafittiRepository = new GrafittiRepository();
        $this->PropertyRepository = new PropertyRepository();

    }

    public function grafittiForm(){
        if ($_COOKIE['loggedUser']) {

            $allProperties = $this -> PropertyRepository -> getAllProperties();

            return $this->render('grafittiForm', ['allProperties' => $allProperties]);
        }

        if (!$_COOKIE['loggedUser']) {
            return $this->render('login', ['messages' => ['Nie możesz zgłosić grafitti nie będąć zalogowanym!']]);
        }
    }


    public function addGrafitti(){

        $notifierEmail = $_POST['notifierEmail'];
        $id_property = $_POST['id_property'];
        $location = $_POST['location'];
        $photo = $_FILES['file']['name'];
        $findingDate = $_POST['findingDate'];
        $type = $_POST['type'];
        $remarks = $_POST['remarks'];


        if(empty($id_property)) {
            return $this->render('grafittiForm', ['messages' => ['Wybierz proszę adres nieruchomości!']]);
        }
        if(empty($location)) {
            return $this->render('grafittiForm', ['messages' => ['Wpisz proszę lokalizację nielegalnych napisów!']]);
        }

        set_time_limit(0);
        ini_set('upload_max_filesize', '50M');
        ini_set('post_max_size', '50M');
        ini_set('max_input_time', 4000); // Play with the values
        ini_set('max_execution_time', 4000); // Play with the values


        if(empty($photo)) {
            return $this->render('grafittiForm', ['messages' => ['Wrzuć proszę zdjęcie nielegalnych napisów!']]);
        } else if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            $destination = $this->base_path() . '/public/uploads/';
            $fileLocation = $destination . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
        }


        if(empty($findingDate)) {
            return $this->render('grafittiForm', ['messages' => ['Wybierz proszę datę znalezenia grafitti!']]);
        }
        if(empty($type)) {
            return $this->render('grafittiForm', ['messages' => ['Wybierz proszę rodzaj nielegalnych napisów!']]);
        }

        $grafitti = new Grafitti($notifierEmail, $id_property, $fileLocation, $_FILES['file']['name'], $findingDate, $type, $remarks);

        $this->GrafittiRepository->addGrafitti($grafitti); //dodanie do bazy

        $property = $this -> PropertyRepository -> getPropertyById($id_property);
        $propertyName = $property['name'];
        $propertyStreet = $property['street'];
        $propertyNumber = $property['number'];

        $grafitti = array(
            "notifierEmail" => $notifierEmail,
            "propertyName" => $propertyName,
            "propertyStreet" => $propertyStreet,
            "propertyNumber" => $propertyNumber,
            "location" => $location,
            "findingDate" => $findingDate,
            "type" => $type,
            "remarks" => $remarks,
            "photo" => $photo,
        );

        return $this->render('summary', ['grafitti' => $grafitti]);
    }

    private function validate(array $file): bool {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'Plik jest za duży i przekracza dopuszczalną wielkość!';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'Sprawdź proszę, czy wysłałeś plik o odpowiednim rozszerzeniu.';
            return false;
        }
        return true;
    }

    function base_path(){
        return realpath(__DIR__ . '/../..');
    }

}