<?php require("funkcje.php") ?>
<?php session_start(); ?>

<?php if (isset($_POST['wyloguj'])) {
    $_SESSION['zalogowany'] = 0;
} ?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?= "<h1>Nasz system</h1>" ?>


    <hr>
    <h4>Formularz logowania</h4>
    <form action="logowanie.php" method="POST">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login"><br>
        <label for="haslo">Hasło:</label>
        <input type="password" name="haslo" id="haslo"><br>
        <br>
        <input type="submit" name="zaloguj" value="Zaloguj">
    </form>
    <br>
    <hr>
    <h4>Ustaw czas cookie</h4>
    <form action="cookie.php" method="get">
        <input type="number" name="czas" id="czas">
        <input type="submit" value="utworzCookie">
    </form>
    <br>
    <hr>
    <h4>Przejdź do strony user.php</h4>
    <a href="user.php">user.php</a>
    <hr>
    <h4>Informacje o ciasteczku</h4>
    Cookie: <?= $_COOKIE['czas'] ?>
</body>

</html>