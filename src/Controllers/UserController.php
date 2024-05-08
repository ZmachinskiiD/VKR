<?php
namespace Up\Controllers;
use Core\Http\Request;
use Core\Web\Json;
use Up\Controllers\BaseController;
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

}
