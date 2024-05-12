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


$Name_Contr = $_POST['Name_Contr'];
$NewTurSmall = $_POST['NewTurSmall'];
$NewTurBig = $_POST['NewTurBig'];
$Tsena = $_POST['Tsena'];
$date = getTodayDate();


$error_fields=[];

if($Name_Contr == ''){
    $error_fields[]='Name_Contr';
}

if($NewTurSmall == ''){
    $error_fields[]='NewTurSmall';
}

if($NewTurBig == ''){
    $error_fields[]='NewTurBig';
}

if($Tsena == ''){
    $error_fields[]='Tsena';
}

if(!$_FILES['Small']){
    $error_fields[]='Small';
}

if(!$_FILES['Big']){
    $error_fields[]='Big';
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

$path = 'Project-Foto/Daiving/' .time(). $_FILES['Small']['name'];
$pathh = 'Project-Foto/Daiving/' .time(). $_FILES['Big']['name'];
    if((!move_uploaded_file($_FILES['Small']['tmp_name'], '../'.$path)) || (!move_uploaded_file($_FILES['Big']['tmp_name'], '../'.$pathh))){
        $response = [
            "status"=>false,
            "type" => 2,
            "message"=>"Помилка при загрузці файлу...",
        ];
        
        echo json_encode($response);
    }

    
  

    mysqli_query($link,"INSERT INTO `Daiving`( `Name_Contr`, `mini_Opis`, `Opis`,
     `Mini_Foto`, `Foto`, `Date`, `Tsena`) VALUES ('$Name_Contr','$NewTurSmall',
     '$NewTurBig','$path','$pathh','$date','$Tsena')");

$response = [
    "status"=>true,
    "message"=>"Реєстрація пройшла успішно...",
];

echo json_encode($response);

?>