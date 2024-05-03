
<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    echo "Błąd: " . mysqli_connect_error();
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if (
    isset($_POST['id_prac']) &&
    is_numeric($_POST['id_prac']) &&
    is_string($_POST['nazwisko'])
) {
    $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
    try {
        $stmt->execute();
        $_SESSION['result'] = "Pracownik został dodany!";
        header("Location: ./form06_get.php");
    } catch (Exception $e) {
        $_SESSION['result_err'] = "Błąd dodawania pracownika!";
        header("Location: ./form06_post.php");
    }
} else {
    $_SESSION['result_err'] = "Błąd dodawania pracownika!";
    header("Location: ./form06_post.php");
}
$link->close();
?>