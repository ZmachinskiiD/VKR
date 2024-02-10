<?php
class BuildingService
{
    public static function getBuildings(?string $doesExist=null):array
    {
        $connection=getDbConnection();
        $clause=getToString($connection,$doesExist,"doesExist");
        $clause=mysqli_real_escape_string($connection,$clause);
        $query="SELECT `id`, `rus_name`, `deu_name`,`description`, `location`,doesExist`, `logoPath`"
            ."FROM `buildings`  WHERE {$clause} ";
        $result=mysqli_query($connection,$query);
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
    public static function getBuildingInfo($id)
    {
        $connection=getDbConnection();
        $query="SELECT * FROM `buildings`  WHERE `id`={$id}";
        $result=mysqli_query($connection, $query);
        if (!$result)
        {
            throw new Exception(mysqli_error($connection));
        }
        $row=mysqli_fetch_assoc($result);
        $building=new Building(
            $row['id'],$row['rus_name'],$row['deu_name'],$row['build_date'],
            $row['doesExist'],$row['author_id'],$row['description'],
            $row['logoPath'],$row['geolocation'],$row['location']

        );
        return $building;
    }
}