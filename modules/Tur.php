<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");
$id_Tur=$_GET["id_Diving"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/Tur.css" rel="stylesheet">
    <link rel="shortcut icon" href="../Project-Foto/iconCompas.png" type="image/png">
    <?php
$foto = mysqli_query($link,"SELECT * FROM `Daiving` WHERE `id_Diving`='$id_Tur'");

if(mysqli_num_rows($foto)>0){
    $row = mysqli_fetch_array($foto);

    do{
    $turTitle=$row["Name_Contr"];
      $turFoto="../".$row["Foto"]."";
          
    }while($row = mysqli_fetch_array($foto));
}

?>

    <title><?=$turTitle?></title>
</head>

<body style="background: url(<?=$turFoto?>)0 0/100% no-repeat fixed;">

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

    <div class="block-body-tur">
   
    <ul> 
<?php
$result = mysqli_query($link,"SELECT * FROM `Daiving` WHERE `id_Diving`='$id_Tur'");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        do{
            echo '
            <li>
            <ul class="content-tur">
                <div class="name-turne"><li>'.$row["Name_Contr"].'</li></div>
                <li><img class="Foto-turne" src="../'.$row["Foto"].'" ></li>
                <div class="Opis-turne"><li>'.$row["Opis"].'</li></div>
                <div class="dogovir">
                <div class="dogovir-tsena">
                <li>Зразок договору:'.$row["File"].'<a href="#">Завантажити тут!</a></li>
                <li>Ціна: '.$row["Tsena"].' грн.</li></div>
                <div class="dogovir-cknopka"><a class="button-turne" href="Zaiava.php?id_Diving='.$id_Tur.'">Подати заявку</a></div>
                </div>
            </ul>
            </li>
            ';
        }while($row = mysqli_fetch_array($result));
    }
?>
</ul>
</div>
    <div class="block-koment-title">Коментарі</div>
    <div class="block-koment">
    <ul> 

<?php
$result = mysqli_query($link,"SELECT * FROM `Koment` WHERE `id_Daiving`='$id_Tur'");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        do{

            $userid=$row["id_User"];
            $Userino = mysqli_query($link,"SELECT * FROM `User` WHERE `id_User`='$userid'");
            if(mysqli_num_rows($Userino)>0){
                $rowu = mysqli_fetch_array($Userino);
        
                do{
                    
                    echo '
                    <li>
                    <ul class="content-koment">
                        <div class="foto-title-user-date-koment">
                        <div class="foto-title-user-date">
                        <div class="foto-title-user">
                        <li><img class="fotoUser" src="../'.$rowu["Foto"].'"></li>
                        <div class="user-name-ser-fah">
                        <li>'.$rowu["SurName"].'</li>
                        <li>'.$rowu["Name"].'</li>
                        <li>'.$rowu["Father"].'</li></div></div>
                        <li>'.$row["date"].'</li></div>
                        <div class="koment-block"><li>'.$row["Text_Koment"].'</li></div></div>
                    </ul>
                    </li>
                    '; 
                }while($rowu = mysqli_fetch_array($Userino));
            }

            
        }while($row = mysqli_fetch_array($result));
    }
?>
</ul>
    </div>
    
</body>
</html>

