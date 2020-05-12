<?php require_once "./admin/includes/init.php" ?>



<?php

if(empty($_GET['id'])) {
    
    redirect("index.php");
}

$photo = Photo::find_by_id($_GET['id']);


if(isset($_POST['submit'])) {

  $author   =  trim($_POST['author']);
  $body     =  trim($_POST['body']);

   $new_comment =  Comment::create_comment($photo->id, $author, $body);

   if($new_comment && $new_comment->save()) {

       redirect("photo_comment.php?id={$photo->id}");

   } else {
       $message = "There was a problem saving your message";
   }
} else {
    $author = "";
    $body = "";
}

$the_comment = Comment::find_comment($photo->id);
foreach ($the_comment as $comments) {


    $comments->author;
    $comments->body;
    
}





?>


    <?php include("includes/header.php"); ?>

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1> <?php echo $photo->title; ?></h1>
                <p class="lead">
                    by <a href="#">WILSON KINYUA</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive img-photo"  src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
                <p><?php echo $photo->description; ?></p>
              

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                    <div class="form-group">
                        <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php foreach ($the_comment as $comments) : ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comments->author; ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                       <p> <?php echo $comments->body; ?> </p>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4">

            <?php //include("includes/sidebar.php"); ?>

            </div> -->
        </div>

            <?php include("includes/footer.php"); ?>