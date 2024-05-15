<?php
namespace Up\Services;
use Core\DB\DbConnection;
use Core\Http\Request;
use Up\Models\Comment;

class CommentService
{
    public static function generateComment($buildingId,$userId,$commentText)
    {
        $connection = DbConnection::get();
        $result="INSERT INTO Comments(`buildingId`,`userId`,`text`) ".
            " VALUES('{$buildingId}','{$userId}','{$commentText}')";
        $connection->query($result);
		return $connection->insert_id;
    }
    public static function getComments($buildingId):array
    {
        $connection = DbConnection::get();
        $query="SELECT Comments.id as CommentId,userId,username,text,buildingId FROM Comments inner join Users".
            " on Comments.userId=Users.id ".
        "WHERE `buildingId`='{$buildingId}'";
        $result = mysqli_query($connection, $query);
        $comments = [];
        while ($row = mysqli_fetch_assoc($result))
        {
            $comment=new Comment($row['CommentId'],$row['userId'],$row['buildingId'],htmlspecialchars($row['text']),htmlspecialchars($row['username']));
            $comments[]=$comment;
        }
        return $comments;
    }
    public static function deleteComment($id):void
    {
        $connection = DbConnection::get();
        $query="SELECT * FROM Comments ".
            "WHERE `id`='{$id}'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        if($row)
        {
            $query="DELETE FROM Comments ".
                "WHERE `id`='{$id}'";
            $connection->query($query);
        }
    }

    public static function getAuthor(bool|string $commentId)
    {
        $connection = DbConnection::get();
        $query="SELECT userId FROM Comments ".
            "WHERE `id`='{$commentId}'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['userId'];
    }
}