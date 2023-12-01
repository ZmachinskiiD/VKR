<?php
/**
 * @var int $id
 * @var array $movies
 * @var string $moviePosters
 * @var string $siteElements
 */
$movie = [];
$ratingArray=[];
if ($id!==null)
{
    $key = array_search($id, array_column($movies, 'id'));
    $movie = $movies[$key];
    $ratingArray=getSquaresCount($movie['rating']);
}
//$ratingArray=getSquaresCount($movie['rating']);
?>
<!DOCTYPE html>

<?php if($movie !== []): ?>
    <div class="films">
    <?= view('components/movieDetail',
        [
            'movie'=>$movie,
            'siteElements'=>$siteElements,
            'moviePosters'=>$moviePosters,
            'ratingArray'=>$ratingArray,

        ])
    ?>
    </div>
<?php else: ?>
<div class="films">
    Такого фильма не существует. Вернитесь на главную
</div>
<?php endif ?>
