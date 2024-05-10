<?php
session_start();
include("db_connect.php");

$dateTur = $_POST['dateTur'];
$orenda = $_POST['orenda'];
$expert = $_POST['expert'];
$tsena = $_POST['tsena'];
$id_tur=$_POST['id_tur'];
$id_User=$_SESSION['user']['id_User'];


$error_fields=[];

if($dateTur == ''){
    $error_fields[]='dateTur';
}


if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Заповніть поле дата...",
    "fields" => $error_fields
];

echo json_encode($response);

    die();
}else{

mysqli_query($link, "INSERT INTO `Turne`(`id_Tur`, `id_User`, `Date`, `orenda_obl`, `ekspert`, `itog_cash`) VALUES ('$id_tur','$id_User','$dateTur','$orenda','$expert','$tsena')");
$response = [
    "status"=>true,
    "message"=>"Реєстрація пройшла успішно...",
];

echo json_encode($response);
}
?>