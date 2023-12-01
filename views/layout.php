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
    <link rel="stylesheet" href="styles/reset_1.css">
    <link rel="stylesheet" href="styles/layout.css">
    <link rel="stylesheet" href="<?=$style?>">
</head>
<body>

<?=$sidebar?>
<div class="content">

        <?=$topbar?>
        <?=$mainInfo?>
</body>
</html>

