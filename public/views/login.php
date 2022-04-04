<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Logowanie</title>
</head>

<body>
<div class="container">
    <h4>Pola oznaczone * są wymagane! </h4>
        <form class="login" action="login" method="POST">
            <div class="messages">
                <p>
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                </p>
            </div>
                <input class="input" name="email" type="text" placeholder="Adres e-mail*">
                <input class="input" name="password" type="password" placeholder="Hasło*">
            <button class="button" type="submit">Zaloguj</button>
        </form>
        <a href="register"><button class="button">Nie masz konta? Zarejestruj się!</button></a
    </div>
</body>