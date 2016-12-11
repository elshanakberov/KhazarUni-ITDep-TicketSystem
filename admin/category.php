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
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                    </div>

                </div>
                <!-- /.row -->
                <div class="col-xs-6">
                 <?php insert_category(); ?>
                 <?php delete_category(); ?>
                 <?php

                      if(isset($_GET['edit'])){
                          edit_category();
                      }else{
                      ?>
                      <form  action="" method="post">

                              <div class="form-group">
                                  <label for="category_title">Add Category</label>
                                  <input name="category_title" type="text"  class="form-control" >
                              </div>

                              <div class="form-group">
                                  <input name="submit" class="btn btn-primary" type="submit"  value="Submit">
                              </div>

                      </form>
                      <?php } ?>


             </div>
              <div class="col-xs-6">
                 <table class="table table-bordered table-hover">
                   <thead>
                     <tr>
                       <td>İd</td>
                       <td>Category title</td>
                     </tr>
                   </thead>
                   <tbody>
                    <?php  display_category(); ?>
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
