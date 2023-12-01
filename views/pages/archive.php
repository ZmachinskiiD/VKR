<?php
/**
 * @val array data
 * @val string moviePosters
 */
?>

<div class="photo_list">
    <?php foreach($data as $photo):?>
    <img src="<?=$moviePosters.$photo?>" class="archive_photo">
    <?php endforeach;?>
</div>
