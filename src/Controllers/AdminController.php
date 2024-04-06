<?php
namespace Up\Controllers;
use Up\Controllers\BaseController;
use Up\Services\BuildingService;

class AdminController extends BaseController
{
    public function adminAction(): string
    {
        $buildings=BuildingService::getBuildingsForAdmin();
        $params=['buildings'=>$buildings];
        return $this->render('admin', $params,'adminLayout');
    }
}
