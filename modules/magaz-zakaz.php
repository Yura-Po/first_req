<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

function getTodayDate() {
    // Отримуємо поточну дату
    $today = date("Y-m-d");
    return $today;
}

$id_tov = $_GET["id_Tov"];
$id_user = $_SESSION["user"]["id_User"];
$date = getTodayDate();
if($id_tov!=null and $id_user!=null){
mysqli_query($link, "INSERT INTO `magaz-zakaz`( `id_User`, `id_tov`, `date`) VALUES ('$id_user','$id_tov','$date')");
}
header('Location: ../index.php');
?>