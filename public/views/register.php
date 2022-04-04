<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script defer="" type="text/javascript" src="/public/js/register.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Rejestracja</title>
</head>

<body>
<div class="container">
        <a href="login"><button class="button">Masz już konto? ZALOGUJ SIĘ</button></a>
        <form name="form" class="register" action="register" method="POST">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <h3>Dane osobowe</h3>
            <input class="input" name="name" type="text" placeholder="Imię">
            <input class="input" name="surname" type="text" placeholder="Nazwisko">
            <input class="input" name="pesel" type="text" placeholder="Numer PESEL">

            <h3>Dane logowania</h3>
            <input class="input" name="email" type="text" placeholder="Twój e-mail">
            <input class="input" name="confirmedEmail" type="text" placeholder="Powtórz e-mail">
            <input class="input" name="password" type="password" placeholder="Twoje hasło">
            <p class="requirements">Hasło musi mieć co najmniej 8 znaków, w tym: 1 dużą literę,
                1 małą literę,<br/> 1 cyfrę lub znak specjalny wybrany spośród następujących: _ . , : ; ! ? @ # $ % & ~ ' ` * ^ + - = ( ) [ ] < > \ / |.
                <br/>Hasło nie może zawierać polskich znaków.</p>
            <input class="input" name="confirmedPassword" type="password" placeholder="Powtórz hasło">
            <input class="input" name="phone" type="text" placeholder="Twój numer telefonu">

            <h3>Adres zamieszkania</h3>
            <p>Miasto: Kraków</p>
            <input class="input" name="zipcode" type="text" placeholder="Kod pocztowy">
            <input class="input" name="street" type="text" placeholder="Ulica">
            <input class="input" name="buildingNumber" type="text" placeholder="Nr budynku">
            <input class="input" name="apartmentNumber" type="text" placeholder="Nr lokalu">

            <label>
                <select name="district" class="district">
                    <option value="0">wybierz Dzielnicę</option>
                    <option>Dzielnica I Stare Miasto</option>
                    <option>Dzielnica II Grzegórzki</option>
                    <option>Dzielnica III Prądnik Czerwony</option>
                    <option>Dzielnica IV Prądnik Biały</option>
                    <option>Dzielnica V Krowodrza</option>
                    <option>Dzielnica VI Bronowice</option>
                    <option>Dzielnica VII Zwierzyniec</option>
                    <option>Dzielnica VIII Dębniki</option>
                    <option>Dzielnica IX Łagiewniki-Borek Fałęcki</option>
                    <option>Dzielnica X Swoszowice</option>
                    <option>Dzielnica XI Podgórze Duchackie</option>
                    <option>Dzielnica XII Bieżanów-Prokocim</option>
                    <option>Dzielnica XIII Podgórze</option>
                    <option>Dzielnica XIV Czyżyny</option>
                    <option>Dzielnica XV Mistrzejowice</option>
                    <option>Dzielnica XVI Bieńczyce</option>
                    <option>Dzielnica XVII Wzgórza Krzesławickie</option>
                    <option>Dzielnica XVIII Nowa Huta</option>
                </select>
            </label>


            <div class="statements">
            <h3>Oświadczenia</h3>
            <p><b>Akceptuję Regulamin Konta Portalu Magiczny Kraków, www.krakow.pl *<b/></p>
                <div>
                    <input type="checkbox" id="rodo0" name="rodo0">
                    <label for="rodo0">Akceptuję</label>
                </div>

            <p>Zgodnie z art. 13 ust. 1 i 2 unijnego ogólnego rozporządzenia o ochronie danych (tzw. RODO) informujemy - że administratorem danych osobowych
                jest Prezydent Miasta Krakowa z siedzibą Pl. Wszystkich Świętych 3-4, 31-004 Kraków i są one podawane w zakresie: imię i nazwisko,
                adres e-mail w celu: otrzymywania informacji o działaniach podejmowanych w związku z budżetem obywatelskim Miasta Krakowa.</p>

            <p><b>Oświadczam, że wyrażam zgodę na przetwarzanie moich danych osobowych w powyższym zakresie i celu.<b/></p>
                <div>
                    <input type="checkbox" id="rodo1" name="rodo1">
                    <label for="rodo1">Wyrażam zgodę</label>
                </div>

            <p>Informujemy, że: <br/>
                1. Użytkownik ma prawo w dowolnym momencie wycofać niniejszą zgodę, przy czym jej wycofanie nie wpływa na zgodność z prawem przetwarzania, którego dokonano na podstawie tejże zgody przed jej wycofaniem.<br/>
                2. Masz prawo do żądania od administratora dostępu do Twoich danych osobowych, ich sprostowania, usunięcia lub ograniczenia przetwarzania, a także prawo do przenoszenia danych.<br/>
                3. Dane osobowe będą przechowywane do czasu wycofania zgody lub usunięcia konta.<br/>
                4. Odbiorcą Twoich danych osobowych jest Akademickie Centrum Komputerowe Cyfronet w Krakowie.<br/>
                5. Użytkownik ma prawo do wniesienia skargi do organu nadzorczego, którym jest Prezes Urzędu Ochrony Danych Osobowych.<br/>
                6. Podanie danych osobowych ma charakter dobrowolny.<br/>
                7. Konsekwencją niepodania danych jest brak możliwości otrzymywania informacji o działaniach podejmowanych w związku z budżetem obywatelskim Miasta Krakowa.<br/>
                8. Administrator nie przewiduje profilowania na podstawie podanych danych osobowych.<br/>
                9. Podstawę prawną przetwarzania Twoich danych stanowi art. 6 ust. 1 lit. a) RODO, tzn. dane będą przetwarzane na podstawie Twojej zgody.<br/> <br/>

                Dane kontaktowe Inspektora Ochrony Danych: e-mail: iod@um.krakow.pl; adres pocztowy: pl. Wszystkich Świętych 3-4, 31-004 Kraków</p>

            <p><b>Oświadczam, że zapoznałem/-am się z treścią powyższej informacji.<b/></p>

                <div>
                    <input type="checkbox" id="rodo2" name="rodo2">
                    <label for="rodo2">Wyrażam zgodę</label>
                </div>

            <h3>Weryfikacja</h3>

                <div class="g-recaptcha" data-sitekey="6LdOd0MfAAAAAA7r4t9JOg6aFXXpp7iIbL7PpImh"></div>

            <h4>POLA OZNACZONE * SĄ WYMAGANE!</h4>

            </div>

            <button class="button" type="submit">Zarejestruj</button>
        </form>
    </div>
</body>