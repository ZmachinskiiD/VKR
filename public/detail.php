<?php
require_once  __DIR__ .'/../boot.php';
$id=null;
if (checkIfIdExists($_GET['id'],$movies))
{
    $id=$_GET['id'];
}
require_once ROOT.'/boot.php';
echo view('layout',
    [
         'style'=>"styles/style_detail.css" ,
        'sidebar'=>view('components/sidebar',['siteElements'=>option('SITE_ELEMENTS')]),
        'topbar'=>view('components/topbar',[]),
        'mainInfo'=>view('pages/detail',
            ['moviePosters'=>option('MOVIE_POSTERS'),
                'siteElements'=>option('SITE_ELEMENTS'),
                'movies'=>$movies,
                'id'=>$id
            ])
    ]);
?>
