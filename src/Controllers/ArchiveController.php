<?php
namespace Up\Controllers;


class ArchiveController extends BaseController
{
	public function archiveAction(): string
	{
		return $this->render('archive');
	}
}