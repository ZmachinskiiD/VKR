<?php
namespace Up\Controllers;
use Up\Services\BuildingService;

class DetailController extends BaseController
{
    public function detailAction(): string
    {
        $id=$_GET['id'];
        $building=BuildingService::getBuildingInfo($id);
        $params = ['id'=>$id,'building'=>$building];
        return $this->render('detail', $params);
    }
}