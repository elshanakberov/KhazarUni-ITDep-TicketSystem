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
                          Dashbord

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
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Year', 'Sales', 'Expenses', 'Profit'],
      ['2014', 1000, 400, 200],
      ['2015', 1170, 460, 250],
      ['2016', 660, 1120, 300],
      ['2017', 1030, 540, 350]
      ]);

      var options = {
      chart: {
      title: 'Company Performance',
      subtitle: 'Sales, Expenses, and Profit: 2014-2017',
      }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, options);
      }
      </script>
      <div id="columnchart_material" style="width: 1000px; height: 410px;"></div>
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
