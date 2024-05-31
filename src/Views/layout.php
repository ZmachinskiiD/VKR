<?php
/**
 * @var string $topbar
 * @var string $mainInfo
 * @var string $sidebar
 * @var string $style
 */

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/styles/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/styles/reset_1.css">
    <link rel="stylesheet" href="/assets/styles/style_index.css">
    <link rel="stylesheet" href="/assets/styles/style_detail.css">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=b1da9394-2180-404f-80a1-c19c0f8e1c0b&lang=ru_RU"></script>

</head>
<body>
<html class="theme-light">
<?= $this->renderComponent('topbar', []) ?>
<div class="container">
        {{content}}
</div>
</body>
<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <strong>КёнигГебойде</strong> by <a href="https://github.com/ZmachinskiiD/VKR">Dmitrii Zmachinskii</a>.
            БФУ 2024
        </p>
    </div>
</footer>
</html>

