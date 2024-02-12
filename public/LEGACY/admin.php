<?php
require_once __DIR__ . '/../boot.php';
if($_SERVER['REQUEST_METHOD']==='POST')
{

    if( isset($_POST['building'] ))
    {
        $building= new building(null,$_POST["ru_title"],$_POST["deu_title"],$_POST["year"],$_POST["doesExist"],
            null,$_POST ["description"],NULL,$_POST ["geo"],$_POST ["adress"]
        );
        insertBuilding($building);
    }
    if( isset($_POST['photoForm'] ))
    {
        var_dump($_POST);
        $uploads_dir = "BuildingPhotos";
        $name=$_FILES["photo"]['name'];
        move_uploaded_file( $_FILES["photo"]["tmp_name"], "./".$uploads_dir."/".$name);
        insertPhoto(
            (int)$_POST['buildingName'],
                $_FILES["photo"]['name'],
                (int)$_POST['is_after_1945']
        );
    }
}
echo view('layoutAdmin',[]);
?>

