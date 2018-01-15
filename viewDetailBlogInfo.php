<?php
require_once 'vendor/autoload.php';
$application = new App\classes\Application();
$id=$_GET['id'];
$queryResult = $application->getBlogInfoById($id);
$blogInfo = mysqli_fetch_assoc($queryResult);

if(isset($_POST['btn'])){
    $application->addBlogCommentsById($_POST);
}

$queryResultForCmds=$application->getAllBlogCommentsById($id);


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $blogInfo['blog_title']; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/heroic-features.css" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
<?php include 'MenuForUser.php'; ?>

<!-- Page Content -->
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <div class="card-title">
                    <h2 class="text-dark font-weight-bold" align="center"><?php echo $blogInfo['blog_title']; ?></h2>
                </div>
                <div class="card-body">
                    <img class="card-img-top" src="app/<?php echo $blogInfo['blog_image']; ?>"  alt="Image" height="500" width="850"/>
                    <p class="card-text"><?php echo $blogInfo['short_description']; ?></p><br/>
                    <p class="card-text"><?php echo $blogInfo['long_description']; ?></p>


                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <div class="card-title">
                    <h5 class="text-dark font-weight-bold" align="center">Write Your Comments</h5>
                </div>
                <div class="card-body">
                <form action="" method="post">
                    <div class="col-md-10" style="float: left">
                        <input type="text" class="form-control" style="border-radius:1rem" name="comment">
                        <input type="hidden" class="form-control" name="blog_id" value="<?php echo $blogInfo['id']?>"">
                    </div>
                    <div class="col-md-2" style="float: right">
                        <input type="submit" class="form-control btn-primary" name="btn" value="Send">
                    </div>
                </form>
                    <br/>
                    <br/>
                    <br/>
                    <?php $i=1; while ($cmdResult=mysqli_fetch_assoc($queryResultForCmds)) {?>

                        <table class="table ">
                            <tr>
                                <th width="5%"align="right""><?php echo $i; $i++;?></th>
                                <td width="95%"><?php echo $cmdResult['comment'];?></td>
                            </tr>
                        </table>

<!--                        <div class="col-md-2" style="float: left">-->
<!--                            <h6>--><?php //echo $i; $i++;?><!--</h6>-->
<!--                        </div>-->
<!--                        <div class="col-md-10" style="float: right">-->
<!--                            <p>--><?php //echo $cmdResult['comment'];?><!--</p>-->
<!--                        </div>-->
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
