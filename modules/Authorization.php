<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");
if($_SESSION['user']){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/Authorization.css">
    <title>Авторизація</title>
</head>
<body>
    <div class="form-block">
    <form action="Autoriz-back.php" method="post">
    <label>Email:</label>
    <input type="email" name="Email" placeholder="Введіть Email...">
    <label>PassWord:</label>
    <div class="passLine">
    <input class="passinput" type="password" name="passWord" placeholder="Введіть Пароль...">
    <div class="sauron-div">
    <img class="sauron" src="../Project-Foto/118191.png">
    </div>
    </div>
    <button type="submit" class="button_form">Увійти</button>
    <div class="silki-div"><a href="#" class="silki-a">Забули пароль?</a>
    <a href="Registration.php" class="silki-a">Реєстрація</a>
    </div>
    </form>
    </div>
    <script src="../js/Authorization.js"></script>
</body>
</html>