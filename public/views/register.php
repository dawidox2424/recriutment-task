<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Rejestracja</title>
</head>

<body>
<div class="container">
    <div class="logo">
    </div>
    <div class="login-container">
        <form class="register" action="register" method="POST">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <a href="login"><button>Masz już konto? ZALOGUJ SIĘ</button></a>
            <h3>Dane osobowe</h3>
            <input name="name" type="text" placeholder="Imię">
            <input name="surname" type="text" placeholder="Nazwisko">
            <input name="pesel" type="text" placeholder="Numer PESEL">

            <h3>Dane logowania</h3>
            <input name="email" type="text" placeholder="Twój e-mail">
            <input name="repeatedEmail" type="text" placeholder="Powtórz e-mail">
            <input name="password" type="password" placeholder="Twoje hasło">
            <p>Hasło musi mieć co najmniej 8 znaków, w tym: 1 dużą literę,
                1 małą literę, 1 cyfrę lub znak specjalny wybrany spośród następujących: _ . , : ; ! ? @ # $ % & ~ ' ` * ^ + - = ( ) [ ] < > \ / |.
                Hasło nie może zawierać polskich znaków.</p>
            <input name="repeatedPassword" type="password" placeholder="Powtórz hasło">
            <input name="phoneNumber" type="text" placeholder="Twój numer telefonu">

            <h3>Adres zamieszkania</h3>
            <p>Miasto: Kraków</p>
            <input name="zipCode" type="text" placeholder="Kod pocztowy">
            <input name="street" type="text" placeholder="Ulica">
            <input name="number" type="text" placeholder="Ulica">
            <input name="district" type="text" placeholder="Ulica">


            <h3>Oświadczenia</h3>
            <p><b>Akceptuję Regulamin Konta Portalu Magiczny Kraków, www.krakow.pl *<b/></p>

            <p>Zgodnie z art. 13 ust. 1 i 2 unijnego ogólnego rozporządzenia o ochronie danych (tzw. RODO) informujemy - że administratorem danych osobowych
                jest Prezydent Miasta Krakowa z siedzibą Pl. Wszystkich Świętych 3-4, 31-004 Kraków i są one podawane w zakresie: imię i nazwisko,
                adres e-mail w celu: otrzymywania informacji o działaniach podejmowanych w związku z budżetem obywatelskim Miasta Krakowa.</p>

            <p><b>Oświadczam, że wyrażam zgodę na przetwarzanie moich danych osobowych w powyższym zakresie i celu.<b/></p>

            <p>Informujemy, że:
                1. Użytkownik ma prawo w dowolnym momencie wycofać niniejszą zgodę, przy czym jej wycofanie nie wpływa na zgodność z prawem przetwarzania, którego dokonano na podstawie tejże zgody przed jej wycofaniem.
                2. Masz prawo do żądania od administratora dostępu do Twoich danych osobowych, ich sprostowania, usunięcia lub ograniczenia przetwarzania, a także prawo do przenoszenia danych.
                3. Dane osobowe będą przechowywane do czasu wycofania zgody lub usunięcia konta.
                4. Odbiorcą Twoich danych osobowych jest Akademickie Centrum Komputerowe Cyfronet w Krakowie.
                5. Użytkownik ma prawo do wniesienia skargi do organu nadzorczego, którym jest Prezes Urzędu Ochrony Danych Osobowych.
                6. Podanie danych osobowych ma charakter dobrowolny.
                7. Konsekwencją niepodania danych jest brak możliwości otrzymywania informacji o działaniach podejmowanych w związku z budżetem obywatelskim Miasta Krakowa.
                8. Administrator nie przewiduje profilowania na podstawie podanych danych osobowych.
                9. Podstawę prawną przetwarzania Twoich danych stanowi art. 6 ust. 1 lit. a) RODO, tzn. dane będą przetwarzane na podstawie Twojej zgody.

                Dane kontaktowe Inspektora Ochrony Danych: e-mail: iod@um.krakow.pl; adres pocztowy: pl. Wszystkich Świętych 3-4, 31-004 Kraków</p>

            <p><b>Oświadczam, że zapoznałem/-am się z treścią powyższej informacji.<b/></p>

            <h3>Weryfikacja</h3>
            <p>Przepisz kod z obrazka *</p>

            <p>OBRAZEK DO PRZEPISANIA</p>

            <h4>POLA OZNACZONE * SĄ WYMAGANE!</h4>

            <button type="submit">Zarejestruj</button>
        </form>
    </div>
</div>
</body>