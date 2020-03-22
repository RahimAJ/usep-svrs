<?php include('../templates/header.php') ?>
<?php include('../templates/navbar.php') ?>

<div class="container mt-4">
  <h3 class="pb-2">Change Password</h3>
  <hr />
  <form class="col-8 mx-auto">
    <fieldset id="formedit">
      <div class="form-group">
        <label for="passcurr">Current Password</label>
        <input type="password" class="form-control" id="passcurr" placeholder="Type your current password for verification">
      </div>
      <div class="form-group">
        <label for="passnew">New Password</label>
        <input type="password" class="form-control" id="passnew" placeholder="Type your new password in this field">
      </div>
      <div class="form-group">
        <label for="passretype">Re-type New Password</label>
        <input type="password" class="form-control" id="passretype" placeholder="Re-type your new password">
      </div>
      <hr />
      <button type="submit" class="btn btn-success float-right">Submit</button>
    </fieldset>
  </form>
</div>

<?php include('../templates/footer.php') ?>

<script type="text/javascript">
  function onoff() {
    currentvalue = document.getElementById('onoff').value;
    if (currentvalue == "Off") {
      document.getElementById("onoff").value = "On";
      document.getElementById("formedit").disabled = false;
    } else {
      document.getElementById("onoff").value = "Off";
      document.getElementById("formedit").disabled = true;
    }
  }
</script>