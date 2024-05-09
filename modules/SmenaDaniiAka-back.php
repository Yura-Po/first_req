<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");


$name = $_POST['name'];
$Surname = $_POST['Surname'];
$Batko = $_POST['Batko'];
$Sex = $_POST['sex'];
$Age = $_POST['Age'];
$Country = $_POST['Country'];
$Telef = $_POST['Telef'];
$Email = $_POST['Email'];
$passWord = $_POST['passWord'];
$passWordDouble = $_POST['passWordDouble'];

$check_login = mysqli_query($link, "SELECT * FROM `User` WHERE `Email`= '$Email'");

if(mysqli_num_rows($check_login)>0){
    $response = [
        "status"=>false,
        "type" => 1,
        "message"=>"Такий користувач уже існує...",
        "fields" =>['Email']
    ];
    
    echo json_encode($response);
    die();
}



$error_fields=[];

if($name == ''){
    $error_fields[]='name';
}

if($Surname == ''){
    $error_fields[]='Surname';
}

if($Batko == ''){
    $error_fields[]='Batko';
}

if($Age == ''){
    $error_fields[]='Age';
}

if($Telef == ''){
    $error_fields[]='Telef';
}

if($Email == '' ){
    $error_fields[]='Email';
}

if($passWord == ''){
    $error_fields[]='passWord';
}

if($passWordDouble == ''){
    $error_fields[]='passWordDouble';
}

if(!$_FILES['Avatar']){
    $error_fields[]='Avatar';
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

if(!filter_var($Email, filter: FILTER_VALIDATE_EMAIL)){
    $response = [
        "status"=>false,
        "type" => 1,
        "message"=>"Заповніть поле правильно...",
        "fields" =>['Email']
    ];
    
    echo json_encode($response);
    die();
}

if($passWord === $passWordDouble){
    $passWord=md5($passWord);
    $path = 'Avatar/' .time(). $_FILES['Avatar']['name'];
    if(!move_uploaded_file($_FILES['Avatar']['tmp_name'], '../'.$path)){
        $response = [
            "status"=>false,
            "type" => 2,
            "message"=>"Помилка при загрузці файлу...",
        ];
        
        echo json_encode($response);
    }
    $new_danii=$_SESSION['user']['Email'];
    mysqli_query($link,"UPDATE `User` SET `Name`='$name',`SurName`='$Surname',
    `Father`='$Batko',`Sex`='$Sex',
    `Age`='$Age',`Tel`='$Telef',
    `Email`='$Email',`passWord`='$passWord',
    `Country`='$Country',`Foto`='$path' WHERE `Email`='$new_danii'");

$response = [
    "status"=>true,
    "message"=>"Реєстрація пройшла успішно...",
];

echo json_encode($response);
}else{
    echo "Не вірно заповнені поля паролю";
    header('Location: Registration.php');
}


// $Avatar = $_POST['Avatar'];

?>