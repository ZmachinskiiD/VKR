<?php

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/assets/styles/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/styles/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/styles/reset_1.css">
    <link rel="stylesheet" href="/assets/styles/admin.css">
    <link rel="stylesheet" href="/assets/styles/style_index.css">
    <link rel="stylesheet" href="/assets/styles/style_detail.css">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css"
    >
    <link rel="shortcut icon" type="image/x-icon" href="/assets/favicon.ico">
</head>
<body>
<div class="here">
    <?= $this->renderComponent('adminTopBar', []) ?>
</div>
<div class="there">
    {{content}}
</div>
</body>
</html>
