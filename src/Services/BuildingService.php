<?php

namespace Up\Services;
use Core\DB\DbConnection;
use Core\Http\Request;
use Up\Models\Building;

class BuildingService
{
	public static function getBuildings(?string $doesExist = null): array
	{
//        $clause="1=1";
		$connection = DbConnection::get();
		$clause = DataPreparationService::getToString($doesExist, "doesExist");
		$clause = mysqli_real_escape_string($connection, $clause);
		$query = "SELECT `id`, `rus_name`, `deu_name`,`description`, `location`,doesExist`, `logoPath`"
			. " FROM BUILDINGS "
			. " WHERE {$clause} ";
		$result = mysqli_query($connection, "SELECT 
    `id`, `rus_name`, `deu_name`,
    `description`, `location`,
    `doesExist`, `logoPath`
    FROM `buildings` 
    WHERE {$clause};");
		if (!$result)
        {
			throw new Exception(mysqli_error($connection));
		}

		$buildings = [];
		while ($row = mysqli_fetch_assoc($result))
        {
			$building = new Building($row['id'], $row['rus_name'], $row['deu_name'], null,
				null, null, $row['description'], $row['logoPath'], null, $row['location']);
			$buildings[] = $building;
		}
		return $buildings;

	}

	public static function getBuildingInfo($id)
	{
		$connection =  DbConnection::get();
		$query = "SELECT * FROM `buildings`  WHERE `id`={$id}";
		$result = mysqli_query($connection, $query);
		if (!$result) {
			throw new Exception(mysqli_error($connection));
		}
		$row = mysqli_fetch_assoc($result);
		$building = new Building(
			$row['id'], $row['rus_name'], $row['deu_name'], $row['build_date'],
			$row['doesExist'], $row['author_id'], $row['description'],
			$row['logoPath'], $row['geolocation'], $row['location']

		);
		return $building;
	}

	public static function insertBuilding():int
	{
        $request=Request::getBody();

		$rus_name=$request['rus_name'];
        $deu_name=$request['deu_name'];
        $description=$request['description'];
        $location=$request['location'];
        $geolocation=$request['geolocation'];
        $buildDate=$request['time'];
        $doesExist=$request['doesExist'];

        $connection = DbConnection::get();
        $result="INSERT INTO buildings(`rus_name`,`deu_name`,`description`,`build_date`,`doesExist`,`location`,`geolocation`)"
            ."    VALUES('{$rus_name}','{$deu_name}','{$description}','{$buildDate}','{$doesExist}','{$location}','{$geolocation}')";
        $connection->query($result);
        $id=$connection->insert_id;
        if (!mkdir("./assets/objects/BuildingImages/{$id}") && !is_dir("./assets/objects/BuildingImages/{$id}"))
        {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', "./assets/objects/BuildingImages/{$id}"));
        }
        return $id;
	}

	public static function getBuildingsId(): array
	{
		$connection = getDbConnection();
		$result = mysqli_query($connection,
			"SELECT 
    `id`, `rus_name`
    FROM `buildings` "
		);
		if (!$result) {
			throw new Exception(mysqli_error($connection));
		}

		$buildings = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$building = new Building($row['id'], $row['rus_name'], null, null,
				null, null, null, null, null, null);
			$buildings[] = $building;
		}
		return $buildings;
	}

    /**
     * @return bool|\mysqli_result
     */
    public static function getBuildingsForMap(): string
    {
        $connection =  DbConnection::get();
        $query="SELECT id,rus_name,geolocation FROM buildings"
                ." WHERE geolocation IS NOT NULL";

        $result = mysqli_query($connection, $query);
        if (!$result)
        {
            throw new Exception(mysqli_error($connection));
        }
        $buildings = [];
        $jsonBuildings=[];
        while ($row = mysqli_fetch_assoc($result))
        {
//            $building = new Building($row['id'], $row['rus_name'], null, null,
//                null, null,null, null, $row['geolocation'], null);
//            $buildings[] = $building;
            $jsonBuilding=[
                'id'=>$row['id'],
                'rus_name'=> $row['rus_name'],
                'geolocation'=>$row['geolocation']];
            $jsonBuildings[]=$jsonBuilding;
        }
//        var_dump($jsonBuildings);
        $jsonOut=json_encode($jsonBuildings, JSON_UNESCAPED_UNICODE);
//        var_dump($jsonOut);
        return $jsonOut;

    }
    public static function getBuildingsForAdmin():array
    {
        $connection =  DbConnection::get();
        $query="SELECT* FROM buildings";

        $result = mysqli_query($connection, $query);
        $buildings = [];
        while ($row = mysqli_fetch_assoc($result))
        {
            $building = new Building($row['id'], $row['rus_name'], $row['deu_name'], $row['build_date'],
                $row['doesExist'], $row['author_id'], $row['description'], $row['logoPath'], $row['geolocation'], $row['location']);
            $buildings[] = $building;
        }
        return $buildings;

    }
    public static function deleteBuilding($id):void
    {
        $connection =  DbConnection::get();
        $query="DELETE FROM buildings WHERE id={$id}";
        if(file_exists("./assets/objects/BuildingImages/{$id}/"))
        {
            array_map('unlink', glob("./assets/objects/BuildingImages/{$id}/*.*"));
            rmdir("./assets/objects/BuildingImages/{$id}");
        }
        $connection->query($query);
    }
}