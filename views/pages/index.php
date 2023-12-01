<?php
/**
 * @var string $moviePosters
 * @var bool $siteElements
 * @var array $buildings
 */
?>
<div class="films">
<?php foreach($buildings as $building):?>
    <?= view('components/movieGrid',
        [
        'building'=>$building,
        'siteElements'=>$siteElements,
        'moviePosters'=>$moviePosters

        ])
    ?>
<?php endforeach;?>

</div>
