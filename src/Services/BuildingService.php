<?php

namespace Up\Services;
use Core\DB\DbConnection;
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
		if (!$result) {
			throw new Exception(mysqli_error($connection));
		}

		$buildings = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$building = new Building($row['id'], $row['rus_name'], $row['deu_name'], null,
				null, null, $row['description'], $row['logoPath'], null, null);
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

	public static function insertBuilding(Building $building)
	{
		//todo Сделать вставку геолокации
		$connection = getDbConnection();
		$buildDate = (int)$building->getYearOfBuild();
		$rusName = $building->getRusTitle();
		$deuName = $building->getDeuTitle();
		$description = $building->getDescription();
		$doesExist = (int)$building->isDoesExist();
		var_dump($doesExist);
		$geolocation = $building->getGeolocation();
		$location = $building->getAdress();
		$logo = $building->getLogopath();
		$sql = "
INSERT INTO buildings(build_date,description,deu_name,doesExist,geolocation,location,logoPath,rus_name)
VALUES('{$buildDate}','{$description}','{$deuName}','{$doesExist}',NULL,'{$location}','{$logo}','{$rusName}')
";
		$result = mysqli_query($connection, $sql);
		if (!$result) {
			throw new Exception(mysqli_error($connection));
		}
		return true;
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
}