<?php
/**
 * @var \Up\Models\Building $building
 * @var $buildingPhotos
 * @var \Up\Models\Comment[] $comments
 * @var $id
 */
$sanitized = htmlspecialchars($building->getDescription(), ENT_QUOTES);
$amogus=str_replace(array("\r\n", "\n"), array("<br />", "<br />"), $sanitized);
?>
<div class="content has-background-light">
    <div class="block">
            <div class="block">
            <div class="D_rus_name">
                <?=$building->getRusTitle()?>
            </div>
            </div>
            <div class="block">
            <div class="D_deu_name">
                <?=$building->getDeuTitle()?>
            </div>
            </div>
            <div class="block">
            <div class="D_building_info">
                <?=$amogus?>
            </div>
            </div>
    </div>
    <div class="block">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($buildingPhotos as $buildingPhoto):?>
                    <div class="swiper-slide">
                    <img src="<?="/assets/objects/BuildingImages/{$building->getId()}/".$buildingPhoto?> " class="slider-photo">
                    </div>
                <?php endforeach;?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
</div>
<article class="media">
    <form action="/detail/<?=$id?>/" method="post">
    <div class="media-content">
        <nav class="level">
        <div class="level-right">
            <p class="control">
                <textarea class="textarea" id="comment" name="comment" placeholder="Оставьте комментарий..."></textarea>
            </p>
        </div>
            <div class="level-left">
                <div class="level-item">
                    <button  class="button is-info">Submit</button>
                </div>
            </div>
        </nav>

    </div>
    </form>
</article>
<div class="container is-max-desktop"  >
    <?php foreach ($comments as $comment):?>
    <article class="media">
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?=$comment->getUserName()?></strong>
                    <br />
                    <?=$comment->getText()?>
                    <br />
                </p>
            </div>
        </div>
    </article>
    <?php endforeach;?>
</div>
<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <strong>КёнигГебойде</strong> by <a href="https://jgthms.com">Dmitrii Zmachinskii</a>.
            БФУ 2024
        </p>
    </div>
</footer>
<script src="/assets/scripts/swiper-bundle.min.js"></script>
<script src="/assets/scripts/swiper.js"></script>
