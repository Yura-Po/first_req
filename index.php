<?php
session_start();
include("modules/db_connect.php");
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

$sorting = $_GET["sort"];

switch($sorting){
    case 'price-desc';
    $sorting = 'Tsena ASC';
    $sort_name = ':Від дешевшого до дорожчого';
    break;

    case 'price-asc';
    $sorting = 'Tsena DESC';
    $sort_name = ':Від дорожчого до дешевшого';
    break;

    case 'county';
    $sorting = 'Name_Contr';
    $sort_name = ':Від А до Я...';
    break;

    default:
    $sorting = 'id_Diving DESC';
    $sort_name = '';
    break;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="Project-Foto/iconCompas.png" type="image/png">
    <title>Глибинні світи: Веб-дайвінг</title>
</head>
<body>
    


    <div class="block-body">

    <div class="profile non-akaunt"> <div class="profile-lvl1">
    <div class="block-avatar"><img class="avatar" src="<?=$_SESSION['user']['Foto']?>" ></div> 
    <?php echo '<div class="block-pib"><p>Name: '.$_SESSION['user']['Name'].'</p>
<p>Surname: '.$_SESSION['user']['SurName'].'</p>
<p>Father: '.$_SESSION['user']['Father'].'</p></div></div>
<div class="block-info"><p>Sex: ';if($_SESSION['user']['Sex']==1){echo 'Чоловіча';}else{echo 'Жіноча';} echo'</p>
<p>Date: '.$_SESSION['user']['Age'].'</p>
<p>Tel: '.$_SESSION['user']['Tel'].'</p>
<p>Email: '.$_SESSION['user']['Email'].'</p>
<p>Country: ';if($_SESSION['user']['Country']==1){echo 'Україна';}else if($_SESSION['user']['Country']==2){echo 'Америка';}
else if($_SESSION['user']['Country']==3){echo 'Англія';}else if($_SESSION['user']['Country']==4){echo 'Франція';}
else if($_SESSION['user']['Country']==5){echo 'Італія';}else if($_SESSION['user']['Country']==6){echo 'Іспанія';}
else if($_SESSION['user']['Country']==7){echo 'Бразилія';}else if($_SESSION['user']['Country']==8){echo 'Аргентина';}
else if($_SESSION['user']['Country']==9){echo 'Китай';}else if($_SESSION['user']['Country']==10){echo 'Япоія';}
echo'</p><p><a href="modules/SmenaDaniiAka.php">Змінити дані акаунту...</a></p></div>';
?>
        </div>

    <div class="block-header">
    <?php 
    include("modules/block-header.php");
    ?>
    </div>

<div class="block-content-and-right">

<div class="block-content">

 <div class="sort-poshuk">
    <div class="sort-vipad">
        <div class="sort">Сортування<?=$sort_name;?></div>
        <div class="sort-block none-sort">
            <a href="index.php?sort=price-desc">Від дешевшого...</a>
            <a href="index.php?sort=price-asc">Від дорожчого...</a>
            <a href="index.php?sort=county">Від А до Я...</a>
        </div></div>
    </div>

<ul> 
<?php
$result = mysqli_query($link,"SELECT * FROM Daiving ORDER BY $sorting");

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        do{
            echo '
            <li>
            <ul class="daiving"><div class="daiving-name">
                <li>'.$row["Name_Contr"].'</li>
                <li>'.$row["Date"].'</li>
                </div>
                <div class="daiving-opis">
                <li><img class="img-daiving" src="'.$row["Mini_Foto"].'" ></li>
                <li class="li-opis">'.$row["mini_Opis"].'</li>
                </div>
                <div class="daiving-Tsena">
                <li>Ціна: '.$row["Tsena"].' грн.</li>
                <a class="daiving-Button" href="modules/Tur.php?id_Diving='.$row["id_Diving"].'">Сторінка Туру</a>
                </div>
            </ul>
            </li>
            ';
        }while($row = mysqli_fetch_array($result));
    }
?>
</ul>
</div>

</div>

<div class="block-Ekspert">
    <div class="text_Ekspert">Експерти по дайвінгу</div>
    
    <ul> 
<?php
$Ekspert = mysqli_query($link,"SELECT * FROM Ekspert");

    if(mysqli_num_rows($Ekspert)>0){
        $row = mysqli_fetch_array($Ekspert);

        do{
            echo '
            <div class="info_Ekspert">
            <li><img class="ekspert_foto" src="Project-Foto/'.$row["Foto_Ekspert"].'" ></li>
            <div class="info_Ekspert_block">
            <div class="pib_Ekspert">
            <li>'.$row["Name_Ekspert"].'</li>
            <li>'.$row["SurName_Ekspert"].'</li>
            </div>
            <li>'.$row["Opis_Ekspert"].'</li>
            </div>
            </div>
            ';
        }while($row = mysqli_fetch_array($Ekspert));
    }
?>
</ul>
    
</div>
<?php
include("modules/block-footer.php");
?>
    </div>
    <script src="js/add.js"></script>
    <script src="js/sort.js"></script>
</body>
</html>