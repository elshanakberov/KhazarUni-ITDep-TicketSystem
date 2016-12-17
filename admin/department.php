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
                        <h1  class="" class="page-header ">
                          <i class="fa fa-fw fa-edit"></i>
                            Department
                            <small>Panel</small>
                        </h1><br>
                    </div>

                </div>
                <!-- /.row -->
                <div class="col-xs-9">
                 <?php insert_department(); ?>
                 <?php  delete_department(); ?>
                 <?php

                      if(isset($_GET['edit'])){
                                edit_department();
                      }else{
                      ?>
                      <div class="col-xs-6">
                        <form  action="" method="post">
                                <div class="input-group">

                                    <input name="department_name" type="text"  class="form-control" >
                                    <span class="input-group-btn">
                                            <button  name="submit" class="btn btn-primary  " type="submit">Add Department</button>
                                    </span>

                                </div>
                        </form><br>
                      </div>

                      <?php } ?>


             </div>
              <div class="col-xs-12 table-responsive">
                 <table class="table table-condensed table-hover table-striped">
                   <thead>
                     <tr>
                       <td>ID</td>
                       <td>Department</td>
                     </tr>
                   </thead>
                   <tbody>
                    <?php display_department(); ?>
                   </tbody>
                 </table>
               </div>
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
