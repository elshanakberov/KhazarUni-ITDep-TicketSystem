<?php
    if(isset($_POST['checkBoxArray'])){
      $checkBoxArray = $_POST['checkBoxArray'];

      foreach($checkBoxArray as $checkBoxValue){
            echo $checkBoxValue;
      }
    }
?>

<form class="" action="" method="post">

  <div id="bulkOptionContainer" class="col-xs-2">
      <select class="" name="">
        <option value="">Select Options</option>
        <option value="">Publish</option>
        <option value="">Draft</option>
        <option value="">Delete</option>
      </select>

  </div>

  <div class="col-xs-4">
      <input type="submit" name="submit" class="btn btn-success" value="Apply">
      <a  class="btn btn-primary" href="add_ticket.php">Add New</a>
  </div>
<table class="table table-condensed table-hover table-striped">
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
