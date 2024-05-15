<?php
/**
 * @var array $data
 * @var Photo[] $images
 */

use Up\Models\Photo;

?>

<div class="photo_list">
    <div class="grid has-background-grey">
        <?php foreach($images as $image):?>
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img

                                src="<?=$image->getPath()?>"
                                alt="Placeholder image"
                        />
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <?=$image->getDescription()?>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
