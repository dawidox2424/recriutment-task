<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Logowanie</title>
</head>

<body>
<div class="container">
    <div class="logo">
        <!-- <img src="public/img/logo.png"> -->
    </div>
    <div class="login-container">
        <form class="login" action="login" method="POST">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="email" type="text" placeholder="Adres e-mail">
            <input name="password" type="password" placeholder="Hasło">
            <h4>Pola oznaczone * są wymagane! </h4>

            <button type="submit">Zaloguj</button>

            <a href="register"><button>Nie masz konta? Zarejestruj się!</button></a
        </form>
    </div>
</div>
</body>