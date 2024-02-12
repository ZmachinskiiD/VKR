<?php
class ImageService
{
    public static function getPhotos(?string $isAfter1945 = null): array
    {
        $photos = [];
        $connection = getDbConnection();
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
        $connection = getDbConnection();
        //$clause=getToString($connection,$id,"is_after_1945");
        $clause = mysqli_real_escape_string($connection, $id);
        $result = mysqli_query($connection,
            "
    SELECT  path FROM photos
    WHERE building_id={$id};"
        );
        if (!$result) {
            throw new Exception(mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $photos[] = $row['path'];
        }
        return $photos;
    }

    public static function insertPhoto($Building_id, $path, $isAfter1945)
    {
        $connection = getDbConnection();
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