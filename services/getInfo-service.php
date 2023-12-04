<?php
function getBuildings(?string $doesExist=null):array
{
//    $clause="1=1";
    $connection=getDbConnection();
    $clause=getToString($connection,$doesExist,"doesExist");
    $clause=mysqli_real_escape_string($connection,$clause);
    $result=mysqli_query($connection,
        "SELECT 
    `id`, `rus_name`, `deu_name`,
    `description`, `location`,
    `doesExist`, `logoPath`
    FROM `buildings` 
    WHERE {$clause};"
    );
    if (!$result)
    {
        throw new Exception(mysqli_error($connection));
    }

    $buildings=[];
    while($row=mysqli_fetch_assoc($result))
    {
        $building=new Building($row['id'],$row['rus_name'],$row['deu_name'],null,
            null,null,$row['description'],$row['logoPath'],null,null);
        $buildings[]=$building;
    }
    return $buildings;
}
function getPhotos(?string  $isAfter1945=null):array
{
    $photos=[];
    $connection=getDbConnection();
    $clause=getToString($connection,$isAfter1945,"is_after_1945");
    $clause=mysqli_real_escape_string($connection,$clause);
    $result=mysqli_query($connection,
        "
    SELECT  path FROM photos
    WHERE {$clause};"
    );
    if (!$result)
    {
        throw new Exception(mysqli_error($connection));
    }
    while($row=mysqli_fetch_assoc($result))
    {
        $photos[]=$row['path'];
    }
    return $photos;
}