<?php
require_once  __DIR__ .'/../boot.php';
$data=scandir("objects/images");
$data = array_diff($data, array('.', '..'));
echo view('layout',
    [
        'style'=>"styles/archive.css" ,
        'sidebar'=>view('components/sidebar',['siteElements'=>option('SITE_ELEMENTS')]),
        'topbar'=>view('components/topbar',[]),
        'mainInfo'=>view('pages/archive',['data'=>$data,'moviePosters'=>option('MOVIE_POSTERS')]

            )
    ]);
?>