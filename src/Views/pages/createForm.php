<div class="container">
    <div>Добавить здание</div>
<form action="/admin/create/" method="post" enctype="multipart/form-data" onkeydown="if(event.keyCode === 13) {
    return false;
}">
    <div class="field">
        <label class="label">Введите название на русском</label>
        <div class="control">
            <input class="input" type="text" name="rus_name" required placeholder="Введите название на русском">
        </div>
    </div>
    <div class="field">
        <label class="label">Введите название на немецком</label>
        <div class="control">
            <input class="input" type="text" name="deu_name" placeholder="Введите название на немецком">
        </div>
    </div>
    <div class="field">
        <label class="label">Описание</label>
        <div class="control">
            <textarea class="textarea" name="description" placeholder="Введите описания здания" rows="8"></textarea>
        </div>
    </div>
    <div class="field">
        <label class="label">Название улицы</label>
        <div class="control">
            <input class="input" type="text" name="location" placeholder="Введите название улицы">
        </div>
    </div>
    <div class="field">
        <label class="label">Время постройки</label>
        <div class="control">
            <input class="input" type="number" name="time" placeholder="Введите время">
        </div>
    </div>
    <div class="field">
        <label class="label">Геолокация</label>
        <div class="control">
            <input class="input" type="text" name="geolocation" placeholder="Введите геолокация">
        </div>
    </div>
<div class="field">
    <div class="control">
        Существут ли здание
        <label class="radio">
            <input type="radio" name="doesExist" value="1">
            Да
        </label>
        <label class="radio">
            <input type="radio" name="doesExist" value="0">
            Нет
        </label>
    </div>
</div>
<div id="file-js-example" class="file has-name">
    <label class="file-label">
        <input class="file-input" type="file" name="mainPhoto" />
        <span class="file-cta">
  <span class="file-icon">
    <i class="fas fa-upload"></i>
  </span>
  <span class="file-label"> Выберите главное изображение </span>
</span>
        <span class="file-name"> Файл не выбран </span>
    </label>
</div>
<div>
    <input type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple">
</div>

<div class="field is-grouped">
    <div class="control">
        <button class="button is-link" >Submit</button>
    </div>
</div>
</form>
    <script>
        const fileInput = document.querySelector("#file-js-example input[type=file]");
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector("#file-js-example .file-name");
                fileName.textContent = fileInput.files[0].name;
            }
        };
    </script>
</div>
