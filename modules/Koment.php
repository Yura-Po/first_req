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

$id_koristuvach=$_GET["id_koristuvach"];
$id_Diving=$_GET["id_Diving"];
$date = getTodayDate();


$result = mysqli_query($link,"SELECT * FROM Daiving WHERE `id_Diving` = '$id_Diving'");

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        do{
            $img =$row["Foto"];
            $title = $row["Name_Contr"];
        }while($row = mysqli_fetch_array($result));
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/Koment.css" rel="stylesheet">
    <link rel="shortcut icon" href="../Project-Foto/iconCompas.png" type="image/png">
    <title><?=$title?></title>
</head>
<body style="background: url(../Project-Foto/Daiving/<?=$img?>)0 0/100% no-repeat fixed;">
    
<div class="form_koment">
    <form >
        <input class="none" type="text" name="id_User" value="<?=$id_koristuvach?>">
        <input class="none" type="text" name="id_Diving" value="<?=$id_Diving?>">
        <input class="none" type="date" name="date" value="<?=$date?>">
        <textarea class="text_Ko" name="text_K" cols="40" rows="20"></textarea>   
        <button type="submit" class="btn-koment">Надіслати...</button>
        <div class="msg none"><span>Lorem, ipsum dolor sit </span></div>
    </form>
</div>
<script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/koment.js"></script>
</body>
</html>