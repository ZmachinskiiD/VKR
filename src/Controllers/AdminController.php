<?php
namespace Up\Controllers;
use Core\Http\Request;
use Core\Web\Json;
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
            return("HEH");
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
        if(UserService::authentificateUser(true))
        {
                BuildingService::deleteBuilding($id);
                header("Location: /admin/main/");
        }
        else
        {
            header("Location: /login/");
            return("HEH");
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
				$params=['building'=>$building];
				return $this->render('updateForm', $params, 'adminLayout');
			}
			else
			{
				BuildingService::updateBuilding();
				header("Location: /admin/main/");
			}
		}
		else
		{
			header("Location: /login/");
			return("HEH");
		}
    }
}

