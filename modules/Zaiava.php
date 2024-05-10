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
    <link href="../css/Zaiava.css" rel="stylesheet">
    <link rel="shortcut icon" href="../Project-Foto/iconCompas.png" type="image/png">
    <?php
$foto = mysqli_query($link,"SELECT * FROM `Daiving` WHERE `id_Diving`='$id_Tur'");

if(mysqli_num_rows($foto)>0){
    $row = mysqli_fetch_array($foto);

    do{
    $turTitle=$row["Name_Contr"];
      $turFoto="../Project-Foto/Daiving/".$row["Foto"]."";
      $turPrice=$row["Tsena"];
          
    }while($row = mysqli_fetch_array($foto));
}

?>

    <title><?=$turTitle?></title>
</head>

<body style="background: url(<?=$turFoto?>)0 0/100% no-repeat fixed;">

<div class="block_form">
    <form>
        <div class="otstup">
    <label>Вкажіть бажану дату:</label>
    <input type="date" name="dateTur" placeholder="Вкажіть Дату..." class="date">
    </div>
    <div class="otstup">
    <label>Орендувати обладнання для дайвінгу:</label>
    <select  name="orenda" class="orenda-type">
    <option value="1">Ні</option>
    <option value="2">Так</option>
    </select>
    </div>
    <div class="otstup">
    <label>Оберіть експерта:</label>
    <select name="expert" class="expert" id="mySelect">
        <option value="1">Без експерта</option>
        <option value="2">Ірина Бувала</option>
        <option value="3">Олег Мідняк</option>
        <option value="4">Павло Володар</option>
    </select>
    </div>
    <div class="otstup">
    <label>Кінцева вартість:</label>
    <input type="text" name="tsena" class="read" readonly value="<?=$turPrice?>">
    <input type="text" name="id_tur" class="none" readonly value="<?=$id_Tur?>">
    </div>
    <div class="otstup">
    <div class="golovna">
    <button type="submit" class="button_form">Подати заявку...</button>
    <a href="../index.php">На головну?</a></div>
    <div class="msg none"><span>Lorem, ipsum dolor sit </span></div>
    </div>
    </form>
</div>

</body>
<script src="../js/jquery-3.7.1.js"></script>
<script src="../js/zaiava.js"></script>
<script>
    let currentDate = new Date();
// Додаємо один місяць до поточної дати
currentDate.setMonth(currentDate.getMonth() + 1);
// Форматуємо дату для HTML-атрибута "min"
let minDate = currentDate.toISOString().split('T')[0];

// Отримуємо всі елементи з класом "date"
let dateInputs = document.getElementsByClassName("date");
// Цикл для установки обмежень на всі поля введення дати з класом "date"
for (let i = 0; i < dateInputs.length; i++) {
    // Встановлюємо обмеження для введення дати
    dateInputs[i].setAttribute("min", minDate);
}
</script>
</html>