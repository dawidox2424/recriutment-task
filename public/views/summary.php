<!DOCTYPE html>
<?php require_once __DIR__.'/../../src/models/Grafitti.php'; ?>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Podsumowanie</title>
</head>

<body>
<div class="container">
    <div class="graffitiForm">

        <h2>Podsumowanie twojego zgłoszenia.</h2>

        <h4>Email zgłaszającego</h4>
        <p><?php echo $grafitti['notifierEmail'] ?></p>

        <h4>Nazwa posiadłości</h4>
        <p><?php echo $grafitti['propertyName'] ?></p>

        <h4>Adres posiadłości</h4>
        <p><?php echo $grafitti['propertyStreet']." ".$grafitti['propertyNumber']  ?></p>

        <h4>Lokalizacja</h4>
        <p><?php echo $grafitti['location'] ?></p>

        <h4>Data znalezienia</h4>
        <p><?php echo $grafitti['findingDate'] ?></p>

        <h4>Typ</h4>
        <p><?php echo $grafitti['type'] ?></p>

        <h4>Uwagi</h4>
        <p><?php echo $grafitti['remarks'] ?></p>

        <h4>Zdjęcie</h4>
        <div class="grafittiPhoto">
        <img src="/../uploads/<?php echo $grafitti['photo'] ?>">
        </div>

        <br/>
        <div class="button-div">
        <button class="button"><a href="dashboard">Powrót</a></button>
        </div>

    </div>
</div>
</body>