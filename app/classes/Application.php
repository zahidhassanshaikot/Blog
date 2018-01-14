<?php
namespace App\classes;

use App\classes\Database;

class Application
{
    public function getAllPublishedBlogInfo() {
        $sql = "SELECT * FROM blog WHERE status = 1 ";
        if(mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function getBlogInfoById($id){
        $sql = "SELECT * FROM blog WHERE id = $id ";
        if(mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }

    }
    public function addBlogCommentsById($CmdInfo){
        $sql="INSERT INTO `comments`(`blog_id`, `comment`) VALUES ('$CmdInfo[blog_id]','$CmdInfo[comment]')";
        if(mysqli_query(Database::dbConnection(), $sql)) {
//            $message="commend send Successfully";
//            return $message;
        } else {
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function getAllBlogCommentsById($id){
        $sql="SELECT * FROM comments WHERE blog_id=$id";
        if(mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        } else {
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }
}