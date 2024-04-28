<?php
namespace Up\Controllers;
use Core\Http\Request;
use Up\Controllers\BaseController;
use Up\Services\BuildingService;
use Up\Services\ImageService;
use Up\Services\UserService;

class AdminController extends BaseController
{
    public function adminAction(): string
    {
        if(UserService::authentificateUser())
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
        if(UserService::authentificateUser())
        {
            if (Request::isPost()) {
                $id = BuildingService::insertBuilding();
                $imageService = new ImageService($id);
                $newName = $imageService::renameImage("mainPhoto");
                $imageService::insertImageInFolder($newName, "./assets/objects/BuildingImages/{$id}", "mainPhoto");
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
        if(UserService::authentificateUser())
        {
            if (Request::isPost()) {
                BuildingService::deleteBuilding($id);
                $params = [];
                header("Location: /admin/main/");
                //return $this->render('deletePage', $params,'adminLayout');
            }
        }
        else
        {
            header("Location: /login/");
            return("HEH");
        }
    }
    public function photoAction()
    {
        if(UserService::authentificateUser())
        {
            if(Request::isPost())
            {
                $imageService = new ImageService(null);
                $newName = $imageService::renameImage("photo");
                $description=Request::getBody()['description'];
                $imageService::insertImageInFolder($newName, "./assets/objects/ArchiveImages", "photo");
                $imageService::insertImageInArchive("./assets/objects/ArchiveImages/".$newName,$description);
            }
            else
            {
                $params = [];
                return $this->render('adminArchive', $params, 'adminLayout');
            }
        }
    }
    public function updateAction($id)
    {
        
    }
}

