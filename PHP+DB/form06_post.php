<?php
session_start();
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if (isset($_SESSION['result_err'])) {
        echo $_SESSION['result_err'];
        unset($_SESSION['result_err']);
    }
    ?>
    <form action="form06_redirect.php" method="POST">
        id_prac <input type="text" name="id_prac">
        nazwisko <input type="text" name="nazwisko">
        <input type="submit" value="Wstaw">
        <input type="reset" value="Wyczysc">
    </form>
    <hr>
    <a href="form06_get.php">Lista pracowników</a>
</body>

</html>