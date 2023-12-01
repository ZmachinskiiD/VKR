<?php
/**
 * @var string $moviePosters
 * @var bool $siteElements
 * @var array $movie
 * @var array $ratingArray
 */
?>
<div class="movie_card">
    <div class="movie_card_title">
        <div class="title_text">
            <p class="rus_name"><?= $movie['title'] ?></p>
            <p class="en_name"><?= $movie['original-title'] ?></p>
        </div>
        <div class="like">
            <table class="age"><td><?= $movie['age-restriction'] ?>+</td></table>
            <img src="<?= $siteElements."Heart.png"; ?>">
        </div>
    </div>
    <div class="movie_card_info">
        <div class="movie_poster">
            <img class="poster"src="<?= $moviePosters.$movie['id'].".jpg"; ?>" alt="Image 1">
        </div>
        <div class="movie_desc">
            <div class="raiting">
                <?php for ($i = 0; $i < $ratingArray[0]; $i++): ?>
                    <img src="<?= $siteElements."Rectangle_full.svg"; ?>" alt="dk">
                <?php endfor ?>
                <?php for ($i = 0; $i < $ratingArray[1]; $i++): ?>
                    <img src="<?= $siteElements."Rectangle_empty.svg"; ?>" alt="dk">
                <?php endfor ?>
                <div class="container">
                    <img src="<?= $siteElements."Ellipse_2.svg"; ?>" alt="Snow" style="width:100%;">
                    <div class="centered"><?= $movie['rating'] ?></div>
                </div>
            </div>
            <div class="actor_info">
                <p>О фильме</p>
                <table class="movie_table">
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Год производства</td>
                        <td><?= $movie['release-date'] ?></td>
                    </tr>
                    <tr>
                        <td>Режисёр</td>
                        <td> <?= $movie['director'] ?></td>
                    </tr>
                    <tr>
                        <td>В главных ролях</td>
                        <td><?= implode(" ",$movie['cast']) ?></td>
                    </tr>
                </table>
            </div>
            <div class="movie_text">
                <p class="Описание">Описание</p>
                <p class="textD">
                    <?php echo $movie['description']; ?>
                </p>
            </div>
        </div>
    </div>

</div>
