<?php
namespace Up\Controllers;
use Up\Services\BuildingService;
use Up\Services\ImageService;

class DetailController extends BaseController
{
    public function detailAction(): string
    {
        $id=$_GET['id'];
		if(!(is_numeric($id)))
		{
			return $this->render('404');
		}
        $building=BuildingService::getBuildingInfo($id);
        $buildingPhotos=ImageService::getPhotosOfBuilding($id);
        $params = ['id'=>$id,'building'=>$building,'buildingPhotos'=>$buildingPhotos];
        return $this->render('detail', $params);
    }
}