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
            "VALUES ('{$userName}','{$email}','{$password}',0)";
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
    public static function authentificateUser()
    {
        session_start();
        $email=$_SESSION['email']??null;
        $password=$_SESSION['password']??null;
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
    public static function getUserId()
    {
        session_start();
        $email=$_SESSION['email']??null;
        $password=$_SESSION['password']??null;
        $connection =  DbConnection::get();
        $query="SELECT * FROM Users ".
            " WHERE email='{$email}'";
        $result=mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        if(isset($row))
        {
            return $row['id'];
        }
        return null;

    }
    public static function getUserName()
    {
        session_start();
        $email=$_SESSION['email']??null;
        $password=$_SESSION['password']??null;
        $connection =  DbConnection::get();
        $query="SELECT * FROM Users ".
            " WHERE email='{$email}'";
        $result=mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        if(isset($row))
        {
            return $row['username'];
        }
        else
        {
            return null;
        }
    }
    public static function Logout()
    {
        session_start();
        session_destroy();
    }
    public static function isAdmin( mixed $userId):bool
    {
        if($userId===null)
        {
            return false;
        }

        $connection =  DbConnection::get();
        $query="SELECT * FROM Users ".
            " WHERE id='{$userId}' and role=1";
        $result=mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        if(isset($row))
        {
            return true;
        }

        return false;
    }
}