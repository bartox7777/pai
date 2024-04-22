<?php require("funkcje.php") ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    if (isset($_GET['czas'])) {
        $czas = $_GET['czas'];
        setcookie("czas", $czas, time() + $czas, "/");
    }
    ?>
    <a href="index.php">index.php</a>
    <br>
</body>

</html>