<?php include("includes/header.php"); ?>

<?php

// if (!$session->is_signed_in()) {
//     redirect("login.php");
// } 


?>
<?php

    $the_message = "";
    $user = new User();
    
    if(isset($_POST['create'])){
       
        if($user) {

          $user->username           =  $_POST['username'];
          $user->first_name         =  $_POST['first_name'];
          $user->last_name          =  $_POST['last_name'];
          $user->password           =  $_POST['password'];

          $user->set_file($_FILES['user_image']);
          $user->save_user_and_image();
          $user->save();

         

        }
        $the_message = '<div class="alert alert-success" role="alert">User Added successfully!!!!!</div>';
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
            <form action="" method="post" enctype="multipart/form-data">
                
                
                    <div class="col-md-6 col-md-offset-3">
                    <h1 class="page-header">ADD USER</h1>
                        <?php echo $the_message; ?>
                        <div class="form-group">
                        <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" value="">
                        </div>
                        <div class="form-group">
                        <label for="profile">Profile Picture</label>
                            <input class="form-control" type="file" name="user_image">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" type="text" name="first_name" value="">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input class="form-control" type="text" name="last_name" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="create" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                
            </form>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper --> 

<?php include("includes/footer.php"); ?>