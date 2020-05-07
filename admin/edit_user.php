<?php include("includes/header.php"); ?>

<?php

// if (!$session->is_signed_in()) {
//     redirect("login.php");
// } 


?>
<?php

$the_message = "";
if (empty($_GET['id'])) {

    header("Location: ./users.php");

}

    $the_id = $_GET['id'];

    $user = User::find_by_id($the_id);

    if (isset($_POST['update'])) {

        if ($user) {

            $user->username           =  $_POST['username'];
            $user->password           =  $_POST['password'];
            $user->first_name         =  $_POST['first_name'];
            $user->last_name          =  $_POST['last_name'];

            if(empty($_FILES['user_image'])){

                $user->save();
                
            }else {

                $user->set_file($_FILES['user_image']);

                $user->save_user_and_image();
                $user->save();
                redirect("edit_user.php?id={$user->id}");
            }
          
            
            $the_message = '<div class="alert alert-success" role="alert">User Updated successfully!!!!!</div>';
        }
    }


// $users = user::find_all();



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
            <div class="col-md-6">
            <div class="form-group">
                <img class="img-responsive img-rounded img-thumbnail" style="height: 700px; "  src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
            </div>
            </div>
            <form action="" method="post">
                <div class="col-md-6">
                <h1 class="page-header">EDIT USER</h1>
                        <?php echo $the_message; ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" value="<?php echo $user->username; ?>">
                        </div>
                        <div class="form-group">
                        <label for="profile">Profile Picture</label>
                            <input class="form-control" type="file" name="user_image">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password" value="<?php echo $user->last_name; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary btn-lg">Submit</button>
                            <a href="delete_user.php?id=<?php echo $user->id; ?>"><button type="button" name="delete" class="btn btn-danger btn-lg pull-right">Delete</button></a>
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