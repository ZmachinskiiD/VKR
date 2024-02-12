<?php
//function getBuildings(?string $doesExist=null):array
//{
////    $clause="1=1";
//    $connection=getDbConnection();
//    $clause=getToString($connection,$doesExist,"doesExist");
//    $clause=mysqli_real_escape_string($connection,$clause);
//    $result=mysqli_query($connection,
//        "SELECT
//    `id`, `rus_name`, `deu_name`,
//    `description`, `location`,
//    `doesExist`, `logoPath`
//    FROM `buildings`
//    WHERE {$clause};"
//    );
//    if (!$result)
//    {
//        throw new Exception(mysqli_error($connection));
//    }
//
//    $buildings=[];
//    while($row=mysqli_fetch_assoc($result))
//    {
//        $building=new Building($row['id'],$row['rus_name'],$row['deu_name'],null,
//            null,null,$row['description'],$row['logoPath'],null,null);
//        $buildings[]=$building;
//    }
//    return $buildings;
//}
//function getBuilding(int $id):Building
//{
//    $connection=getDbConnection();
//    $result=mysqli_query($connection,
//        "SELECT *
//    FROM `buildings`
//    WHERE `id`={$id};");
//     if (!$result)
//     {
//         throw new Exception(mysqli_error($connection));
//     }
//    $row=mysqli_fetch_assoc($result);
////     var_dump($row);
//    $building=new Building(
//        $row['id'],$row['rus_name'],$row['deu_name'],$row['build_date'],
//        $row['doesExist'],$row['author_id'],$row['description'],
//        $row['logoPath'],$row['geolocation'],$row['location']
//
//    );
//    return $building;
//}
//function getPhotos(?string  $isAfter1945=null):array
//{
//    $photos=[];
//    $connection=getDbConnection();
//    $clause=getToString($connection,$isAfter1945,"is_after_1945");
//    $clause=mysqli_real_escape_string($connection,$clause);
//    $result=mysqli_query($connection,
//        "
//    SELECT  path FROM photos
//    WHERE {$clause};"
//    );
//    if (!$result)
//    {
//        throw new Exception(mysqli_error($connection));
//    }
//    while($row=mysqli_fetch_assoc($result))
//    {
//        $photos[]=$row['path'];
//    }
//    return $photos;
//}
//function getPhotosOfBuilding(?int  $id=null):array
//{
//    $photos=[];
//    $connection=getDbConnection();
//    //$clause=getToString($connection,$id,"is_after_1945");
//    $clause=mysqli_real_escape_string($connection,$id);
//    $result=mysqli_query($connection,
//        "
//    SELECT  path FROM photos
//    WHERE building_id={$id};"
//    );
//    if (!$result)
//    {
//        throw new Exception(mysqli_error($connection));
//    }
//    while($row=mysqli_fetch_assoc($result))
//    {
//        $photos[]=$row['path'];
//    }
//    return $photos;
//}
//function insertPhoto($Building_id,$path,$isAfter1945)
//{
//    $connection=getDbConnection();
//    $sql="
//    INSERT INTO photos(building_id,path,is_after_1945)
//    VALUES(
//          '{$Building_id}',
//           '{$path}',
//           '{$isAfter1945}'
//    )
//    ";
//    $result=mysqli_query($connection,$sql);
//    if(!$result)
//    {
//        throw new Exception(mysqli_error($connection));
//    }
//    return true;
//}
//function insertBuilding(Building $building)
//{
//    //todo Сделать вставку геолокации
//    $connection=getDbConnection();
//    $buildDate=(int)$building->getYearOfBuild();
//    $rusName=$building->getRusTitle();
//    $deuName=$building->getDeuTitle();
//    $description=$building->getDescription();
//    $doesExist=(int)$building->isDoesExist();
//    var_dump($doesExist);
//    $geolocation=$building->getGeolocation();
//    $location=$building->getAdress();
//    $logo=$building->getLogopath();
//    $sql="
//INSERT INTO buildings(build_date,description,deu_name,doesExist,geolocation,location,logoPath,rus_name)
//VALUES('{$buildDate}','{$description}','{$deuName}','{$doesExist}',NULL,'{$location}','{$logo}','{$rusName}')
//";
//    $result=mysqli_query($connection,$sql);
//    if(!$result)
//    {
//        throw new Exception(mysqli_error($connection));
//    }
//    return true;
//}
//function getBuildingsId():array
//{
//    $connection=getDbConnection();
//    $result=mysqli_query($connection,
//        "SELECT
//    `id`, `rus_name`
//    FROM `buildings` "
//    );
//    if (!$result)
//    {
//        throw new Exception(mysqli_error($connection));
//    }
//
//    $buildings=[];
//    while($row=mysqli_fetch_assoc($result))
//    {
//        $building=new Building($row['id'],$row['rus_name'],null,null,
//            null,null,null,null,null,null);
//        $buildings[]=$building;
//    }
//    return $buildings;
//}
?>