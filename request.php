<?php include "includes/header.php" ?>
<body>

    <!-- Navigation -->
    <?php include "includes/nav.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

              <?php


                  $query = "SELECT * FROM request";
                  $select_query  = mysqli_query($con,$query);

                  while($row = mysqli_fetch_assoc($select_query)):
                        $request_title = $row['request_title'];
                        $request_content = $row['request_content'];
                        $request_date = $row['request_date'];

          ?>
                  <!-- Blog Post -->

                  <!-- Title -->
                  <h1><?php echo $request_title; ?></h1>

                  <!-- Author -->
                  <p class="lead">
                      by <a href="#">Admin</a>
                  </p>

                  <hr>

                  <!-- Date/Time -->
                  <p><span class="glyphicon glyphicon-time"></span> <?php echo $request_date; ?></p>



                  <!-- Preview Image -->
                  <p>
                      <?php echo $request_content; ?>
                  </p>
                    <hr>
               <?php
                  endwhile;
               ?>


                <!-- Post Content -->



                <!-- Blog Comments -->

                <!-- Comments Form -->



                <!-- Posted Comments -->

                <!-- Comment -->

                <!-- Comment -->


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Ticket Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">

                            <?php

                                $query = "SELECT * FROM category ";
                                $stmt = mysqli_prepare($con,$query);

                                mysqli_stmt_bind_result($stmt,$category_id,$category_title);
                                mysqli_stmt_execute($stmt);

                                  while(mysqli_stmt_fetch($stmt)):

                                    ?>
                                    <ul class="list-unstyled">
                                        <li><a href="category.php?category_id=<?php echo $category_id ?>"><?php echo $category_title ?></a></li>
                                    </ul>
                                    <?php
                                  endwhile;

                             ?>

                        </div>

                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->


            </div>

        </div>
        <!-- /.row -->



        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Khazar University 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
