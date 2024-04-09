<?php
/**
 * @var Up\Models\Building[] $buildings
 */
?>
<div class="columns is-multiline">
    <?php foreach ($buildings as $building):?>
    <div class="column">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><?=$building->getRusTitle()?></p>
                <button class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
                </button>
            </header>
            <footer class="card-footer">
                <a href="#" class="card-footer-item">Редактировать</a>
                <a href="#" class="card-footer-item">Удалить</a>
            </footer>
        </div>
    </div>
    <?php endforeach;?>
</div>
