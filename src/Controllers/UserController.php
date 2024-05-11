<?php
namespace Up\Controllers;
use Core\Http\Request;
use Core\Web\Json;
use Up\Controllers\BaseController;
use Up\Services\BuildingService;
use Up\Services\CommentService;
use Up\Services\UserService;

class UserController extends BaseController
{
    public function registrationAction()
    {
        $params=[];
        if(Request::isPost())
        {
            UserService::insertUser();
            header("Location:/");
        }
        else
        {
            return $this->render('registration', $params, 'emptyLayout');
        }

    }
    public function loginAction()
    {
        $params=[];
        if(Request::isPost())
        {
            if(UserService::getUser())
            {
                session_start();
                $_SESSION['email']=Request::getBody()['email'];
                $_SESSION['password']=Request::getBody()['password'];

            }
            header("Location:/");
        }
        return $this->render('login', $params, 'emptyLayout');
    }
    public function logoutAction()
    {
        header('Content-Type: application/json');
        UserService::Logout();
        $input = file_get_contents('php://input');
        if (isset($input))
        {
            echo Json::encode([
                'result' => 'Y',
                'data'=>$input
            ]);
        }

    }
    public function featuredAction()
    {
        header('Content-Type: application/json');
        $buildingId = file_get_contents('php://input');
        $userId=UserService::getUserId();
        BuildingService::addToFeatured($buildingId,$userId);
        echo Json::encode([
            'result' => 'Y',
            'data'=>"Добавлено"
        ]);

    }
    public function deleteFeaturedAction()
    {
        header('Content-Type: application/json');
        $buildingId = file_get_contents('php://input');
        $userId=UserService::getUserId();
        BuildingService::deleteFeaturedBuilding($buildingId,$userId);
        echo Json::encode([
            'result' => 'Y',
            'data'=>"Удалено"
        ]);
    }
    public function deleteCommentAction()
    {
        header('Content-Type: application/json');
        $commentId = file_get_contents('php://input');
        $commentUserId=CommentService::getAuthor($commentId);
        $userId=UserService::getUserId();
        $isAdmin=UserService::isAdmin($userId);
        if($isAdmin===true||($userId===$commentUserId))
            {
                CommentService::deleteComment($commentId);
            }
        echo Json::encode([
            'result' => 'Y',
            'data'=>"Удалено"
        ]);

    }

}
