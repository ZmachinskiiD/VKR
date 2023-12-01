<?php
/**
 * @var Building $building
 * @var string $moviePosters
 * @var string $siteElements
 */
?>
<div class="movie_container">
    <div class="movie">
        <img class="poster" src="<?=$moviePosters.$building->getId().".jpg"; ?>" alt="Image">
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
                    <img src="<?=$siteElements."clock1.png" ?>" alt="clock">
                </div>
                <div>
                    <?=$building->getAdress(); ?>
                </div>
                <div>
                    <?=$building->getAdress(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="effect">
        <button class="more" onclick="window.location.href='/detail.php?id=<?=$movie['id']?>'" >
            Узнать подробнее
        </button>
    </div>
</div>
