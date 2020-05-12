<?php include("includes/header.php"); ?>

<!-- use this oooooooooooooooooooooorrrr -->
<?php //if(!$session->is_signed_in()) {redirect("login.php");} ?>
<!-- ============= -->
<?php
// check whether the user is login at all if not redirect

// if(isset($_SESSION['user_id']) == 0){

//     redirect("./login.php");
// }

$message = "";

if(isset($_FILES['file'])){

    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file']);


    if($photo->save()) {

        $message = "<div class= 'alert-success'>Photo uploaded sucessfully</div>"; 
        
        
        } else {
        
        $message = join("<br>", $photo->errors);
        
        
        }
        
}



?>


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Visit Home Site</a>
            </div>

            <?php include "includes/top_nav.php" ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "includes/side_nav.php" ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8 col-lg-offset-3">
                <h1 class="page-header">
                    UPLOAD AN IMAGE
                </h1>
                <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <?php echo $message; ?>
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                <input type="file" class="form-control" name="file" id=""> <br>
                </div>
                <input type="submit" class="btn btn-success btn-lg" name="submit">
            </form>
            </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <form action="uploads.php" class="dropzone" method="post">

                </form>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>