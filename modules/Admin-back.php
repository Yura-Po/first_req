<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

$id_tur=$_GET["id_tur"];
$visible=$_GET["visible"];

if($id_tur==null || $visible==null){
    header('Location: ../index.php');
}

if($visible==1){
    mysqli_query($link, "UPDATE `Turne` SET `visible`='1' WHERE `id_Saiava`='$id_tur'");
}

if($visible==2){
    mysqli_query($link, "DELETE FROM `Turne` WHERE `id_Saiava`='$id_tur'");
}

header('Location: Admin-tur.php');
?>
