<?php include('../templates/header.php') ?>
<?php include('../templates/navbar.php') ?>

<div class="container mt-4">
  <div class="d-flex flex-row">
    <div>
      <h3>Profile</h3>
    </div>
    <div class="pl-3">
      <button class="btn btn-secondary" value="Off" id="onoff" onclick="onoff();">EDIT</button>
    </div>
  </div>

  <hr />
  <form action="includes/profile-inc.php" method="POST" class="col-8 mx-auto">
    <fieldset id="formedit" disabled>
      <div class="form-group">
        <label for="usernameProf">Username</label>
        <input name="usernameProf" type="text" class="form-control" id="usernameProf" value="<?php echo $_SESSION['u_uid'] ?>">
      </div>
      <div class="form-group">
        <label for="lastnameProf">Surname</label>
        <input name="lastnameProf" type="text" class="form-control" id="lastnameProf" value="<?php echo $_SESSION['u_last'] ?>">
      </div>
      <div class="form-group">
        <label for="name">Given Name</label>
        <input name="firstnameProf" type="text" class="form-control" id="firstnameProf" value="<?php echo $_SESSION['u_first'] ?>">
      </div>
      <hr />
      <button name="profile-submit" type="submit" class="btn btn-success float-right">Submit</button>
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