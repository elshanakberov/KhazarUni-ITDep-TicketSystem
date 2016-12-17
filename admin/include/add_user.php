<?php add_user(); ?>
<form action="" method="post" enctype="multipart/form-data">



                        <div class="form-group">
                            <label for="title">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                        </div>

                         <div class="form-group">
                           <label for="title">User Role</label><br>
                                <select class="" name="user_role">
                                        <option value="User">Select Role</option>
                                        <option value="User">User</option>
                                        <option value="Admin">Admin</option>
                                </select>
                          </div>


                      <div class="form-group">
                          <label for="title">Firstname</label>
                          <input type="text" class="form-control" name="user_firstname" placeholder="Enter Firstname"  required>
                      </div>
                      <div class="form-group">
                          <label for="title">Lastname</label>
                          <input type="text" class="form-control" name="user_lastname" placeholder="Enter Lastname"  required>
                      </div>
                      <div class="form-group">
                          <label for="title">Email (Optional)</label>
                          <input type="email" class="form-control" name="user_email" placeholder="Enter Email" >
                      </div>
                      <div class="form-group">
                          <label for="title">Password</label>
                          <input type="password" class="form-control" name="user_password" placeholder="Enter Password"  required>
                      </div>




                      <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                      </div>

  </form>
