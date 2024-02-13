<?php

declare(strict_types=1);

namespace Up;

use Core\DB\Migrator;
use Core\Http\Request;
use Core\Routing\Router;
use Exception;

class Application
{
	/**
	 * @throws Exception
	 */
	public function run(): void
	{
		$route = Router::find(Request::method(), Request::uri());
		if ($route)
		{
			$action = $route->action;
			$variables = $route->getVariables();
			echo $action(...$variables);
		}
		else
		{
			http_response_code(404);
			echo "404";
			exit;
		}
	}
}