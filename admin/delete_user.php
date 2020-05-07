<?php include("includes/init.php"); ?>

<?php //if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php

if(empty($_GET['id'])) {

   header("Location: ./users.php");


}


$user = User::find_by_id($_GET['id']);



if($user) {

    $user->delete_photo();

    header("Location: ./users.php");

} else {
    
    header("Location: ./users.php");
}

?>