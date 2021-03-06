<?php
$message='';
session_start();
if($_SESSION['id'] == null) {
    header('Location: index.php');
}

require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$blog=new App\classes\Blog();


if(isset($_GET['logout'])) {
    $login->adminLogout();
}

if (isset($_GET['delete'])){
    $id=$_GET['id'];
    $message=$blog->deleteBlogInfo($id);
}


$queryResult=$blog->viewBlogInfo();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Manage Blog</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<?php include 'includes/menu.php'; ?>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-11 mx-auto">
            <div class="card">
                <div class="card-title m-auto">
                    <h5 style="margin-top: 25px;"> <b><i>Manage blog</i></b></h5>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark ">
                        <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            while ($data=mysqli_fetch_assoc($queryResult)) {?>
                            <tr>
                                <th scope="row"><?php echo  $i++; ?></th>
                                <td><?php echo $data['category_name'] ?></td>
                                <td><?php echo $data['blog_title'] ?></td>
                                <td><?php echo $data['status'] == 1 ? 'Published' : 'Unpublished' ?></td>
                                <td>
                                    <a class="btn btn-primary" href="blogView.php?id=<?php echo $data['id']; ?>">View</a>
                                    <a class="btn btn-success" href="blogEdit.php?id=<?php echo $data['id']; ?>">Edit</a>
                                    <a class="btn btn-danger" href="?delete=true&id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure delete this !!');">Delete</a>
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