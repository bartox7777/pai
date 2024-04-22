<?php session_start(); ?>
<?php require("funkcje.php") ?>

<?php
if (isset($_POST['zaloguj'])) {
    $login = test_input($_POST['login']);
    $haslo = test_input($_POST['haslo']);
    $osoby = array($osoba1, $osoba2);
    foreach ($osoby as $osoba) {
        if ($login == $osoba->login && $haslo == $osoba->haslo) {
            $_SESSION['zalogowanyImie'] = $osoba->imieNazwisko;
            $_SESSION['zalogowany'] = 1;
            header("Location: user.php");
            break;
        }
    }
    if (!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] == 0) {
        header("Location: index.php");
    }
    // echo "Przesłany login: $login<br>";
    // echo "Przesłane hasło: $haslo<br>";
}
?>