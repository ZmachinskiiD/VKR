<div class="container">
    <div>Добавить здание</div>
<form action="/admin/create/" method="post">
    <div class="field">
        <label class="label">Введите название на русском</label>
        <div class="control">
            <input class="input" type="text" name="rus_name"placeholder="Введите название на русском">
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

<div class="field is-grouped">
    <div class="control">
        <button class="button is-link" >Submit</button>
    </div>
</div>
</form>
</div>