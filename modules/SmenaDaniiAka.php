<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");
if(!$_SESSION['user']){
    header('Location: Authorization.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/Smena.css">
    <link rel="shortcut icon" href="../Project-Foto/iconCompas.png" type="image/png">
    <title>Авторизація</title>
</head>
<body>
<div class="form-block">
<div class="form-block-first">
    <form>
    <label>Ім'я:</label>
    <input type="text" name="name" placeholder="Введіть ім'я..." value='<?= $_SESSION['user']['Name']?>'>
    <label>Прізвище:</label>
    <input type="text" name="Surname" placeholder="Введіть Прізвище..." value='<?= $_SESSION['user']['SurName']?>'>
    <label>По-батькові:</label>
    <input type="text" name="Batko" placeholder="Введіть по-батькові..." value='<?= $_SESSION['user']['Father']?>'>
    <label>Стать:</label>
    <select name="sex" value='<?= $_SESSION['user']['Sex']?>'>
        <option value="1">Чоловіча</option>
        <option value="2">Жіноча</option>
    </select>
    <label>Дата народження:</label>
    <input type="date" name="Age" placeholder="Вкажіть Вік..." value='<?= $_SESSION['user']['Age']?>'>
    <label>Країна:</label>
    <select name="Country" value='<?= $_SESSION['user']['Country']?>'>
        <option value="1">Україна</option>
        <option value="2">Америка</option>
        <option value="3">Англія</option>
        <option value="4">Франція</option>
        <option value="5">Італія</option>
        <option value="6">Іспанія</option>
        <option value="7">Бразилія</option>
        <option value="8">Аргентина</option>
        <option value="9">Китай</option>
        <option value="10">Япоія</option>
    </select>
    <label>Оберіть фото:</label>
    <input class="input-foto" name="Avatar" type="file">
    </div>
<div class="form-block-two">
    <label class="label-two">Тел:</label>
    <input class="input-two" type="text" name="Telef" placeholder="Введіть Телефон..." value='<?= $_SESSION['user']['Tel']?>'>
    <label class="label-two">Email:</label>
    <input class="input-two" type="email" name="Email" placeholder="Введіть Email..." value='<?= $_SESSION['user']['Email']?>'>
    <label>PassWord:</label>
    <div class="passLine">
    <input class="passinput" name="passWord" type="password" placeholder="Введіть Пароль...">
    <div class="sauron-div">
    <img class="sauron" src="../Project-Foto/118191.png">
    </div>
    </div>
    <input class="passinput-two" name="passWordDouble" type="password" placeholder="Повторіть Пароль...">
    <button type="submit" class="button_form samena-btn">Створити</button>
    <div class="msg none"><span>Lorem, ipsum dolor sit </span></div>
    </div>
    
    </div>
    </form>
</div>
<script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/Authorization.js"></script>
</body>
</html>