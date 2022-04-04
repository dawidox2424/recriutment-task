<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Panel główny</title>
</head>

<body>
<div class="container">
    <div class="userData">
        <h2>Twoje dane:</h2>
            <?php $loggedUser = json_decode($_COOKIE['loggedUser'], true); ?>
        <p>Imię: <?php echo $loggedUser['name'];?> </p>
        <p>Nazwisko: <?php echo $loggedUser['surname'];?> </p>
        <p>Twój pesel: <?php
            if ($loggedUser['pesel'] == "0"){
                echo "Nie podano podczas rejestracji";
            } else echo $loggedUser['pesel'];
            ?> </p>
        <p>Twój email: <?php echo $loggedUser['email'];?> </p>
        <p>Twój nr telefonu: <?php echo $loggedUser['phone'];?> </p>

        <p>Miasto: Kraków</p>
        <p>Kod pocztowy: <?php echo $loggedUser['zipcode'];?> </p>
        <p>Ulica: <?php echo $loggedUser['street'];?> </p>
        <p>Nr budynku: <?php echo $loggedUser['buildingNumber'];?> </p>
        <p>Numer lokalu: <?php
            if ($loggedUser['apartmentNumber'] == "0"){
                echo "Nie podano podczas rejestracji";
            } else echo $loggedUser['apartmentNumber'];
            ?> </p>
        <p>Dzielnica:
            <?php echo $loggedUser['district']; ?> </p> <br/>
    </div>

    <?php
    if(isset($messages)){
        foreach($messages as $message) {
            echo $message;
        }
    }
    ?>

    <form action="logout" method="POST">
        <button href="login" class="button">Wyloguj się</button>
    </form>

    <button class="button"><a href="grafittiForm">Zgłoś nielegalne grafitti</a></button>
</div>
</body>