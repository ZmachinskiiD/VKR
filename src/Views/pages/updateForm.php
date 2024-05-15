<?php
/**
 * @var \Up\Models\Building $building
 */
if($building->isDoesExist()===true)
{
    $doesExist=1;
}
else
{
    $doesExist=0;
}
?>
<div class="container">
    <div>Обновить здание</div>
<form action="/admin/updateBuilding/<?=$building->getId()?>/" method="post" enctype="multipart/form-data">
    <input  type="hidden" name="id" value="<?=$building->getId()?>">
    <div class="field">
        <label class="label">Введите название на русском</label>
        <div class="control">
            <input class="input" type="text" name="rus_name" value="<?=$building->getRusTitle()?>"placeholder="Введите название на русском">
        </div>
    </div>
    <div class="field">
        <label class="label">Введите название на немецком</label>
        <div class="control">
            <input class="input" type="text" name="deu_name"  value="<?=$building->getDeuTitle()?>"placeholder="Введите название на немецком">
        </div>
    </div>
    <div class="field">
        <label class="label">Описание</label>
        <div class="control">
            <textarea class="textarea" name="description" placeholder="Введите описания здания" rows="8">
                <?=$building->getDescription()?>
            </textarea>
        </div>
    </div>
    <div class="field">
        <label class="label">Название улицы</label>
        <div class="control">
            <input class="input" type="text" name="location" value="<?=$building->getAdress()?>" placeholder="Введите название улицы">
        </div>
    </div>
    <div class="field">
        <label class="label">Время постройки</label>
        <div class="control">
            <input class="input" type="text" name="time" value="<?=$building->getYearOfBuild()?>"placeholder="Введите время">
        </div>
    </div>
    <div class="field">
        <label class="label">Геолокация</label>
        <div class="control">
            <input class="input" type="text" name="geolocation"  value="<?=$building->getGeolocation()?>" placeholder="Введите геолокация">
        </div>
    </div>
<div class="field">
    <div class="control">
        Существут ли здание
        <label class="radio">
            <input type="radio" name="doesExist" value="1" checked>
            Да
        </label>
        <label class="radio">
            <input type="radio" name="doesExist" value="0">
            Нет
        </label>
    </div>


<div class="field is-grouped">
    <div class="control">
        <button class="button is-link" >Submit</button>
    </div>
</div>
</form>
</div>
