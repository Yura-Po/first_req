<?php
session_start();
include("modules/db_connect.php");
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
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

</div>

<div class="block-right"></div>

</div>

<?php
include("modules/block-footer.php");
?>
    </div>
    <script src="js/add.js"></script>
</body>
</html>