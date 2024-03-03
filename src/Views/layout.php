<?php
/**
 * @var string $topbar
 * @var string $mainInfo
 * @var string $sidebar
 * @var string $style
 */
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/styles/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/styles/reset_1.css">
    <link rel="stylesheet" href="/assets/styles/layout.css">
    <link rel="stylesheet" href="/assets/styles/style_index.css">
    <link rel="stylesheet" href="/assets/styles/style_detail.css">
    <link rel="stylesheet" href="/assets/styles/404.css">

</head>
<body>

<?= $this->renderComponent('sidebar', []) ?>
<div class="content">

    <?= $this->renderComponent('topbar', []) ?>
        {{content}}
</body>
</html>

