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
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach($buildingPhotos as $buildingPhoto):?>
                <div class="swiper-slide">
                <img src="<?="/assets/objects/BuildingImages/{$building->getId()}/".$buildingPhoto?> " class="slider-photo">
                </div>
            <?php endforeach;?>
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>

</div>
<script src="/assets/scripts/swiper-bundle.min.js"></script>
<script src="/assets/scripts/swiper.js"></script>
