<?php
require_once __DIR__ . '/../boot.php';
$id=null;
//todo: rewrite check
//if (checkIfIdExists($_GET['id'],$movies))
//{
//    $id=$_GET['id'];
//}
$id=$_GET['id'];
require_once ROOT.'/boot.php';
echo view('layout',
    [
         'style'=>"styles/style_detail.css" ,
        'sidebar'=>view('components/sidebar',['siteElements'=>option('SITE_ELEMENTS')]),
        'topbar'=>view('components/topbar',[]),
        'mainInfo'=>view('pages/detail',
            [
                'id'=>$id
            ])
    ]);
?>
