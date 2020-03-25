<?php include('../templates/header.php') ?>
<?php include('../templates/navbar.php') ?>
<?php
echo '<script language="javascript">';
if (isset($_GET['password'])) {
  if ($_GET['password'] == "emptyfields") {
    echo 'alert("Please fill up all fields!")';
  }
  if ($_GET['password'] == "wrongpassword") {
    echo 'alert("Wrong Password!")';
  }
  if ($_GET['password'] == "wrongretype") {
    echo 'alert("New password does not match re-type!")';
  }
  if ($_GET['password'] == "success") {
    echo 'alert("Password successfully changed!")';
  }
}
echo '</script>';
?>


<div class="container mt-4">
  <h3 class="pb-2">Change Password</h3>
  <hr />
  <form action="includes/change-password-inc.php" method="POST" class="col-8 mx-auto">
    <fieldset id="formedit">
      <div class="form-group">
        <label for="passcurr">Current Password</label>
        <input name="passcurr" type="password" class="form-control" id="passcurr" placeholder="Type your current password for verification">
      </div>
      <div class="form-group">
        <label for="passnew">New Password</label>
        <input name="passnew" type="password" class="form-control" id="passnew" placeholder="Type your new password in this field">
      </div>
      <div class="form-group">
        <label for="passretype">Re-type New Password</label>
        <input name="passretype" type="password" class="form-control" id="passretype" placeholder="Re-type your new password">
      </div>
      <hr />
      <button name="password-change-submit" type="submit" class="btn btn-success float-right">Submit</button>
    </fieldset>
  </form>
</div>

<?php include('../templates/footer.php') ?>