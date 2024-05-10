<?php session_start(); ?>

<?php if (!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] == 0) {
    header("Location: index.php");
} ?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    require_once("funkcje.php");
    echo "Zalogowano jako: " . $_SESSION['zalogowanyImie'];
    ?>
    <hr>
    <h4>Przejdź do strony index.php</h4>
    <a href="index.php">index.php</a>
    <br>
    <hr>
    <h4>Formularz przesyłania plików</h4>
    <form action="user.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" value="Wyślij obrazek" name="submit">
    </form>
    <br>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currentDir = getcwd(); // get current directory
        $uploadDirectory = "/imgs/";
        $fileName = $_FILES['fileToUpload']['name']; // get file name
        $fileTmpName  = $_FILES['fileToUpload']['tmp_name']; // get temporary file name
        $fileType = $_FILES['fileToUpload']['type'];
        if (
            $fileName != "" and
            ($fileType == 'image/png' or $fileType == 'image/jpeg' or $fileType == 'image/JPEG' or $fileType == 'image/PNG')
        ) {
            $uploadPath = $currentDir . $uploadDirectory . $fileName;
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                echo "<img src='$uploadDirectory$fileName' alt='Uploaded image' style='width:500px'>";
            } else {
                echo "Wystąpił błąd podczas przesyłania pliku";
                // detailed error message:
                echo "Error: " . $_FILES["fileToUpload"]["error"];
                echo "<br>";
            }
        } else {
            echo "Nieprawidłowy format pliku lub brak pliku";
        }
    }
    ?>
    <hr>

    <form action="index.php" method="post">
        <input type="submit" name="wyloguj" value="Wyloguj">
    </form>
</body>

</html>