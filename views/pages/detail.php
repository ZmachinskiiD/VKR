<?php
/**
 * @var int $id
 * @var array $movies
 * @var string $moviePosters
 * @var string $siteElements
 */
$buildingPhotos=getPhotosOfBuilding((int)$id);
$moviePosters=option('MOVIE_POSTERS');
$building=getBuilding($id)
//var_dump($id);
//var_dump($buildingPhotos);
?>
<!DOCTYPE html>


    <div class="films">
    <?= view('components/movieDetail',
        [

            'buildingPhotos'=>$buildingPhotos,
            'moviePosters'=>$moviePosters,
            'building'=>$building

        ])
    ?>
    </div>
