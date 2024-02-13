<?php
/**
 * @var int $id
 * @var array $movies
 * @var string $moviePosters
 * @var string $siteElements
 */

use Up\Services\BuildingService;
use Up\Services\ImageService;

$buildingPhotos=ImageService::getPhotosOfBuilding((int)$id);
$building=BuildingService::getBuildingInfo($id)
//var_dump($id);
//var_dump($buildingPhotos);
?>
<!DOCTYPE html>


    <div class="films">
    <?= view('components/movieDetail',
        [

            'buildingPhotos'=>$buildingPhotos,
            'building'=>$building

        ])
    ?>
    </div>
