<?php
$message='';
session_start();
if($_SESSION['id'] == null) {
    header('Location: index.php');
}

require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$comments=new App\classes\BlogComments();


if(isset($_GET['logout'])) {
    $login->adminLogout();
}

if (isset($_GET['delete'])){
    $id=$_GET['id'];
    $message=$comments->deleteBlogComment($id);
}

$queryResult=$comments->viewBlogComments();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Manage Comments</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<?php include 'includes/menu.php'; ?>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-title m-auto">
                    <h5 style="margin-top: 25px;"> <b><i>Manage Comments</i></b></h5>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Comment id</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; while ($data=mysqli_fetch_assoc($queryResult)) {?>
                            <tr>
                                <th scope="row"><?php echo $i; $i++; ?></th>
                                <th scope="row"><?php echo $data['id']?></th>
                                <td><?php echo $data['comment']?></td>
                                <td>
<!--                                    <a href="BlogCommentEdit.php?id=--><?php //echo $data['id']?><!--">Edit</a>-->
                                    <a class="btn btn-danger" href="?delete=true&id=<?php echo $data['id']?>" onclick="return confirm('Are you sure delete this !!');">Delete</a>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="../assets/js/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>