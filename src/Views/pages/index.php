<?php
/**
 * @var bool $siteElements
 * @var \Up\Models\Building[] $buildings
 * @var $buildingCards
 */
?>

<div class="films">
<?php foreach($buildings as $building):?>
    <div class="movie_container">
        <div class="movie">
            <img class="poster" src="<?=$buildingCards."{$building->getId()}/{$building->getLogopath()}"?>?>" alt="Image">
            <div class="movie_info">
                <div class="name">
                    <p class="rus_name"><?=$building->getRusTitle(); ?></p>
                    <p class="en_name"><?=$building->getDeuTitle(); ?></p>
                </div>
                <div class="description">
					<?=$building->getDescription(); ?>
                </div>
                <div class="footer">
                    <div>
						<?=$building->getAdress(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="effect">
            <button class="more" onclick="window.location.href='/detail/?id=<?=$building->getId()?>'" >
                Узнать подробнее
            </button>
        </div>
    </div>

<?php endforeach;?>

</div>
