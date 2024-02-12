<?php
/**
 * @var array $buildingPhotos
 * @var Building $building
 *
 */
?>
<div class="building_card">
    <div class="card_header">
        <div class="rus_name">
            <?=$building->getRusTitle()?>
        </div>
        <div class="deu_name">
            <?=$building->getDeuTitle()?>
        </div>
    </div>
    <div class="building_info">
        <?=$building->getDescription()?>
    </div>
    <div class="building_photos">
        <?php foreach($buildingPhotos as $buildingPhoto):?>
            <img src="<?="./BuildingPhotos/".$buildingPhoto?> " height="400">
        <?php endforeach;?>
    </div>
</div>
