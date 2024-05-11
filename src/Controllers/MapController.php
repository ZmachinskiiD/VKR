<?php
namespace Up\Controllers;
use Up\Services\BuildingService;
use Up\Services\ImageService;

class MapController extends BaseController
{
    public function mapAction(): string
    {

        $params = ['buildings'=>BuildingService::getBuildingsForMap()];
        return $this->render('map', $params,'mapLayout');
    }
}