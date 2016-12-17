<?php require_once("include/header.php"); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->

  <?php require_once("include/nav.php"); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          <i class="glyphicon glyphicon-user"></i>
                          Users
                          <small>Panel</small>
                        </h1>

                      <?php
                          if(isset($_GET['source'])){
                            $source = $_GET['source'];
                          }else{
                            $source = "";
                          }

                          switch ($source) {
                            case 'add_user':
                              include "include/add_user.php";
                              break;

                            default:
                              include "include/view_all_users.php";
                              break;
                          }
                       ?>

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
