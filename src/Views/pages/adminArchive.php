<?php
/**
 * @var Photo[] $images
 */
use Up\Models\Photo;
?>
<div class="photo_list">
    <div class="grid has-background-grey">
		<?php foreach($images as $image):?>
            <div class="card" id="<?=$image->getId()?>">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img

                                src="<?=$image->getPath()?>"
                                alt="Placeholder image"
                        />
                    </figure>
                </div>
                <div class="card-content">
                    <form action="/admin/changePhoto/" method="post">
                        <input type="hidden" name="id" value=<?=$image->getId()?>>
                    <textarea  name=text rows=6 cols="40" class="content"><?=$image->getDescription()?></textarea>
                </div>
                <nav class="level">
                    <div class="level-item">
                <button type="button" onclick="deletePhoto(<?=$image->getId()?>)">X</button>
                    </div>
                    <div class="level-item">
                        <button type="submit" >Редактировать описание</button>
                    </div>
                </nav>
                </form>
            </div>
		<?php endforeach;?>
    </div>
</div>
<div>
    <form enctype="multipart/form-data" method="post" action="/admin/archive/">
        <nav class="level">
            <textarea name="description" rows="2" cols="20"></textarea>
            <button type="submit" class="button is-dark">Отправить фотографию</button>
        </nav>
        <input type="file" name="photo" id="photo">
        <figure class="image is-128x128">
            <img id='preview'src="https://bulma.io/assets/images/placeholders/128x128.png" />
        </figure>
    </form>
</div>
<script src="/assets/scripts/adminArchive.js"></script>
