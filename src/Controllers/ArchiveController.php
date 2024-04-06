<?php
namespace Up\Controllers;
class ArchiveController extends BaseController
{
    public function archiveAction(): string
    {
        $params=[];
        return $this->render('archive', $params);
    }
}