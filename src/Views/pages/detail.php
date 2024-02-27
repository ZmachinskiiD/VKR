<?php
/**
 * @var \Up\Models\Building $building
 * @var $buildingPhotos
 */
$sanitized = htmlspecialchars($building->getDescription(), ENT_QUOTES);
$amogus=str_replace(array("\r\n", "\n"), array("<br />", "<br />"), $sanitized);
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
        <?=$amogus?>
    </div>
    <div class="D_building_photos">
        <?php foreach($buildingPhotos as $buildingPhoto):?>
            <img src="<?="/assets/objects/BuildingImages/{$building->getId()}/".$buildingPhoto?> " height="400">
        <?php endforeach;?>
    </div>
</div>
<script src="/assets/js/swiper-bundle.min.js"></script>
