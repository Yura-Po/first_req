<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
include("db_connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/Tur.css" rel="stylesheet">
    <link rel="shortcut icon" href="../Project-Foto/iconCompas.png" type="image/png">

    <title>Магазин</title>
</head>

<body style="background: url(../Project-Foto/for_index.jpg)0 0/100% no-repeat fixed;">

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
$result = mysqli_query($link,"SELECT * FROM `Magaz`");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        do{
            echo '
            <li>
            <ul class="content-tur">
                <div class="name-turne"><li>'.$row["Name"].'</li></div>
                <li><img class="Foto-magaz" src="../Project-Foto/'.$row["Foto_tov"].'" ></li>
                <div class="Opis-turne"><li>'.$row["Opis"].'</li></div>
                <div class="dogovir">
                <div class="dogovir-tsena">
                <li>Ціна: '.$row["Tsena"].' грн.</li></div>
                <div class="dogovir-cknopka"><a class="button-turne" href="magaz-zakaz.php?id_Tov='.$row["id_tov"].'">Подати заявку</a></div>
                </div>
            </ul>
            </li>
            ';
        }while($row = mysqli_fetch_array($result));
    }
?>
</ul>

    </div>
</body>
</html>

