<?php
namespace Up\Controllers;
use Core\Http\Request;
use Up\Services\BuildingService;
use Up\Services\CommentService;
use Up\Services\ImageService;
use Up\Services\UserService;

class DetailController extends BaseController
{
    public function detailAction(string $id): string
    {

		if(!(is_numeric($id)))
		{
			return $this->render('404');
		}
        $building=BuildingService::getBuildingInfo($id);
        $buildingPhotos=ImageService::getPhotosOfBuilding($id);
        $comments=CommentService::getComments($id);
        $params = ['id'=>$id,'building'=>$building,'buildingPhotos'=>$buildingPhotos,'comments'=>$comments];
        return $this->render('detail', $params);
    }
    public function  CommentAction(string $id)
    {
        if(UserService::authentificateUser())
        {
            $userId=UserService::getUserId();
            $comment = Request::getBody()['comment'];
            CommentService::generateComment($id,  $userId, $comment);
            header("Location: /detail/{$id}/");
        }
    }
}