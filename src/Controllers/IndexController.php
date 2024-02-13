<?php

namespace Up\Controllers;

class IndexController extends BaseController
{
	public function indexAction(): string
	{
		$doesExist=$_GET['doesExist']??null;
		$params = [
            'buildings'=> \Up\Services\BuildingService::getBuildings($doesExist),
			'siteElements'=>\Up\Services\ConfigurationService::option('SITE_ELEMENTS'),
			'buildingCards'=>\Up\Services\HttpService::getMyUrl() .'/assets/objects/BuildingImages/'

		];
		return $this->render('index', $params);
	}
}