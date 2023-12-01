<?php
require_once  __DIR__ .'/../boot.php';
$genre=null;
$doesExist=$_GET['doesExist'];
//if(isset($_GET['genre']))
//{
//    {
//        if(checkIfGenreExists($_GET['genre'],$genres))
//        {
//            $genre=$_GET['genre'];
//        }
//        else if(array_key_exists($_GET['genre'], $genres) )
//            {
//                $genre=$genres[$_GET['genre']];
//            }
//
//
//    }
//}
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

