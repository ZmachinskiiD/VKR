<?php
require_once __DIR__ . '/../boot.php';
echo view('layout',
    [
        'style'=>"styles/style_index.css" ,
        'sidebar'=>view('components/sidebar',['siteElements'=>option('SITE_ELEMENTS')]),
        'topbar'=>view('components/topbar',[]),
        'mainInfo'=>view('pages/addFilm',
            [
            ])
    ]);
?>