<?php
?>
<div>
    <form enctype="multipart/form-data" method="post" action="/admin/archive/">
        <textarea name="description" rows="2" cols="20"></textarea>
        <input type="file" name="photo" id="photo">
        <figure class="image is-128x128">
            <img id='preview'src="https://bulma.io/assets/images/placeholders/128x128.png" />
            <button type="submit">ТЕСТ</button>
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
