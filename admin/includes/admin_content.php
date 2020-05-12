<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ADMIN DASHBOARD
                

            </h1>
            <?php



            // $result_user = User::find_all();
            // while($row = mysqli_fetch_array($result_user)){
            //     echo $row['username'];
            //     echo $row['first_name'];
            // };

            // $result_user_id = User::find_user_by_id(2);

            // $user = User::instatiation($result_user_id);

            // echo $user->user_id;


            // $users = User::find_all();
            // foreach ($users as $user) {
            //     echo $user->last_name . "<br>";
            // }


            // $result_user_id = User::find_by_id(2);
            // echo $result_user_id->username;

            // $photo = Photo::find_by_id(2);
            // echo $photo->filename;
            // $user = new User();
            // $user ->username    = "madddddddddddddddddddry";
            // $user ->password    = "mardddddddddddddy2";
            // $user ->first_name  = "marddddddddddddy";
            // $user ->last_name   = "gatdddddddddddddonye";

            // $user ->create();

            //  $user = User::find_by_id(28);
            //  $user->username = "Grace";
            //  $user->password = "muthoni123";
            //  $user->first_name = "Grace";
            //  $user->last_name = "Muthoni";
            //  $user->update();

            //  $user = User::find_by_id(28);
            //  $user->delete();

            // $user = User::find_user_by_id(15);
            // $user->password = "justanewpassword";
            // $user->save();

            // $user =  new User();
            // $user->username = "NEW USER";
            // $user->save();

            // $photos = Photo::find_all();
            // foreach ($photos as $photo) {

            // echo $photo->filename;

            // }
            // $photo= new Photo();
            // $photo->title = "mountains photo";
            // $photo->size = 20;
            // $photo->create();

            // echo SITE_ROOT;

            ?>


            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $session->count; ?></div>
                                    <div>New Views</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-photo fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo Photo::count_all(); ?></div>
                                    <div>Photos</div>
                                </div>
                            </div>
                        </div>
                        <a href="./photos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Total Photos in Gallery</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo User::count_all(); ?>

                                    </div>

                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="./users.php">
                            <div class="panel-footer">
                                <span class="pull-left">Total Users</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo Comment::count_all(); ?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="./comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">Total Comments</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
            <!--First Row-->

                    <div class="row">
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                    </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->