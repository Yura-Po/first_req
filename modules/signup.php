<?php
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

if($passWord === $passWordDouble){
    $passWord=md5($passWord);
    $path = 'Avatar/' .time(). $_FILES['Avatar']['name'];
    if(!move_uploaded_file($_FILES['Avatar']['tmp_name'], '../'.$path)){
        $_SESSION['message'] = 'Помилка при загрузці файлу...';
        header('Location: Registration.php');
    }
    mysqli_query($link,"INSERT INTO `User`( `Name`, `SurName`, `Father`, 
    `Sex`, `Age`, `Tel`, `Email`, `passWord`, `Country`, `Foto`) VALUES 
    ('$name','$Surname','$Batko','$Sex','$Age',
    '$Telef','$Email','$passWord','$Country','$path')");

header('Location: Authorization.php');
}else{
    echo "Не вірно заповнені поля паролю";
}


// $Avatar = $_POST['Avatar'];

?>