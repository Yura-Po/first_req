<?php
session_start();
include("db_connect.php");

$Email = $_POST['Email'];
$passWord = $_POST['passWord'];
$passWord = md5($passWord);

$check_user = mysqli_query($link, "SELECT * FROM `User` WHERE `Email`= '$Email' AND `passWord` = '$passWord'");

if(mysqli_num_rows($check_user)> 0){

    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user']=[
        "Name"=> $user['Name'],
        "SurName"=> $user['SurName'],
        "Father"=> $user['Father'],
        "Sex"=> $user['Sex'],
        "Age"=> $user['Age'],
        "Tel"=> $user['Tel'],
        "Email"=> $user['Email'],
        "passWord"=> $user['passWord'],
        "Country"=> $user['Country'],
        "Foto"=> $user['Foto'],

    ];

    header('Location: ../index.php');
}else{
    $_SESSION['message']='Невірний логін або пароль...';
    echo 'Невірний логін або пароль...';
}
?>