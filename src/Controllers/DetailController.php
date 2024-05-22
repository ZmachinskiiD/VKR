<?php
namespace Up\Controllers;
use Core\Http\Request;
use Core\Web\Json;
use Exception;
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
		try
		{
			$building=BuildingService::getBuildingInfo($id);
		}
       catch (Exception $e)
	   {
		   return $this->render('404');
	   }
        $buildingPhotos=ImageService::getPhotosOfBuilding($id);
        $comments=CommentService::getComments($id);
        $user=\Up\Services\UserService::getUserName();
        $userId=UserService::getUserId();
        $isAdmin=UserService::isAdmin($userId);
        $isFeatured=BuildingService::isFeaturedWithUser($id,$userId);
        $params = ['id'=>$id,'building'=>$building,'buildingPhotos'=>$buildingPhotos,
            'comments'=>$comments,'user'=>$user,'isFeatured'=>$isFeatured,
			'userId'=>$userId, 'isAdmin'=>$isAdmin];
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
	public function  addCommentAction(string $id)
	{
		if(UserService::authentificateUser())
		{
			$userId=UserService::getUserId();
			$comment = Request::getBody()['comment'];
			$commentId=CommentService::generateComment($id,  $userId, $comment);
			header("Location: /detail/{$id}/");
			echo Json::encode([
				'result' => 'Y',
				'data'=>"{$commentId}"
			]);
		}
	}
}