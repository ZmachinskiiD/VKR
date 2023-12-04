<?php
/**
 * @var string $siteElements
 */
 require_once  __DIR__.'/../../boot.php';
 global $genres;
?>
<div class="search_bar">
    <a href="/" class="logo-link">
        КЁНИГСБЕРСКИЙ УНИВЕРСИТЕТ
    </a>
    <nav class="sidebar_menu">
        <ul>
            <li class="menu-item"><a href="/" class="menu-link"  title="Главная">Главная</a></li>
            <li class="menu-item"><a href="/?doesExist=true" class="menu-link"  title="Сохранившиеся здания">Сохранившиеся здания</a></li>
            <li class="menu-item"><a href="/?doesExist=false" class="menu-link"  title="Исчезнувшие здания">Исчезнувшие здания</a></li>
            <li class="menu-item"><a href="/?navigation.php" class="menu-link"  title="Постройка маршрута">Постройка маршрута</a></li>
            <li class="menu-item"><a href="/archive.php" class="menu-link" title="Архив">Архив</a></li>
            <li class="menu-item"><a href="/archive.php?is_after_1945=false" class="menu-link" title="Архив_Старые">Архив_Старые</a></li>
            <li class="menu-item"><a href="/archive.php?is_after_1945=true" class="menu-link" title="Архив_Новые">Архив_Новые</a></li>
        </ul>
    </nav>
</div>