<?php include("includes/init.php"); ?>

<?php //if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php

if(empty($_GET['id'])) {

   header("Location: ./comment_photo.php?id={$comment->photo_id}");


}


$comment = Comment::find_by_id($_GET['id']);



if($comment) {

    $comment->delete();

    header("Location: ./comment_photo.php?id={$comment->photo_id}");

} else {
    
    header("Location: ./comment_photo.php?id={$comment->photo_id}");
}

?>