<?php

namespace Up\Services;
use Core\DB\DbConnection;

class ImageService
{
	public static function getPhotos(?string $isAfter1945 = null): array
	{
		$photos = [];
        $connection = DbConnection::get();
		$clause = getToString($connection, $isAfter1945, "is_after_1945");
		$clause = mysqli_real_escape_string($connection, $clause);
		$result = mysqli_query($connection,
			"
    SELECT  path FROM photos
    WHERE {$clause};"
		);
		if (!$result) {
			throw new Exception(mysqli_error($connection));
		}
		while ($row = mysqli_fetch_assoc($result)) {
			$photos[] = $row['path'];
		}
		return $photos;
	}

	public static function getPhotosOfBuilding(?int $id = null): array
	{
		$photos = [];

		return $photos;
	}

	public static function insertPhoto($Building_id, $path, $isAfter1945)
	{
        $connection = DbConnection::get();
		$sql = "
    INSERT INTO photos(building_id,path,is_after_1945)
    VALUES(
          '{$Building_id}',
           '{$path}',
           '{$isAfter1945}'
    )
    ";
		$result = mysqli_query($connection, $sql);
		if (!$result) {
			throw new Exception(mysqli_error($connection));
		}
		return true;
	}
}