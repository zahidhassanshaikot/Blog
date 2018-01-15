<?php
/**
 * Created by PhpStorm.
 * User: DIU
 * Date: 1/15/2018
 * Time: 7:55 PM
 */

namespace App\classes;
use App\classes\Database;

class BlogComments
{
    public function viewBlogComments() {
        $sql="SELECT * FROM comments";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $queryResult=mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        } else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function deleteBlogComment($id){
        $sql="DELETE FROM comments WHERE id=$id";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message="Delete Successfully";
            return $message;
        }else{
            die("Query problem".mysqli_error(Database::dbConnection()));
        }
    }

}