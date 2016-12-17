
<table class="table table-condensed table-hover table-striped">
      <thead>
          <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>User Role</th>
          </tr>
      </thead>
      <tbody>
            <?php display_user(); ?>
            <?php user_user(); ?>
            <?php user_admin(); ?>
            <?php delete_user(); ?>
      </tbody>
</table>
