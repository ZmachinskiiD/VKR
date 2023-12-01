<?php
function getBuildings(?string $doesExist=null):array
{
    $connection=getDbConnection();
    $clause=escapeDoesExist($connection,$doesExist);
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
//            [
//                'id'=>$row['id'],
//                'rus_name'=>$row['rus_name'],
//                'deu_name'=>$row['deu_name'],
//                'description'=>$row['description'],
//                'location'=>$row['location'],
//                'logoPath'=>$row['logoPath']
//            ];

    }
//    var_dump($buildings);
    return $buildings;
}