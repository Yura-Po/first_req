<?php
session_start();
include("db_connect.php");

$id_User= $_POST['id_User'];
$id_Diving = $_POST['id_Diving'];
$date = $_POST['date'];
$text_K = $_POST['text_K'];

$error_fields=[];

if($text_K == ''){
    $error_fields[]='text_K';
}


if(!empty($error_fields)){

$response = [
    "status"=>false,
    "type" => 1,
    "message"=>"Напишіть повідомлення...",
    "fields" => $error_fields
];

echo json_encode($response);

    die();
}

$check_user = mysqli_query($link, "INSERT INTO `Koment`(`id_User`, `id_Daiving`, `Text_Koment`,
 `date`) VALUES ('$id_User','$id_Diving','$text_K','$date')");



    $response = [
        "status" => true
    ];

    // echo 'Авторизація пройшла успішно...';
    echo json_encode($response);


?>