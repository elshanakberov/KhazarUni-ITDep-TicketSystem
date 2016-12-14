<?php add_ticket(); ?>
<form action="" method="post" enctype="multipart/form-data">


                      <div class="form-group">
                          <label for="title"> Category</label>
                          <input type="text" class="form-control" name="ticket_category_id">
                      </div>

                      <div class="form-group">
                          <label for="title">Department</label>
                          <input type="text" class="form-control" name="ticket_department">
                      </div>


                      <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="ticket_title">
                      </div>
                      <div class="form-group">
                          <label for="title">Priority</label>
                          <input type="text" class="form-control" name="ticket_priority">
                      </div>
                      <div class="form-group">
                          <label for="title">Status</label>
                          <input type="text" class="form-control" name="ticket_status">
                      </div>

                      <div class="form-group">
                          <label for="title">Description</label>
                            <textarea  class="form-control" id="" cols="30" rows="10"  name="ticket_content"></textarea>
                      </div>


                      <div class="form-group">
                            <input type="submit" class="btn-btn-primary" name="submit" value="Submit">
                      </div>

  </form>
