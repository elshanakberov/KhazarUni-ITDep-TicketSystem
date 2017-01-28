<?php require_once("include/header.php"); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php profile(); ?>
  <?php require_once("include/nav.php"); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          <i class="glyphicon glyphicon-user"></i>
                          Profile
                          <small>Panel</small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">



                                                <div class="form-group">
                                                    <label for="title">Username</label>
                                                    <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?php echo $username ?>" required>
                                                </div>

                                                 <div class="form-group">
                                                   <label for="title">User Role</label><br>
                                                        <select class="" name="user_role">
                                                                <option value="User">Select Role</option>
                                                                <option value="User">User</option>
                                                                <option value="Admin">Admin</option>
                                                        </select>
                                                  </div>


                                              <div class="form-group">
                                                  <label for="title">Firstname</label>
                                                  <input type="text" class="form-control" name="user_firstname" placeholder="Enter Firstname" value="<?php echo $user_firstname ?>" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="title">Lastname</label>
                                                  <input type="text" class="form-control" name="user_lastname" placeholder="Enter Lastname"  value="<?php echo $user_lastname ?>"required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="title">Email </label>
                                                  <input type="email" class="form-control" name="user_email" placeholder="Enter Email" value="<?php echo $user_email ?>" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="title">Password</label>
                                                  <input type="password" class="form-control" name="user_password" placeholder="Enter Password"   value="<?php echo $user_password ?>"  required>
                                              </div>




                                              <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
                                              </div>

                          </form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
