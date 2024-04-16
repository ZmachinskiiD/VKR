<?php
namespace Up\Controllers;
use Core\Http\Request;
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
            if(UserService::getUser());
            {
                session_start();
            }
            header("Location:/");
        }
        return $this->render('login', $params, 'emptyLayout');
    }
}
