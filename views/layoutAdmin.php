<?php
$buildingList=getBuildingsId();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>

<div>
    <h1>Добро пожаловать на панель администрирования </h1>
</div>
<div class="main">
    <Button class="mainbutton" id="buildingButton">Добавить здание</Button>
    <Button class="mainbutton" id="photoButton">Добавить фотографию</Button>
</div>
<div>

    <form id="buildingForm" action="admin.php" method="post" >
        <input type="hidden" name="building"/>
        <input type="text" name="ru_title" placeholder="Название здания" />
        <input type="text" name="deu_title" placeholder="Название здания на немецком" />
        <input type="text" name="year" placeholder="Год постройки"/>
        <br>
        <input type="radio" id="before" name="doesExist" value="0">
        <label for="html">Не существует</label><br>
        <input type="radio" id="after" name="doesExist" value="1">
        <label for="css">Существует</label><br>
        <input type="text" name="description" placeholder="Описание">
        <input type="text" name="adres"  placeholder="Адрес">
        <input type="text" name="geo"  placeholder="Геолокация">
        <button type="submit" name="building" class="submit_button" >Отправить</button>
    </form>

    <form id="photoForm" action="admin.php" method="POST" enctype="multipart/form-data">
        <?php
        foreach ($buildingList as $building):
        ?>
            <input type="radio"  name="buildingName" value=<?=$building->getId()?>>
            <label for="html"><?=$building->getRusTitle()?></label><br>
        <?php
        endforeach;
        ?>
<!--        <input type="text" name="name" placeholder="Название здания" />-->
        <br>
        <input type="file" name="photo" placeholder="Выберите фотографию" />
        <br>
        <input type="radio" id="before" name="is_after_1945" value=0>
            <label for="html">До 1945</label><br>
        <input type="radio" id="after" name="is_after_1945" value=1>
            <label for="css">После 1945</label><br>

        <button type="submit" name="photoForm" class="submit_button" value="Submit">Отправить</button>


        <script  src="scripts/admin.js"></script>

</div>
</body>
</html>
