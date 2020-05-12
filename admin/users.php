<?php include("includes/header.php"); ?>
<?php

// if (!$session->is_signed_in()) {
//     redirect("login.php");
// } 

?>
<?php

$users = User::find_all();

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
            <div class="col-lg-12">
                <p class="align-center"><?php echo $message; ?></p>
                <h1 class="page-header">
                    USERS
                    <a href="add_user.php" class="btn btn-primary">Add User</a>
                </h1>
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><img class="user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->last_name; ?></td>
                                    <td><a class="delete-link" href="edit_user.php?id=<?php echo $user->id; ?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                                    <td><a class="delete-link" href="delete_user.php?id=<?php echo $user->id; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>

<script>
    $('.delete-link').click(function(){
       return confirm("Are you sure you want to delete");
    });
</script>