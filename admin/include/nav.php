


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php"> Home</a>
    </div>
    <!-- Top Menu Items -->

    <ul class="nav navbar-right top-nav">

      <li>
      <a href="#">Users Online:  <?php echo user_online();  ?></a>
      </li>

        <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user_name']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>


                <li class="divider"></li>
                <li>
                    <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                  </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-table"></i>   Tickets</a>
                <ul id="demo1" class="collapse">

                    <li>
                        <a href="tickets.php?source=view_all_tickets">View All Tickets</a>
                    </li>
                    <li>
                        <a href="tickets.php?source=add_ticket">Add Ticket</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="department.php"><i class="fa fa-fw fa-edit"></i>Department</a>
            </li>

            <li>
                <a href="category.php"><i class="fa fa-fw fa-wrench"></i> Category</a>
            </li>


            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="glyphicon glyphicon-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo3" class="collapse">
                    <li>
                        <a href="users.php?source=view_all_users">View All Users</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_user">Add User</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="profile.php"><i class="fa fa-fw fa-file"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
