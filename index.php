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
    <title>Глибинні світи: Веб-дайвінг</title>
</head>
<body>
    
    <div class="block-body">

    <div class="block-header">
    <?php 
    include("modules/block-header.php");
    ?>
    </div>

<div class="block-content-and-right">

<div class="block-content">
<?php echo '<p>'.$_SESSION['user']['Name'].'</p>
<p>'.$_SESSION['user']['SurName'].'</p>
<p>'.$_SESSION['user']['Father'].'</p>
<p>'.$_SESSION['user']['Sex'].'</p>
<p>'.$_SESSION['user']['Age'].'</p>
<p>'.$_SESSION['user']['Tel'].'</p>
<p>'.$_SESSION['user']['Email'].'</p>
<p>'.$_SESSION['user']['Country'].'</p>';
?>
<img src="<?=$_SESSION['user']['Foto']?>" width="300px" >
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