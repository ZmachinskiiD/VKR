<?php

namespace Up\Controllers;

class IndexController extends BaseController
{
	public function indexAction(): string
	{
		$doesExist=$_GET['doesExist']??null;
		$params = [
            'buildings'=> \Up\Services\BuildingService::getBuildings($doesExist),
			'buildingCards'=>\Up\Services\HttpService::getMyUrl() .'/assets/objects/BuildingImages/'

		];
		return $this->render('index', $params);
	}
}