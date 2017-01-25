<!-- HELPER FUNCTIONS -->
<?php session_start(); ?>

<?php

  function escape($string){
      global $con;
      return mysqli_real_escape_string($con,$string);
  }

  function confirm($result){
    global $con;
    if(!$result){
      die("FAiLED" . mysqli_error($con));
    }
    return $result;
  }

  function clean($string){
    return htmlentities($string);
  }

  function redirect($location){
    return header("Location:{$location}");
  }

 ?>


  <?php

/********************** ADMIN CATEGORIES ********************/

  function display_category(){
    global $con;

      $query = "SELECT category_id,category_title FROM category";
      $select_query = mysqli_prepare($con,$query);

      mysqli_stmt_execute($select_query);
      mysqli_stmt_bind_result($select_query,$category_id,$category_title);

        while(mysqli_stmt_fetch($select_query)){

             echo "<tr>";
                echo "<td>{$category_id}</td>";
                echo "<td>{$category_title}</td>";
                echo "<td><a class='btn btn-warning' href='category.php?edit={$category_id}'>Edit</a></td>";
                echo "<td><a class='btn btn-danger' href='category.php?delete={$category_id}'>Delete</a></td>";
              echo "</tr>";
          }
    }

    function insert_category(){
      global $con;
      if(isset($_POST['submit'])){
        $category_title = clean($_POST['category_title']);
          if(empty($category_title) || $category_title === " "){
            echo "<h1>cdcdc</h1>";
          }else{

            $stmt = "INSERT INTO category(category_title) VALUES (?) ";
            $insert_query = mysqli_prepare($con,$stmt);

            mysqli_stmt_bind_param($insert_query, 's' , $category_title);
            mysqli_stmt_execute($insert_query);

        }
      }
    }

    function delete_category(){
      global $con;
        if(isset($_GET['delete'])){
          $delete_category_id = clean($_GET['delete']);

          $stmt = "DELETE FROM category WHERE category_id = ? ";
          $delete_query = mysqli_prepare($con,$stmt);

          mysqli_stmt_bind_param($delete_query, 'i' , $delete_category_id);
          mysqli_stmt_execute($delete_query);

          redirect("category.php");
      }
    }

    function edit_category(){
      global $con;

      if(isset($_GET['edit'])){

          $edit_category_id = clean($_GET['edit']);

          $stmt = "SELECT * FROM category WHERE category_id = ? ";
          $query = mysqli_prepare($con,$stmt);

          mysqli_stmt_bind_param($query, 'i' ,$edit_category_id);
          mysqli_stmt_execute($query);
          mysqli_stmt_bind_result($query,$category_id,$category_title);

            while(mysqli_stmt_fetch($query)):
                ?>
                <div class="col-xs-6">
                  <form  action="" method="post">

                          <div class="input-group">

                              <input name="category_title" type="text"  class="form-control" value="<?php echo $category_title ?>">
                              <span class="input-group-btn">
                                      <button  name="edit_category" class="btn btn-primary  " type="submit">Edit Category</button>
                              </span>
                          </div>



                  </form><br>
                </div>


                <?php
            endwhile;
      }

        if(isset($_POST['edit_category'])){

            $category_title = clean($_POST['category_title']);

            if (empty($category_title) || $category_title === " ") {
              echo "<p class='alert alert-danger text-center'>Xeta! Kateqoriyani Yenilemek Uchun Input girin</p>";
            }else{
            $query = "UPDATE category SET category_title = ? WHERE category_id = ?";
            $stmt = mysqli_prepare($con,$query);

            mysqli_stmt_bind_param($stmt, 'si' , $category_title,$edit_category_id);
            mysqli_stmt_execute($stmt);

            redirect("category.php");

            }
        }
    }



/********************** ADMIN Tickets ********************/


  function display_ticket(){
    global $con;
    $query = "SELECT * FROM request ";
    $stmt = mysqli_query($con,$query);

      while($row = mysqli_fetch_assoc($stmt)):
            $ticket_id = $row['request_id'];
            $ticket_category_id = $row['request_category_id'];
            $ticket_department = $row['request_department'];
            $ticket_title = $row['request_title'];
            $ticket_date = $row['request_date'];
            $ticket_priority = $row['request_priority'];
            $ticket_content = $row['request_content'];
            $ticket_status = $row['request_status'];

             echo "<tr>";
              echo "<td><input type='checkbox' class='checkBox' name='checkBoxArray[]' value='$ticket_id'></td>";
              echo "<td>{$ticket_id}</td>";
                 $query2 = "SELECT * FROM category WHERE category_id = {$ticket_category_id }";
                 $stmt2 = mysqli_query($con,$query2);
                   while($row=mysqli_fetch_array($stmt2)):
                         $category_id = $row['category_id'];
                         $category_title = $row['category_title'];
                         echo "<td>{$category_title}</td>";
                   endwhile;
                   $query3 = "SELECT * FROM department WHERE department_id = {$ticket_department} ";
                   $stmt3 = mysqli_query($con,$query3);

                   while($row = mysqli_fetch_array($stmt3)):
                     $department_id = $row['department_id'];
                     $department_title = $row['department_name'];
                     echo "<td>{$department_title}</td>";
                   endwhile;

               echo "<td>{$ticket_title}</td>";
               echo "<td>{$ticket_date}</td>";
               echo "<td>{$ticket_priority}</td>";
               echo "<td>{$ticket_status}</td>";
              //  echo  mb_substr("<td>{$ticket_content}</td>",0,30);
              echo "<td><a class='btn btn-default' href='../requests.php?r_id={$ticket_id}'>Extend</a></td>";
               echo "<td>{$ticket_date}</td>";
               echo "<td><a class='btn btn-warning' href='tickets.php?source=edit_ticket&edit={$ticket_id}'>Edit</a></td>";
               echo "<td><a class='btn btn-danger' href='tickets.php?delete={$ticket_id}'>Delete</a></td>";
             echo "</tr>";
      endwhile;
  }


  function delete_ticket(){
    global $con;
      if(isset($_GET['delete'])){

          $delete_ticket_id = clean($_GET['delete']);
          $query = "DELETE FROM request WHERE request_id = ? ";
          $stmt  = mysqli_prepare($con,$query);

          mysqli_stmt_bind_param($stmt,"i",$delete_ticket_id);
          mysqli_stmt_execute($stmt);

          redirect("tickets.php");
    }
  }

  function add_ticket(){
      global $con;

    if(isset($_POST['submit'])){
        $ticket_category_id = clean($_POST['ticket_category_id']);
        $ticket_department = clean($_POST['ticket_department']);
        $ticket_title = clean($_POST['ticket_title']);
        $ticket_priority = clean($_POST['ticket_priority']);
        $ticket_date = date('y-m-d');
        $ticket_status = clean($_POST['ticket_status']);
        $ticket_content = clean($_POST['ticket_content']);

        $query = "INSERT INTO request(request_category_id,request_department,request_title,request_priority,request_date,request_content,request_status) ";
        $query .= "VALUES(?,?,?,?,?,?,?) ";

        $stmt = mysqli_prepare($con,$query);
        mysqli_stmt_bind_param($stmt,"issssss",$ticket_category_id,$ticket_department,$ticket_title,$ticket_priority,$ticket_date,$ticket_content,$ticket_status);
        mysqli_stmt_execute($stmt);

        redirect("tickets.php");

        mysqli_stmt_close($stmt);

    }

  }

  function update_ticket(){
    global $con,$ticket_id,$ticket_category_id,$ticket_department,$ticket_title,$ticket_priority,$ticket_date,$ticket_content,$ticket_status;

    if(isset($_GET['edit'])){
      $edit_ticket_id = clean($_GET['edit']);


      $query = "SELECT * FROM request WHERE request_id = ? ";
      $stmt = mysqli_prepare($con,$query);

      mysqli_stmt_bind_param($stmt,"i",$edit_ticket_id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt,$ticket_id,$ticket_category_id,$ticket_department,$ticket_title,$ticket_priority,$ticket_date,$ticket_content,$ticket_status);

          while(mysqli_stmt_fetch($stmt)):

          endwhile;
    }

    if(isset($_POST['submit'])){

      $ticket_category_id = clean($_POST['ticket_category_id']);
      $ticket_department = clean($_POST['ticket_department']);
      $ticket_title = clean( $_POST['ticket_title']);
      $ticket_priority = clean($_POST['ticket_priority']);
      $ticket_status = clean($_POST['ticket_status']);
      $ticket_content = clean($_POST['ticket_content']);

      $query = "UPDATE request SET ";
      $query .= "request_category_id = ?, ";
      $query .= "request_department = ?,  ";
      $query .= "request_title = ?,  ";
      $query .= "request_priority = ?,  ";
      $query .= "request_status = ?,  ";
      $query .= "request_content = ?  ";
      $query .= " WHERE request_id = ? ";

      $stmt1 = mysqli_prepare($con,$query);
      mysqli_stmt_bind_param($stmt1,'isssssi',$ticket_category_id ,$ticket_department,$ticket_title,$ticket_priority,$ticket_status,$ticket_content,$edit_ticket_id);
      mysqli_stmt_execute($stmt1);

      redirect("tickets.php");


    }

  }

  function category(){
    global $con,$category_id,$category_title;

    $query = "SELECT * FROM category";
    $stmt  = mysqli_prepare($con,$query);

    mysqli_stmt_bind_result($stmt,$category_id,$category_title);
    mysqli_stmt_execute($stmt);

      while(mysqli_stmt_fetch($stmt)){
        echo "
                              <option value='$category_id'>$category_title</option>
                    ";
      }
  }

/********************** ADMIN Department ********************/


function department(){
  global $con;

  $query = "SELECT * FROM department";
  $stmt  = mysqli_prepare($con,$query);

  mysqli_stmt_bind_result($stmt,$department_id,$department_name);
  mysqli_stmt_execute($stmt);

    while(mysqli_stmt_fetch($stmt)){
      echo "
                            <option value='$department_id'>$department_name</option>
                  ";
    }
}

  function display_department(){
    global $con;

      $query = "SELECT department_id,department_name FROM department";
      $select_query = mysqli_prepare($con,$query);

      mysqli_stmt_execute($select_query);
      mysqli_stmt_bind_result($select_query,$department_id,$department_name);

        while(mysqli_stmt_fetch($select_query)){

             echo "<tr>";
                echo "<td>{$department_id}</td>";
                echo "<td>{$department_name}</td>";
                echo "<td><a class='btn btn-warning' href='department.php?edit={$department_id}'>Edit</a></td>";
                echo "<td><a class='btn btn-danger' href='department.php?delete={$department_id}'>Delete</a></td>";
              echo "</tr>";
          }
    }

    function insert_department(){
      global $con;
      if(isset($_POST['submit'])){
        $department_name = clean($_POST['department_name']);
          if(empty($department_name) || $department_name === " "){
            echo "<h1></h1>";
          }else{

            $stmt = "INSERT INTO department(department_name) VALUES (?) ";
            $insert_query = mysqli_prepare($con,$stmt);

            mysqli_stmt_bind_param($insert_query, 's' , $department_name);
            mysqli_stmt_execute($insert_query);

        }
      }
    }

    function delete_department(){
      global $con;
        if(isset($_GET['delete'])){
          $delete_department_id = clean($_GET['delete']);

          $stmt = "DELETE FROM department WHERE department_id = ? ";
          $delete_query = mysqli_prepare($con,$stmt);

          mysqli_stmt_bind_param($delete_query, 'i' , $delete_department_id);
          mysqli_stmt_execute($delete_query);

          redirect("department.php");
      }
    }

    function edit_department(){
      global $con;

      if(isset($_GET['edit'])){

          $edit_department_id = clean($_GET['edit']);

          $stmt = "SELECT * FROM department WHERE department_id = ? ";
          $query = mysqli_prepare($con,$stmt);

          mysqli_stmt_bind_param($query, 'i' ,$edit_department_id);
          mysqli_stmt_execute($query);
          mysqli_stmt_bind_result($query,$department_id,$department_name);

            while(mysqli_stmt_fetch($query)):
                ?>
                <div class="col-xs-6">
                  <form  action="" method="post">

                          <div class="input-group">

                              <input name="department_name" type="text"  class="form-control" value="<?php echo $department_name ?>">
                              <span class="input-group-btn">
                                      <button  name="edit_department" class="btn btn-primary  " type="submit">Edit Department</button>
                              </span>
                          </div>
                  </form><br>
                </div>
                <?php
            endwhile;
      }

        if(isset($_POST['edit_department'])){

            $department_name = clean($_POST['department_name']);

            if (empty($department_name ) || $department_name  === " ") {
              echo "<p class='alert alert-danger text-center'>Xeta! Departamenti Yenilemek Uchun Input girin</p>";
            }else{
            $query = "UPDATE department SET department_name = ? WHERE department_id = ?";
            $stmt = mysqli_prepare($con,$query);

            mysqli_stmt_bind_param($stmt, 'si' , $department_name,$edit_department_id);
            mysqli_stmt_execute($stmt);

            redirect("department.php");

            }
        }
    }

/********************** ADMIN Users ********************/

  function display_user(){
    global $con;

    $query = "SELECT user_id,user_name,user_lastname,user_firstname,user_email,user_role FROM users ";
    $stmt = mysqli_prepare($con,$query);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$user_id,$username,$user_lastname,$user_firstname,$user_email,$user_role);

      while(mysqli_stmt_fetch($stmt)):
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";
        echo "<td><a class='btn btn-info' href='users.php?user={$user_id}'>User</a></td>";
        echo "<td><a class='btn btn-success' href='users.php?admin={$user_id}'>Admin</a></td>";
        echo "<td><a class='btn btn-danger' href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";
      endwhile;
  }

  function add_user(){
    global $con;

    if(isset($_POST['submit'])){
      $username       = clean($_POST['username']);
      $user_role      = clean($_POST['user_role']);
      $user_firstname = clean($_POST['user_firstname']);
      $user_lastname  = clean($_POST['user_lastname']);
      $user_email     = clean($_POST['user_email']);
      $user_password  = clean($_POST['user_password']);

      $query  = "INSERT INTO users(user_name,user_role,user_lastname,user_firstname,user_email,user_password) ";
      $query .= "VALUES(?,?,?,?,?,?) ";
      $stmt = mysqli_prepare($con,$query);

      mysqli_stmt_bind_param($stmt,"ssssss",$username,$user_role,$user_firstname,$user_lastname,$user_email,$user_password);
      mysqli_stmt_execute($stmt);

      redirect("users.php");
      mysqli_stmt_close($stmt);
    }
  }

  function user_user(){
    global $con;
    if(isset($_GET['user'])){
      $user_user = $_GET['user'];

      $query = "UPDATE users SET user_role = 'User' WHERE user_id = ?";
      $stmt = mysqli_prepare($con,$query);
      mysqli_stmt_bind_param($stmt,"i",$user_user);
      mysqli_stmt_execute($stmt);

      redirect("users.php");
      mysqli_stmt_close($stmt);
    }
  }

  function user_admin(){
    global $con;

    if(isset($_GET['admin'])){
      $user_admin = $_GET['admin'];

      $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = ? ";
      $stmt = mysqli_prepare($con,$query);

      mysqli_stmt_bind_param($stmt,"i",$user_admin);
      mysqli_stmt_execute($stmt);
      redirect("users.php");
      mysqli_stmt_close($stmt);
    }
  }

  function delete_user(){
    global $con;

    if(isset($_GET['delete'])){
      $delete_user_id = $_GET['delete'];

      $query = "DELETE FROM users WHERE user_id = ?";
      $stmt = mysqli_prepare($con,$query);

          mysqli_stmt_bind_param($stmt,"i",$delete_user_id);
          mysqli_stmt_execute($stmt);
          redirect("users.php");
          mysqli_stmt_close($stmt);
    }
  }

  function count_ticket(){
    global $con;

    $query = "SELECT * FROM request ";
    $stmt = mysqli_query($con,$query);

  $count_ticket =  mysqli_num_rows($stmt);

      echo $count_ticket;
  }
  function count_departments(){
    global $con;

    $query = "SELECT * FROM department ";
    $stmt = mysqli_query($con,$query);

  $count_departments =  mysqli_num_rows($stmt);

      echo $count_departments;
  }
  function count_users(){
    global $con;

    $query = "SELECT * FROM users ";
    $stmt = mysqli_query($con,$query);

  $count_users =  mysqli_num_rows($stmt);

      echo $count_users;
  }
  function count_categories(){
    global $con;

    $query = "SELECT * FROM category ";
    $stmt = mysqli_query($con,$query);

  $count_category =  mysqli_num_rows($stmt);

      echo $count_category;
  }

  function bulk_option(){
    global $con;
        if(isset($_POST['checkBoxArray'])){

          $checkBoxArray = $_POST['checkBoxArray'];

          foreach($checkBoxArray as $checkBoxId){

                  $bulk_option = $_POST['bulkOptions'];

                  switch($bulk_option) {
                    case 'Delete':
                      $query = "DELETE FROM request WHERE request_id = ? ";
                      $stmt = mysqli_prepare($con,$query);

                      mysqli_stmt_bind_param($stmt,"i",$checkBoxId);
                      mysqli_stmt_execute($stmt);
                        redirect("tickets.php");
                      mysqli_stmt_close($stmt);
                      break;

                      case 'Active':
                        $query = "UPDATE request SET request_status = 'Active' WHERE request_id = ? ";
                        $stmt = mysqli_prepare($con,$query);

                        mysqli_stmt_bind_param($stmt,"i",$checkBoxId);
                        mysqli_stmt_execute($stmt);
                          redirect("tickets.php");

                          mysqli_stmt_close($stmt);
                      break;

                      case 'Draft':
                      $query = "UPDATE request SET request_status = 'Draft' WHERE request_id = ? ";
                      $stmt = mysqli_prepare($con,$query);

                      mysqli_stmt_bind_param($stmt,"i",$checkBoxId);
                      mysqli_stmt_execute($stmt);
                        redirect("tickets.php");

                        mysqli_stmt_close($stmt);


                    default:
                      # code...
                      break;
                  }
          }

        }
  }
   ?>
