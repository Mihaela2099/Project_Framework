<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "admin_saw";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $con = mysqli_connect($host, $user, $password, $db_name);
} catch(Exception $e) {
    error_log($e->getMessage()."\t\t".date("d/m/y H:i:s")."\t\t".$_SERVER["PHP_SELF"]."\r\n", 3, "C:/xampp/htdocs/LI/log/logError.txt");
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/LI/error.php');
}
?>