<?php

declare(strict_types=1);

namespace Up\Controllers;

use http\Exception;

class BaseController
{
	protected function renderView($view, $params):string|\Exception
	{
		$absolutePath = $this->getViewPath($view);
		if (!file_exists($absolutePath))
		{
			throw new \RuntimeException("Layout content '$view' not found.");
		}

		extract($params);
		ob_start();
		include_once $absolutePath;
		return ob_get_clean();
	}

	protected function getViewPath($view):string|\Exception
	{
		$viewPath = ROOT . "/src/Views/pages/$view.php";
		if (!preg_match('/^[0-9A-Za-z\/_-]+$/', $view))
		{
			throw new \RuntimeException('Invalid template path');
		}

		return $viewPath;
	}

	public function render($view, $params = [],?string $layout="layout"):string
	{
		$layoutContent = $this->setLayout($layout);
		$viewContent = $this->renderView($view, $params);
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}

	protected function setLayout($layout)
	{
		ob_start();
		include_once ROOT . "/src/Views/$layout.php";
		return ob_get_clean();
	}


	protected function getComponentPath($component):string|\Exception
	{
		$componentPath = ROOT . "/src/Views/components/$component.php";
		if (!preg_match('/^[0-9A-Za-z\/_-]+$/', $component))
		{
			throw new \RuntimeException('Invalid template path');
		}

		return $componentPath;
	}
	protected function renderComponent($component, $params = []):string|\Exception
	{
		$componentPath = $this->getComponentPath($component);
		if (!file_exists($componentPath))
		{
			throw new \RuntimeException("Component '$component' not found.");
		}

		extract($params);
		ob_start();
		include_once $componentPath;
		return ob_get_clean();
	}
}