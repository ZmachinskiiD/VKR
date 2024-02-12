<?php

namespace Up\Controllers;

class IndexController extends BaseController
{
	public function indexAction(): string
	{
		$params = [
            'Buildings'=>\BuildingService::getBuildings(null),

		];
		return $this->render('index', $params);
	}
}