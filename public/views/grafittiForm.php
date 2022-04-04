<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script defer="" type="text/javascript" src="/public/js/grafittiForm.js"></script>
    <title>Zgłoś grafitti</title>
</head>

<body>
<div class="container">
    <div class="graffitiForm">
        <button class="button" type="submit"><a href="dashboard">Powrót</a></button>
        <h2>Zgłoszenie nielegalnych napisów lub znaków graficznych</h2>
        <p>W przypadku stwierdzenia nielegalnych napisów i znaków graficznych na elewacji w Krakowie prosimy o wypełnienie wszystkich wymaganych pól formularza, a następnie naciśnięcie przycisku „Wyślij formularz”. </p>
        <form name="form" class="register" action="addGrafitti" method="POST" ENCTYPE="multipart/form-data">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <?php $loggedUser = json_decode($_COOKIE['loggedUser'], true); ?>
            <input class="input" name="notifierEmail" type="text" placeholder="Adres mailowy zgłaszającego"
                   value="<?php echo $loggedUser['email']; ?>">

            <label>
                <select name="id_property" class="district">
                    <option value="0">wybierz adres nieruchomości*</option>
                    <?php
                    foreach ($allProperties as $property) :
                    ?>
                    <option value="<?php echo $property['id']; ?>"><?php echo $property['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label>
                <!--todo: class district?-->
                <select name="location" class="district">
                    <option value="0">lokalizacja nielegalnych napisów*</option>
                    <option>Elewacja frontowa</option>
                    <option>Elewacja boczna</option>
                    <option>Elewacja tylna</option>
                    <option>Drzwi wejściowe</option>
                    <option>Przeszklenie</option>
                    <option>Brama</option>
                </select>
            </label>

            <input class="input" name="file" type="file" placeholder="wyślij zdjęcie grafitti">

            <label for="date">Wybierz datę ujawnienia nielegalnych napisów:</label>

            <input class="input" type="date" id="date" name="findingDate" value="2022-05-15" min="2022-01-01" max="2030-01-01">

            <label>
                <!--todo: class district?-->
                <select name="type" class="district">
                    <option value="0">rodzaj nielegalnych napisów*</option>
                    <option>wulgarna</option>
                    <option>rasistowska</option>
                    <option>antysemicka</option>
                    <option>kibicowska</option>
                    <option>rysunki</option>
                    <option>inna</option>
                </select>
            </label>
            <input class="input" name="remarks" type="text" placeholder="Dodatkowe uwagi">

            <div class="statements">
                <h3>Oświadczenia</h3>
                <p><b>*Wyrażam zgodę na przetwarzanie moich danych osobowych przez Zarząd Budynków Komunalnych w Krakowie w zakresie podanym w formularzu.
                        Dane osobowe podane w formularzu będą przetwarzane w celu obsługi zgłoszenia, zgodnie z jego zakresem oraz według zasad zawartych w Informacji Administratora o przetwarzaniu danych osobowych.
                        Informujemy, że będziemy kontaktować się z Państwem wyłącznie wtedy, gdy zajdzie potrzeba uzyskania dodatkowych informacji.
                        <b/></p>
                <div>
                    <input type="checkbox" id="rodo0" name="rodo0">
                    <label for="rodo0">Akceptuję</label>
                </div>
                <h4>POLA OZNACZONE * SĄ WYMAGANE!</h4>
            </div>

            <button class="button" type="submit">Wyślij formularz</button>
        </form>
    </div>
</body>