<?php add_ticket(); ?>
<form action="" method="post" enctype="multipart/form-data">



                        <div class="form-group">
                          <label for="title">Select Category</label><br>
                               <select class="" name="ticket_category_id">
                                       <?php category(); ?>
                               </select>
                         </div>

                         <div class="form-group">
                           <label for="title">Select Department</label><br>
                                <select class="" name="ticket_department">
                                        <?php department(); ?>
                                </select>
                          </div>


                      <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="ticket_title">
                      </div>
                      <div class="form-group">
                          <label for="title">Priority</label><br>
                          <select class="" name="ticket_priority">
                            <option value="Draft">Select Priority</option>
                            <option value="Active">Major</option>
                            <option value="Draft">Minor</option>
                            <option value="Draft">Emergency</option>
                            <option value="Draft">Critical</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="title">Status</label><br>

                          <select class="" name="ticket_status">
                            <option value="Draft">Select Status</option>
                            <option value="Active">Active</option>
                            <option value="Draft">Draft</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="title">Description</label>
                            <textarea  class="form-control" id="" cols="30" rows="10"  name="ticket_content"></textarea>
                      </div>


                      <div class="form-group">
                            <input type="submit" class="btn-btn-primary" name="submit" value="Submit">
                      </div>

  </form>
