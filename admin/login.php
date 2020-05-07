<?php require_once "includes/init.php" ?>

<?php

if ($session->is_signed_in()) {

    header("Location: index.php");
}


if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // method to check existance of the user in the database

    $user_found = User::verify_user($username, $password);

    if ($user_found) {

        $session->login($user_found);

        header("Location: ./index.php");
    } else {
        $the_message = "<div class='alert alert-danger' role='alert'>Your username or password is incorrect</div>";
    }
} else {
    $the_message = "";
    $username = "";
    $password = "";
}

?>
<!-- 
<div class="col-md-4 col-md-offset-3">

    <h4 class="bg-danger"><?php //echo $the_message; ?></h4>

    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php //echo htmlentities($username); ?>">

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php //echo htmlentities($password); ?>">

        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>


</div> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css'>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="mainCoantiner">
        <div class="main-header">
            <div class="header-social">
                <ul>
                    <li><a id="nmberone">1</a></li>
                    <li><a id="nmbertwo">2</a></li>
                    <li><a id="numberthree">3</a></li>

                </ul>
            </div>

        </div>

        <!--dust particel-->
        <div>
            <div class="starsec"></div>
            <div class="starthird"></div>
            <div class="starfourth"></div>
            <div class="starfifth"></div>
        </div>
        <!--Dust particle end--->

        <div class="container text-center text-dark mt-5">
            <div class="row">
                <div class="col-lg-4 d-block mx-auto mt-5">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <div class="card">
                                <div class="card-body wow-bg" id="formBg">
                                    <h3 class="colorboard">Login</h3>

                                    <p class="text-muted">Sign In to your account</p>
                                    <p class="text-muted"><?php echo $the_message; ?></p>
                                    <form id="login-id" action="" method="post">
                                        <div class="input-group mb-3"> <input type="text" name="username" class="form-control textbox-dg" placeholder="Username" value="<?php echo htmlentities($username); ?>"> </div>
                                        <div class="input-group mb-4"> <input type="password" name="password" class="form-control textbox-dg" placeholder="Password" value="<?php echo htmlentities($password); ?>"> </div>

                                        <div class="row">
                                            <div class="col-12"> <button type="submit" name="submit" class="btn btn-primary btn-block logn-btn">Login</button> </div>
                                            <div class="col-12"> <a href="forgot-password.php" class="btn btn-link box-shadow-0 px-0">Forgot password?</a> </div>
                                        </div>
                                    </form>

                                    <div class="mt-6 btn-list">
                                        <button type="button" class="socila-btn btn btn-icon btn-facebook fb-color"><i class="fab fa-facebook-f faa-ring animated"></i></button>
                                        <button type="button" class="socila-btn btn btn-icon btn-google incolor"><i class="fab fa-linkedin-in faa-flash animated"></i></button>
                                        <button type="button" class="socila-btn btn btn-icon btn-twitter tweetcolor"><i class="fab fa-twitter faa-shake animated"></i></button>
                                        <button type="button" class="socila-btn btn btn-icon btn-dribbble driblecolor"><i class="fab fa-instagram faa-pulse animated"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
    </script>
    <script src="js/script.js"></script>

</body>

</html>