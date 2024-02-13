<?php

use Up\Services\ImageService;

require_once __DIR__ . '/../boot.php';
//$data=scandir("objects/images");
$isAfter1945=null;

if(isset($_GET['is_after_1945']))
{
    $isAfter1945=$_GET['is_after_1945'];
}
$photos=ImageService::getPhotos($isAfter1945);
$data=ImageService::getPhotos($isAfter1945);
echo view('layout',
    [
        'style'=>"styles/archive.css" ,
        'sidebar'=>view('components/sidebar',['siteElements'=>option('SITE_ELEMENTS')]),
        'topbar'=>view('components/topbar',[]),
        'mainInfo'=>view('pages/archive',['data'=>$data,'moviePosters'=>option('MOVIE_POSTERS'),]

            )
    ]);
?>