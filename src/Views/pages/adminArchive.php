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
                    <div class="content">
						<?=$image->getDescription()?>
                    </div>
                </div>
                <nav class="level">
                    <div class="level-item">
                <button type="button" onclick="deletePhoto(<?=$image->getId()?>)">X</button>
                    </div>
                    <div class="level-item">
                        <button type="button" >Редакровать описание</button>
                    </div>
                </nav>
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
<script>
    photo=document.getElementById("photo");
    preview=document.getElementById("preview");
    photo.onchange = evt => {
        const [file] = photo.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
<script>
    async function deletePhoto(id)
    {
        const response = await fetch('/deletePhoto/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                },
                body: id,
            }
        );
        const responseText = await response.json();
        console.log("HERE")
        if (responseText.result !== 'Y')
        {
            console.log('error while deleting');

        }
        else
        {
            console.log(responseText.data);
            comment=document.getElementById(id);
            comment.remove();
        }
    }
</script>
