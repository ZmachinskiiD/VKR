<?php

use Up\Services\BuildingService;

require_once  __DIR__ .'/../boot.php';
$doesExist=$_GET['doesExist']??null;
$sortedBuildings=BuildingService::getBuildings($doesExist);
$buildingImages=option("BUILDING_IMAGES");
echo view('layout',
    [
    'style'=>"styles/style_index.css" ,
    'sidebar'=>view('components/sidebar',['siteElements'=>option('SITE_ELEMENTS')]),
    'topbar'=>view('components/topbar',[]),
    'mainInfo'=>view('pages/index',
        [
            'siteElements'=>option('SITE_ELEMENTS'),
            'buildings'=>$sortedBuildings,
            'buildingImages' =>$buildingImages,
        ])
    ]);
?>

