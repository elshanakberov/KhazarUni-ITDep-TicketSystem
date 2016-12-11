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
                echo "<td><a href='category.php?edit={$category_id}'>Edit</a></td>";
                echo "<td><a href='category.php?delete={$category_id}'>Delete</a></td>";
              echo "</tr>";
          }
    }

    function insert_category(){
      global $con;
      if(isset($_POST['submit'])){
        $category_title = $_POST['category_title'];
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
                <form  action="" method="post">

                        <div class="form-group">
                            <label for="category_title">Edit Category</label>
                            <input name="category_title" type="text"  class="form-control" value="<?php echo $category_title ?>">
                        </div>

                        <div class="form-group">
                            <input name="edit_category" class="btn btn-primary" type="submit"  value="Submit">
                        </div>

                </form>

                <?php
            endwhile;
      }

        if(isset($_POST['edit_category'])){

            $category_title = $_POST['category_title'];

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

   ?>
