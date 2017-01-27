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
                          <i class="fa fa-fw fa-table"></i>
                          Tickets
                          <small>Panel</small>
                        </h1>

                      <?php
                          if(isset($_GET['source'])){
                            $source = $_GET['source'];
                          }else{
                            $source = "";

                          }

                          switch ($source) {
                            case 'add_ticket':
                              include "include/add_ticket.php";
                              break;
                              case 'edit_ticket':
                                include "include/edit_ticket.php";
                                break;

                            default:
                              include "include/view_all_tickets.php";
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
