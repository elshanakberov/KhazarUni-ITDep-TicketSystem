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
          $delete_category_id = $_GET['delete'];

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

          $edit_category_id = $_GET['edit'];

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

    $query = "SELECT * FROM request";
    $stmt = mysqli_prepare($con,$query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$ticket_id,$ticket_category_id,$ticket_department,$ticket_title,$ticket_priority,$date,$ticket_content,$ticket_status);

      while(mysqli_stmt_fetch($stmt)){
        echo "<tr>";
           echo "<td>{$ticket_id}</td>";
           echo "<td>{$ticket_category_id}</td>";
           echo "<td>{$ticket_department}</td>";
           echo "<td>{$ticket_title}</td>";


echo "<td>{$date}</td>";
           echo "<td>{$ticket_priority}</td>";

           echo "<td>{$ticket_status}</td>";
           echo  mb_substr("<td>{$ticket_content}</td>",0,30);
           echo "<td>{$date}</td>";
           echo "<td><a class='btn btn-warning' href='tickets.php?source=edit_ticket&edit={$ticket_id}'>Edit</a></td>";
           echo "<td><a class='btn btn-danger' href='tickets.php?delete={$ticket_id}'>Delete</a></td>";
         echo "</tr>";
      }
  }

  function delete_ticket(){
    global $con;
      if(isset($_GET['delete'])){

          $delete_ticket_id = $_GET['delete'];
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
        $ticket_category_id = $_POST['ticket_category_id'];
        $ticket_department = $_POST['ticket_department'];
        $ticket_title = $_POST['ticket_title'];
        $ticket_priority = $_POST['ticket_priority'];
        $ticket_date = date('y-m-d');
        $ticket_status = $_POST['ticket_status'];
        $ticket_content = $_POST['ticket_content'];

        $query = "INSERT INTO request(request_category_id,request_department,request_title,request_priority,request_date,request_content,request_status) ";
        $query .= "VALUES(?,?,?,?,?,?,?) ";

        $stmt = mysqli_prepare($con,$query);
        mysqli_stmt_bind_param($stmt,"issssss",$ticket_category_id,$ticket_department,$ticket_title,$ticket_priority,$ticket_date,$ticket_content,$ticket_status);
        mysqli_stmt_execute($stmt);

    }

  }

  function update_ticket(){
    global $con;

    if(isset($_GET['edit'])){
      $edit_ticket_id = $_GET['edit'];


      $query = "SELECT * FROM request WHERE request_id = ? ";
      $stmt = mysqli_prepare($con,$query);

      mysqli_stmt_bind_param($stmt,"i",$edit_ticket_id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt,$ticket_id,$ticket_category_id,$ticket_department,$ticket_title,$ticket_priority,$ticket_date,$ticket_content,$ticket_status);

          while(mysqli_stmt_fetch($stmt)):
              ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Category</label>
      <input type="text" class="form-control" name="ticket_category_id" value="<?php echo $ticket_category_id?>">
    </div>
    <div class="form-group">
      <label for="title">Department</label>
      <input type="text" class="form-control" name="ticket_department" value="<?php echo $ticket_department?>">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="ticket_title" value="<?php echo $ticket_title?>">
    </div>
    <div class="form-group">
        <label for="title">Priority</label>
        <input type="text" class="form-control" name="ticket_priority" value="<?php echo $ticket_priority?>">
    </div>
    <div class="form-group">
      <label for="title">Status</label>
      <input type="text" class="form-control" name="ticket_status" value="<?php echo $ticket_status?>">
    </div>
    <div class="form-group">
      <label for="title">Description</label>
      <textarea  class="form-control" id="" cols="30" rows="10"  name="ticket_content"><?php echo $ticket_content?>
      </textarea>
    </div>
    <div class="form-group">
      <input type="submit" class="btn-btn-primary" name="submit" value="Submit">
    </div>
</form>
              <?php
          endwhile;
    }

    if(isset($_POST['submit'])){

      $ticket_category_id = $_POST['ticket_category_id'];
      $ticket_department = $_POST['ticket_department'];
      $ticket_title = $_POST['ticket_title'];
      $ticket_priority = $_POST['ticket_priority'];
      $ticket_status = $_POST['ticket_status'];
      $ticket_content = $_POST['ticket_content'];

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
   ?>
