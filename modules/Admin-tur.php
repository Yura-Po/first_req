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
    <link href="../css/Admin-tur.css" rel="stylesheet">
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

// $result = mysqli_query($link,"SELECT * FROM `Magaz`");
//     if(mysqli_num_rows($result)>0){
//         $row = mysqli_fetch_array($result);

//         do{
//             echo '
//             <li>
//             <ul class="content-tur">
               
//                 <li><img class="Foto-magaz" src="../Project-Foto/'.$row["Foto_tov"].'" ></li>
               
//             </ul>
//             </li>
//             ';
//         }while($row = mysqli_fetch_array($result));
//     }

if($_SESSION["user"]["lvl_Dostup"]==1){
$result = mysqli_query($link,"SELECT * FROM `Turne` WHERE `visible`='0'");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        do{
            if($row["orenda_obl"]==2){
                $orenda="Так";
            }else{$orenda="Ні";}
            if($row["ekspert"]==1){
                $ekspert="Без експерта";
            }else if($row["ekspert"]==2){$ekspert="Ірина Бувала";}
            else if($row["ekspert"]==3){$ekspert="Олег Мідняк";}
            else if($row["ekspert"]==4){$ekspert="Павло Володар";}
            echo '
            <li>
            <ul class="content-turne">
               
                <div class="poslugi">
                <li>Послуги:</li>
                <li>Бажана дата поїздки: '.$row["Date"].'</li>
                <li>Орендування обладнання: '.$orenda.'</li>
                <li>Бажаний спеціаліст: '.$ekspert.'</li>
                <li>Кінцева вартість: '.$row["itog_cash"].'</li>
                </div>
               
            
            </li>
            ';
            $Userino = mysqli_query($link,'SELECT * FROM `User` WHERE `id_User` = '.$row["id_User"].'');
    if(mysqli_num_rows($Userino)>0){
        $rowb = mysqli_fetch_array($Userino);

        do{
            echo '
            <div class="koristuvach">
            <li>Клієнт:</li>
            <div class="block-name-sur-fah"><li>'.$rowb['SurName'].'</li>
            <li>'.$rowb['Name'].'</li>
            <li>'.$rowb['Father'].'</li></div>
            <li>'.$rowb['Tel'].'</li></div>
            
            ';
        }while($rowb = mysqli_fetch_array($Userino));
    }
    $Turpachino = mysqli_query($link,'SELECT * FROM `Daiving` WHERE `id_Diving` = '.$row["id_Tur"].'');
    if(mysqli_num_rows($Turpachino)>0){
        $rowb = mysqli_fetch_array($Turpachino);

        do{
            echo '
            <div class="Countri">
            <div class="name-countri">
            <li>Країна поїздки:</li>
            <li>'.$rowb['Name_Contr'].'</li>
            </div>
            <div class="kartinka-opis">
            <li class="opis-kratkii">'.$rowb['mini_Opis'].'</li>
            <li><img class="img-turneket" src="../Project-Foto/Daiving/'.$rowb['Foto'].'"></li></div>
            </div>
            <div class="knopki">
            <li><a class="pidtverditi" href="Admin-back.php?id_tur='.$row["id_Saiava"].'&visible=1">Підтвердити</a></li>
            <li><a class="vidmoviti" href="Admin-back.php?id_tur='.$row["id_Saiava"].'&visible=2">Видалити</a></li>
            </div>
            </ul>
            ';
        }while($rowb = mysqli_fetch_array($Turpachino));
    }
        }while($row = mysqli_fetch_array($result));
    }
}else{
    $user_id=$_SESSION["user"]["id_User"];
    $result = mysqli_query($link,"SELECT * FROM `Turne` WHERE `visible`='1' AND `id_User` = '$user_id'");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        do{
            if($row["orenda_obl"]==2){
                $orenda="Так";
            }else{$orenda="Ні";}
            if($row["ekspert"]==1){
                $ekspert="Без експерта";
            }else if($row["ekspert"]==2){$ekspert="Ірина Бувала";}
            else if($row["ekspert"]==3){$ekspert="Олег Мідняк";}
            else if($row["ekspert"]==4){$ekspert="Павло Володар";}
            echo '
            <li>
            <ul class="content-turne">
               
                <div class="poslugi">
                <li>Послуги:</li>
                <li>Бажана дата поїздки: '.$row["Date"].'</li>
                <li>Орендування обладнання: '.$orenda.'</li>
                <li>Бажаний спеціаліст: '.$ekspert.'</li>
                <li>Кінцева вартість: '.$row["itog_cash"].'</li>
                </div>
               
            
            </li>
            ';
            $Userino = mysqli_query($link,'SELECT * FROM `User` WHERE `id_User` = '.$row["id_User"].'');
    if(mysqli_num_rows($Userino)>0){
        $rowb = mysqli_fetch_array($Userino);

        do{
            echo '
            <div class="koristuvach">
            <li>Клієнт:</li>
            <div class="block-name-sur-fah"><li>'.$rowb['SurName'].'</li>
            <li>'.$rowb['Name'].'</li>
            <li>'.$rowb['Father'].'</li></div>
            <li>'.$rowb['Tel'].'</li></div>
            
            ';
        }while($rowb = mysqli_fetch_array($Userino));
    }
    $Turpachino = mysqli_query($link,'SELECT * FROM `Daiving` WHERE `id_Diving` = '.$row["id_Tur"].'');
    if(mysqli_num_rows($Turpachino)>0){
        $rowb = mysqli_fetch_array($Turpachino);

        do{
            $turDaiving=$rowb['id_Diving'];
            echo '
            <div class="Countri">
            <div class="name-countri">
            <li>Країна поїздки:</li>
            <li>'.$rowb['Name_Contr'].'</li>
            </div>
            <div class="kartinka-opis">
            <li class="opis-kratkii">'.$rowb['mini_Opis'].'</li>
            <li><img class="img-turneket" src="../Project-Foto/Daiving/'.$rowb['Foto'].'"></li></div>
            </div>
            <div class="knopki">
            <li><a class="pidtverditi" href="Koment.php?id_Diving='.$turDaiving.'&id_koristuvach='.$user_id.'">Уже повернулися?</a></li>
            </div>
            </ul>
            ';
        }while($rowb = mysqli_fetch_array($Turpachino));
    }
        }while($row = mysqli_fetch_array($result));
    }
}
?>
</ul>

    </div>
</body>
</html>

