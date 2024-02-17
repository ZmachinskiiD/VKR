<?php
/**
 * @var $building
 * @var $buildingPhotos
 */
?>
<div class="building_card">
    <div class="building_card__card_header">
        <div class="D_rus_name">
            <?=$building->getRusTitle()?>
        </div>
        <div class="D_deu_name">
            <?=$building->getDeuTitle()?>
        </div>
    </div>
    <div class="D_building_info">
        <?=$building->getDescription()?>
    </div>
    <div class="D_building_photos">
        <?php foreach($buildingPhotos as $buildingPhoto):?>
            <img src="<?="./BuildingPhotos/".$buildingPhoto?> " height="400">
        <?php endforeach;?>
    </div>
</div>
