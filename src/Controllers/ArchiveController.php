<?php
namespace Up\Controllers;
use Up\Services\ImageService;

class ArchiveController extends BaseController
{
    public function archiveAction(): string
    {
        $images=ImageService::getImagesFromArchive(0);
        $params=['images'=>$images];
        return $this->render('archive', $params,'archiveLayout');
    }
}