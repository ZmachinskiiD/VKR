<?php
namespace Up\Controllers;
use Core\Http\Request;
use Core\Web\Json;
use Exception;
use Up\Controllers\BaseController;
use Up\Services\BuildingService;
use Up\Services\ImageService;
use Up\Services\UserService;

class AdminController extends BaseController
{
    public function adminAction(): string
    {
        if(UserService::authentificateUser(true))
        {
            $buildings = BuildingService::getBuildingsForAdmin();
            $params = ['buildings' => $buildings];
            return $this->render('admin', $params, 'adminLayout');
        }
        else
        {
            header("Location: /login/");
            return("NO ACTION");
        }
    }
    public function createAction(): string
    {
        $params=[];
        if(UserService::authentificateUser(true))
        {
            if (Request::isPost())
			{
                $id = BuildingService::insertBuilding();
                $imageService = new ImageService($id);
				try
				{
					$imageService::checkIfImage();
				}
				catch (Exception $e)
				{
					return $this->render('404');
				}
                $newName = $imageService::renameImage("mainPhoto");
                $imageService::insertImageInFolder($newName, "./assets/objects/BuildingImages/{$id}", "mainPhoto");
				BuildingService::addLogo($newName,$id);
				$imageService::renameAndSendAddImages("fileToUpload","./assets/objects/BuildingImages/{$id}");
            }
            return $this->render('createForm', $params, 'adminLayout');
        }
        else
        {
            header("Location: /login/");
            return("HEH");
        }
    }
    public function deleteAction($id)
    {
        if(UserService::authentificateUser(true)&&is_numeric($id))
        {
                BuildingService::deleteBuilding($id);
                header("Location: /admin/main/");
        }
        else
        {
            header("Location: /login/");
            return("NO ACTION");
        }
    }
    public function photoAction()
    {
        if(UserService::authentificateUser(true))
        {
            if(Request::isPost())
            {
                $imageService = new ImageService(null);
                $newName = $imageService::renameImage("photo");
                $description=Request::getBody()['description'];
                $imageService::insertImageInFolder($newName, "./assets/objects/ArchiveImages", "photo");
                $imageService::insertImageInArchive("/assets/objects/ArchiveImages/".$newName,$description);
				header("Location: /admin/archive/");
            }
            else
            {
				$images=ImageService::getImagesFromArchive(0);
				$params=['images'=>$images];
                return $this->render('adminArchive', $params, 'adminLayout');
            }
        }
    }
	public function deletePhoto()
	{
		header('Content-Type: application/json');
		$photoId = file_get_contents('php://input');
		ImageService::deleteImageFromArchive($photoId);
		echo Json::encode([
			'result' => 'Y',
			'data'=>"{$photoId}"
		]);
	}
    public function updateAction($id)
    {
		if(UserService::authentificateUser(true))
		{
			if (Request::isGet())
			{
				$building = BuildingService::getBuildingInfo($id);
				$buildingPhotos=ImageService::getPhotosOfBuilding($id);
				$params=['building'=>$building,'buildingPhotos'=>$buildingPhotos];
				return $this->render('updateForm', $params, 'adminLayout');
			}
			else
			{
				BuildingService::updateBuilding();
				if(true)
				{
					$imageService = new ImageService($id);
					$imageService::renameAndSendAddImages("fileToUpload", "./assets/objects/BuildingImages/{$id}");
				}
				header("Location: /admin/main/");
			}
		}
		else
		{
			header("Location: /login/");
			return("HEH");
		}
    }
	public function changePhoto()
	{
		header('Content-Type: application/json');
		$data = (file_get_contents('php://input'));
		$newData=json_decode($data,true);
		$image=$newData['image'];
		$id=$newData['id'];
		echo Json::encode([
			'result' => 'Y',
			'data'=>"{$image}"
		]);
		BuildingService::addLogo($image,$id);
	}
	public function changePhotoAction()
	{
		if(UserService::authentificateUser(true))
		{
			$description = Request::getBody()['text'];
			$id = Request::getBody()['id'];
			if ((is_numeric($id)) && is_string($description))
			{
				$id = (int)$id;
				var_dump($id);
				var_dump($description);
				ImageService::changeArchiveImageDescription($id, $description);
			}
			header("Location: /admin/archive/");
		}
		else
		{
			header("Location: /login/");
		}
	}
	public function deletePhotoAction()
	{
		if(UserService::authentificateUser(true))
		{
			header('Content-Type: application/json');
			$data = (file_get_contents('php://input'));
			$newData=json_decode($data,true);
			$image=$newData['image'];
			$id=$newData['id'];
			echo Json::encode([
				'result' => 'Y',
				'data'=>"{$image}"
			]);
			ImageService::deleteImageFromFolder($image,$id);
		}
		else
		{
			header("Location: /login/");
		}
	}

}

