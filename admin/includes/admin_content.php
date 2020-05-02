<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ADMIN
            <small>Subheading</small>
           
        </h1>
        <?php


                // $result_user = User::find_all_users();
                // while($row = mysqli_fetch_array($result_user)){
                //     echo $row['username'];
                //     echo $row['first_name'];
                // };

                // $result_user_id = User::find_user_by_id(2);

                // $user = User::instatiation($result_user_id);

                // echo $user->user_id;


                // $users = User::find_all_users();
                // foreach ($users as $user) {
                //     echo $user->user_id . "<br>";
                // }

                $result_user_id = User::find_user_by_id(2);
               echo  $result_user_id->username;

                ?>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->