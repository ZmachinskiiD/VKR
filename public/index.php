<?php
require_once  __DIR__ .'/../boot.php';
$doesExist=$_GET['doesExist'];
$sortedBuildings=getBuildings($doesExist);
echo view('layout',
    [
    'style'=>"styles/style_index.css" ,
    'sidebar'=>view('components/sidebar',['siteElements'=>option('SITE_ELEMENTS')]),
    'topbar'=>view('components/topbar',[]),
    'mainInfo'=>view('pages/index',
        ['moviePosters'=>option('MOVIE_POSTERS'),
            'siteElements'=>option('SITE_ELEMENTS'),
            'buildings'=>$sortedBuildings
        ])
    ]);
?>

