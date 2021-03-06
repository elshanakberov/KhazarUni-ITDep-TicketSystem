<?php require_once("include/header.php"); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->

  <?php require_once("include/nav.php"); ?>

  <?php

   ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">

                          Welcome <small><?php echo $_SESSION['user_name']; ?></small>

                        </h1>
                    </div>
                </div>
                <!-- /.row -->

           <!-- /.row -->

<div class="row">
<div class="col-lg-3 col-md-6">
   <div class="panel panel-primary">
       <div class="panel-heading">
           <div class="row">
               <div class="col-xs-3">
                   <i class="fa fa-fw fa-table fa-5x"></i>

               </div>
               <div class="col-xs-9 text-right">
             <div class='huge'><?php count_ticket(); ?></div>
                   <div>Tickets</div>
               </div>
           </div>
       </div>
       <a href="tickets.php">
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
                   <i class="fa fa-fw fa-edit fa-5x"></i>
               </div>
               <div class="col-xs-9 text-right">
                <div class='huge'><?php count_departments(); ?></div>
                 <div>Departments</div>
               </div>
           </div>
       </div>
       <a href="department.php">
           <div class="panel-footer">
               <span class="pull-left">View Details</span>
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
               <div class='huge'><?php count_users(); ?></div>
                   <div> Users</div>
               </div>
           </div>
       </div>
       <a href="users.php">
           <div class="panel-footer">
               <span class="pull-left">View Details</span>
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
                   <i class="fa fa-fw fa-wrench fa-5x"></i>
               </div>
               <div class="col-xs-9 text-right">
                   <div class='huge'><?php  count_categories(); ?></div>
                    <div>Categories</div>
               </div>
           </div>
       </div>
       <a href="category.php">
           <div class="panel-footer">
               <span class="pull-left">View Details</span>
               <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
               <div class="clearfix"></div>
           </div>
       </a>
   </div>
</div>
</div>
<div class="row">


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
    <script src="js/scripts.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
