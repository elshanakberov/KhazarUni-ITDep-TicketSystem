<?php
bulk_option();

?>

<form class="" action="" method="post">

  <div id="bulkOptionContainer" class="col-xs-2">
      <select class="" name="bulkOptions">
        <option value="">Select Options</option>
        <option value="Active">Active</option>
        <option value="Draft">Draft</option>
        <option value="Delete">Delete</option>
      </select>

  </div>

  <div class="col-xs-4">
      <input type="submit" name="submit" class="btn btn-success" value="Apply">
      <a  class="btn btn-primary" href="tickets.php?source=add_ticket">Add New</a>
  </div>
<table class="table table-condensed table-hover table-striped table-responsive container">
      <thead>
          <tr>
            <th>
              <input type="checkbox" id="selectAllBoxes">
            </th>
            <th>Id</th>
            <th>Category</th>
            <th>Department</th>
            <th>Title</th>
            <th>Ticket Age</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Description</th>
              <th>Upload Date</th>
          </tr>
      </thead>
      <tbody>
            <?php display_ticket();
                delete_ticket(); ?>
      </tbody>
</table>
</form>
