<?php
/**
 * @var string $moviePosters
 * @var bool $siteElements
 * @var Building[] $buildings
 * @var string $buildingImages
 */
?>
<div class="films">
<?php foreach($buildings as $building):?>
    <?= view('components/movieGrid',
        [
        'building'=>$building,
        'siteElements'=>$siteElements,
        'buildingCard'=>$buildingImages."/{$building->getId()}/{$building->getLogopath()}",

        ])
    ?>
<?php endforeach;?>

</div>
