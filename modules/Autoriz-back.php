<?php
session_start();
include("db_connect.php");

$Email = $_POST['Email'];
$passWord = $_POST['passWord'];

$error_fields=[];

if($Email == ''){
    $error_fields[]='Email';
}

if($passWord == ''){
    $error_fields[]='passWord';
}

if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Заповніть усі поля...",
    "fields" => $error_fields
];

echo json_encode($response);

    die();
}

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

    $response = [
        "status" => true
    ];

    // echo 'Авторизація пройшла успішно...';
    echo json_encode($response);
}else{
    // echo 'Невірний логін або пароль...';

    $response = [
        "status" => false,
        "message"=> 'Невірний логін або пароль...'
    ];
    echo json_encode($response);
}
?>