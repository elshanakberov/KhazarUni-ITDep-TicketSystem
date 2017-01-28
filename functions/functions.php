<!-- HELPER FUNCTIONS -->
<?php
  ob_start();

  function clean($string){

    return htmlentities($string);
  }

  function redirect($location){

    return header("location:{$location}");
  }

  function set_message($message){
    if(!empty($message)){
      $_SESSION['message'] = $message;
    }else{
      echo " ";
    }
  }

  function validation_error($error_message){
    $error_message = <<<DELIMITER
    <div class="alert alert-danger alert-dismissible" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <strong>Diqqet!</strong> $error_message
     </div>
DELIMITER;
return $error_message;

  }

  function display_message(){
    if(isset($_SESSION['message'])){

      echo   $_SESSION['message'];
      unset($_SESSION['message']);
    }
  }

  function token(){

    $_SESSION['token'] = strtoupper(md5(uniqid (mt_rand(), 1)));
    return $_SESSION['token'];

  }

  function username_exists($user_name){
    global $con;

    $query = "SELECT user_id FROM users WHERE user_name = ? ";
    $stmt = mysqli_prepare($con,$query);

    mysqli_stmt_bind_param($stmt,'s',$user_name);
    mysqli_stmt_execute($stmt);
      if(mysqli_stmt_num_rows($stmt) == 1){
          return true;
      }else{
        return false;
      }

  }

  function email_exists($email) {
    global $con;

    $query = "SELECT user_id FROM users WHERE user_email = '{$email}' ";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 1){
      return true;
    }else{
      return false;
    }
  }

  function validate_user(){

    $max = 15;
    $min = 3;
    $errors = [];


        if(isset($_POST['register-submit'])){

          $first_name = clean($_POST['first_name']);
          $last_name = clean($_POST['last_name']);
          $user_name = clean($_POST['user_name']);
          $email = clean($_POST['email']);
          $password = clean($_POST['password']);
          $confirm_password = clean($_POST['confirm_password']);

            if(strlen($first_name) < $min){
              $errors[] = "Adiniz {$min} simvoldan kichik olmamalidir!";
            }
            if(strlen($first_name) > $max ){
              $errors[] = "Adiniz {$max} simvoldan artiq olmamalidir! ";
            }
            if(strlen($last_name) < $min){
              $errors[] = "Soy Adiniz {$min} simvoldan kichik olmamalidir!";
            }
            if(strlen($last_name) > $max){
              $errors[] = "Soy Adiniz {$max} simvoldan artiq olmamalidir! ";
            }
            if(strlen($user_name) < $min){
              $errors[] = "Istifadechi Adiniz {$min} simvoldan kichik olmamalidir!";
            }
            if(strlen($user_name) > $max){
              $errors[] = "Istifadechi Adiniz {$max} simvoldan artiq olmamalidir! ";
            }

            if(username_exists($user_name)){
              $errors[] = "Bu istifadechi adi artiq goturulub ";
            }

            if(email_exists($email)){
              $errors[] = "Bu email artiq goturulub ";
            }

            if($password != $confirm_password){
              $errors[] = "Shifrelerin eyni olduguna emin olun!";
            }

            if(!empty($errors)){
              foreach($errors as $error){
                echo validation_error($error);
              }
            }
            else{
              if(register_user($user_name,$first_name,$last_name,$email,$password)){

                set_message('<div align = "center" class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>  Tebrikler! </strong>Siz Qeydiyatdan kechdiniz</div>' );
                redirect("index.php");

              }
          }
      }
  }

    function register_user($user_name,$first_name,$last_name,$email,$password){
      global $con;

      $user_name       = escape($user_name);
      $first_name      = escape($first_name);
      $last_name       = escape($last_name);
      $email           = escape($email);
      $password        = escape(md5($password));
      $user_role = "User";

      $query = "INSERT INTO users(user_name,user_firstname,user_lastname,user_email,user_role,user_password) ";
      $query .= "VALUES(?,?,?,?,?,?) ";
      $stmt = mysqli_prepare($con,$query);

      mysqli_stmt_bind_param($stmt,"ssssss",$user_name,$first_name,$last_name,$email,$user_role,$password );
      mysqli_stmt_execute($stmt);

      return true;

    }


    function validate_user_login(){
      global $con,$db_email,$db_password;
      $errors = [];
            if(isset($_POST['login-submit'])){

              $email = clean($_POST['email']);
              $password = clean($_POST['password']);

              if(empty($email)){
                $errors[] = "Email adresinizi daxil etmelisiniz!";
              }
              if(empty($password)){
                $errors[] = "Shifrenizi daxil etmelisiniz!";
              }

              if(!empty($errors)){

                foreach($errors as $error){

                  echo  validation_error($error);

                }

              }else{
                $query = "SELECT * FROM users WHERE user_email = '".escape($email)."' ";
                $stmt = mysqli_query($con,$query);

                  while($row = mysqli_fetch_array($stmt)){
                        $db_password = $row['user_password'];
                        $db_email = $row['user_email'];
                        $db_username = $row['user_name'];
                        $db_user_role = $row['user_role'];


                  }
                  if($email === $db_email  && md5($password) === $db_password){

                    $_SESSION['user_name'] = $db_username;
                    $_SESSION['user_role'] = $db_user_role;

                    redirect("admin");
                  }else{
                    echo validation_error("Melumatlarinizin deqiq oldugundan emin olun");
                  }
              }
         }
    }

    function logged_in(){
      if(isset($_SESSION['user_role'])){
        return true;
      }else{
        return false;
      }
    }
  ?>
