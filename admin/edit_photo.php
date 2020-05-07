<?php include("includes/header.php"); ?>

<?php 
// if (!$session->is_signed_in()) {
//     redirect("login.php");
// } 
?>
<?php


if(empty($_GET['id'])){

    header("Location: ./photos.php");

} else {

    $the_id = $_GET['id'];

    $photo = Photo::find_by_id($the_id);

    if(isset($_POST['update'])){

        if($photo) {

          $photo->title             =  $_POST['title'];
          $photo->caption           =  $_POST['caption'];
          $photo->alternate_text    =  $_POST['alternate_text'];
          $photo->description       =  $_POST['description'];

          $photo->save();
        }

    }
}

// $photos = Photo::find_all();



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
            <form action="" method="post">
                <div class="col-lg-8">
                    <h1 class="page-header">
                        EDIT PHOTO
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" value="<?php echo $photo->title; ?>">
                        </div>
                        <div class="form-group">
                           <a class="thumbnail" href="#"><img  src="<?php echo $photo->picture_path(); ?>" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input class="form-control" type="text" name="caption" value="<?php echo $photo->caption; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Alternate Text</label>
                            <input class="form-control" type="text" name="alternate_text" value="<?php echo $photo->alternate_text; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="editor" value ="" cols="30" rows="10" class="form-control"><?php echo $photo->description; ?></textarea>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="photo-info-box">
                        <div class="info-box-header">
                            <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                        </div>
                        <div class="inside">
                            <div class="box-inner">
                                <p class="text">
                                    <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                </p>
                                <p class="text ">
                                    Photo Id: <span class="data photo_id_box">34</span>
                                </p>
                                <p class="text">
                                    Filename: <span class="data">image.jpg</span>
                                </p>
                                <p class="text">
                                    File Type: <span class="data">JPG</span>
                                </p>
                                <p class="text">
                                    File Size: <span class="data">3245345</span>
                                </p>
                            </div>
                            <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>
                            </div>
                        </div>
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