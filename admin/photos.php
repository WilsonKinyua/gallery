<?php include("includes/header.php"); ?>
<?php // if(!$session->is_signed_in()) {redirect("login.php");} 
?>
<?php

// $photos = Photo::find_all();


?>

<?php

$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

$items_per_page = 7;

$items_total_count = Photo::count_all();

$paginate    = new Peginate($page, $items_per_page, $items_total_count);
$sql         = "SELECT * FROM photos ";
$sql        .= "LIMIT {$items_per_page} ";
$sql        .= "OFFSET {$paginate->offset()} ";
$photos      = Photo::find_by_query($sql);



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
                <h1 class="page-header">
                    ALL PHOTOS
                </h1>
                <div class="row text-center">
                    <ul class="pagination">
                        <?php
                        if ($paginate->page_total() > 1) {
                            if ($paginate->has_previous()) {
                                echo "<li class='previous'><a href='photos.php?page={$paginate->previous()}'>Previous</a></li>";
                            }

                            for ($i = 1; $i <= $paginate->page_total(); $i++) {

                                if ($i == $paginate->current_page) {

                                    echo "<li class='active'><a href='photos.php?page={$i}'>{$i}</a></li>";
                                } else {
                                    echo "<li><a href='photos.php?page={$i}'>{$i}</a></li>";
                                }
                            }

                            if ($paginate->has_next()) {
                                echo "<li class='next'><a href='photos.php?page={$paginate->next()}'>Next</a></li>";
                            }
                        }
                        ?>

                    </ul>

                </div>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>File Name</th>
                                <th>Title</th>
                                <th>Size</th>
                                <th>Comments</th>
                                <th>View Comments</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($photos as $photo) : ?>
                                <tr>
                                    <td><img style="height: 100px; width: 150px;" class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>" alt=""> </td>
                                    <td><?php echo $photo->id; ?></td>
                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td><?php $comment = Comment::find_comment($photo->id);
                                        echo count($comment); ?></td>

                                    <td><a class="delete-link" href="comment_photo.php?id=<?php echo $photo->id; ?>"><button type="button" class="btn btn-primary">View Comments</button></a></td>
                                    <td><a class="delete-link" href="../photo_comment.php?id=<?php echo $photo->id; ?>"><button type="button" class="btn btn-primary">View</button></a></td>
                                    <td><a class="delete-link" href="edit_photo.php?id=<?php echo $photo->id; ?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                                    <td><a class="delete-link" href="delete_photo.php?id=<?php echo $photo->id; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
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