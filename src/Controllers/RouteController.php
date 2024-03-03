<?php
namespace Up\Controllers;


class RouteController extends BaseController
{
	public function routeAction(): string
	{
		return $this->render('404');
	}
}