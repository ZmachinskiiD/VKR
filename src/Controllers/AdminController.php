<?php
namespace Up\Controllers;
use Core\Http\Request;
use Up\Controllers\BaseController;
use Up\Services\BuildingService;
use Up\Services\ImageService;

class AdminController extends BaseController
{
    public function adminAction(): string
    {
        $buildings=BuildingService::getBuildingsForAdmin();
        $params=['buildings'=>$buildings];
        return $this->render('admin', $params,'adminLayout');
    }
    public function createAction(): string
    {
        $params=[];
        if(Request::isPost())
        {
            $id=BuildingService::insertBuilding();
            $imageService=new ImageService($id);
            $newName=$imageService::renameImage("mainPhoto");
            $imageService::insertImageInFolder($newName,"./assets/objects/BuildingImages/{$id}","mainPhoto");
        }
        return $this->render('createForm', $params,'adminLayout');
    }
    public function deleteAction($id)
    {
        if(Request::isPost())
        {
            BuildingService::deleteBuilding($id);
            $params = [];
            header("Location: /admin/main/");
            //return $this->render('deletePage', $params,'adminLayout');
        }
    }
}

