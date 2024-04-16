<?php
namespace Up\Services;
use Core\DB\DbConnection;
use Core\Http\Request;
use Up\Services\ConfigurationService;
class UserService
{
    public static function  insertUser()
    {
        $userName=Request::getBody()['username'];
        $password=Request::getBody()['password'];
        $password=password_hash($password, PASSWORD_DEFAULT);
        $email=Request::getBody()['email'];
        $connection =  DbConnection::get();
        $query=
            "INSERT INTO `Users`( `username`, `email`, `password`, `role`)".
            "VALUES ('{$userName}','{$email}','{$password}',1)";
        $connection->query($query);
    }
    public static function getUser():bool
    {
        $email=Request::getBody()['email'];
        $password=Request::getBody()['password'];
        $connection =  DbConnection::get();
        $query="SELECT * FROM Users ".
            " WHERE email='{$email}'";
        $result=mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        if(isset($row))
        {
            $hash = $row['password'];
            return password_verify($password, $hash);
        }
        return false;

    }
}