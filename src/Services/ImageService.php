<?php

namespace Up\Services;

use Core\DB\DbConnection;
use Exception;
use RuntimeException;
use Up\Models\Image;
use Core\Http\Request;

use Up\Models\Photo;
use Up\Services\ConfigurationService;

class ImageService
{
    private string $dir;

    private static string $uploadDir = __DIR__ . "/../../../public/assets/images/productImages/";


    /**
     * @throws Exception
     */
    public function __construct($path)
    {
        $this->dir=$path."/";
    }
    private static function getImageArray($arrayName): array
    {
        return Request::getFiles()[$arrayName];
    }


    public static function insertImageInFolder(string $filename,string $path,string $form): void
    {
        $target_file =$path."/" . $filename;
        if (!move_uploaded_file(self::getImageArray($form)['tmp_name'], $target_file))
        {
            throw new RuntimeException('Error adding an image: ' . "Файл не найден");
        }
    }
    public static function checkIfImage(): bool
    {
        $maxFileSize = 40 * 1024 * 1024;
        $types = ConfigurationService::option('ALLOWED_FILES');
        if (Request::server('CONTENT_LENGTH') > $maxFileSize)
        {
            throw new RuntimeException('File too big');
        }
        $image = self::getImageArray('mainPhoto');
        $images = self::getImageArray('fileToUpload');
        $size = count($images['name']);
        if (!in_array(mime_content_type($image['tmp_name']), $types, true))
        {
            throw new RuntimeException('Invalid main image');
        }
        if ($images["name"][0] !== "")
        {
            for ($i = 0; $i < $size; $i++)
            {
                if (!in_array(mime_content_type($images['tmp_name'][$i]), $types, true))
                {
                    throw new RuntimeException('Invalid additional images');
                }
            }
        }

        return true;
    }

    public static function renameImage($form): string
    {
        $image = self::getImageArray($form);

        $originalFilename = $image["name"];

        $ext = pathinfo($originalFilename, PATHINFO_EXTENSION);

        return md5(time() . $originalFilename) . "." . $ext;
    }

    public static function renameAndSendAddImages(string $form,$path): array
    {
        $images = self::getImageArray($form,$path);
        $size = count($images['name']);
        $imageArray = [];
        if ($images["name"][0] !== "")
        {
            for ($i = 0; $i < $size; $i++)
            {
                $originalFilename = $images["name"][$i];
                $ext = pathinfo($originalFilename, PATHINFO_EXTENSION);
                $newName = md5(time() . $originalFilename) . "." . $ext;
                $imageArray[] = $newName;
                $target_file = $path ."/". $newName;

                if (!move_uploaded_file($images['tmp_name'][$i], $target_file))
                {
                    throw new RuntimeException('Error adding an additional image: ' . "Файл не найден");
                }
            }
        }

        return $imageArray;
    }


    public static function insertImageInArchive(string $path, string $description)
    {
        $connection = DbConnection::get();
        $query=
            "INSERT INTO photos(`path`,`description`)".
        " VALUES ('{$path}','{$description}')";
        $connection->query($query);
        $id=$connection->insert_id;
    }
    public static function getPhotosOfBuilding(?int $id = null): array
    {
        $photos = scandir(__DIR__."/../../public/assets/objects/BuildingImages/".$id."/");
        $photos=array_slice($photos,2);

        return $photos;
    }

    public static function getImagesFromArchive(int $page)
    {
        $images=[];
        $connection = DbConnection::get();
        $query="SELECT * FROM photos";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $image=new Photo($row['id'],$row['building_id'],$row['path'],$row['description']);
            $images[]=$image;

        }
        return $images;
    }
   	public static function deleteImageFromArchive($id):void
	{
		$connection = DbConnection::get();
		$query=" DELETE FROM photos where id={$id}";
		$connection->query($query);
	}

	public static function changeArchiveImageDescription(int $id, string $description)
	{
		$connection = DbConnection::get();
		$description=mysqli_real_escape_string($connection,$description);
		$query=" UPDATE `photos` SET `description`='{$description}' ".
		"where id={$id}";
		$connection->query($query);
	}

}
