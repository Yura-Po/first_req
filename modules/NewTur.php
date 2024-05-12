<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");
if($_SESSION['user']['lvl_Dostup']!= 1){
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link href="../css/Tur.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/NewTur.css">
    <link rel="shortcut icon" href="../Project-Foto/iconCompas.png" type="image/png">
    <title>Створення туру</title>
</head>

<body style="background: url(../Project-Foto/cherep.jpg)0 0/100% no-repeat fixed;">

<div class="block-header-tur">
<header class="header">
    <div class="header__container">
        <a href="../index.php" class="header__logo"></a>
        <div class="header__menu menu">
            <div class="menu__icon">
                <span></span>
            </div>
            <nav class="menu__body">
                <ul class="menu__list">
                   
                    <li><?php if($_SESSION['user']!= null){
                      echo '<a href="logout.php" class="menu__link">Вихід</a></li>';  
                    }else{
                        echo '<a href="Authorization.php" class="menu__link">Вхід</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
</div>

<div class="forma-NewTur">

<form >

<label class="label-NewTur">Назва країни:</label>
<input type="text" name="Name_Contr" placeholder="Введіть назву країни...">
<label class="label-NewTur">Міні опис:</label>
<textarea class="text_Ko" name="NewTurSmall" cols="44" rows="7"></textarea> 
<label class="label-NewTur">Повний опис:</label>
<textarea class="text_Ko" name="NewTurBig" cols="44" rows="7"></textarea>
<label class="label-NewTur">Міні фото:</label>
<input class="input-foto" name="Small" type="file">
<label class="label-NewTur">Велике фото:</label>
<input class="input-foto" name="Big" type="file">
<label class="label-NewTur">Базова ціна:</label>
<input type="text" name="Tsena" placeholder="Введіть ціну...">
<div class="button">
<button type="submit" class="button-NewTur">Створити</button></div>
<div class="msg none"><span>Lorem, ipsum dolor sit </span></div>
</form>

</div>

<script src="../js/jquery-3.7.1.js"></script>
<script src="../js/NewTur.js"></script>
</body>
</html>