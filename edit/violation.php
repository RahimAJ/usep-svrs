<?php include('../templates/header.php') ?>
<?php include('../templates/navbar.php') ?>

<?php
include('../includes/dbh-inc.php');
if (isset($_GET['violation-id'])) {
  $editID = $_GET['violation-id'];
  if (empty($editID) || ($editID == "")) {
    header("Location: ./home.php?edit=emptyfields");
  }
  $edit_array = mysqli_query($conn, "SELECT * FROM violations WHERE id = '$editID'");
  if (mysqli_num_rows($edit_array) < 1) {
    header("Location: ../home.php?violation=notfound");
    exit();
  }
} else {
  header("Location: ../home.php?edit=error");
}
?>

<div class="container mt-4">
  <div class="container py-3">
    <div class="row">
      <div class="col-lg-3 col-sm-4 py-2">
        <h3>EDIT VIOLATION</h3>
        <h6>ID No. - <?php echo $editID ?></h6>
      </div>
      <div class="mx-auto col-8 py-2">
        <?php
        while ($row = mysqli_fetch_array($edit_array)) {
        ?>
          <form method="POST" action="includes/edit-inc.php" class="col-8 mx-auto">
            <input type="hidden" name="main_ID" value="<?php echo $row['id'] ?>">
            <!-- <div class="form-group">
              <label for="violation_id">Violation ID</label>
              <input name="violation_id" type="text" class="form-control" id="violation_id" value="<?php echo $row['id'] ?>">
            </div> -->
            <div class="form-group">
              <label for="student_id">Student ID</label>
              <input name="student_id" type="text" class="form-control" id="student_id" value="<?php echo $row['student_id'] ?>">
            </div>
            <div class="form-group">
              <label for="details">Details</label>
              <textarea style="height:200px;" name="details" type="text" class="form-control" id="details"><?php echo $row['details'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="details">Remarks</label>
              <textarea style="height:100px;" name="remarks" type="text" class="form-control" id="remarks"><?php echo $row['remarks'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="date_created">Date Created</label>
              <input name="date_created" type="text" class="form-control" id="date_created" value="<?php echo $row['date_created'] ?>">
            </div>
            <hr />
            <?php
            if ($row['deleted'] != NULL) {
              echo '<button name="violation-recover" type="submit" class="btn btn-warning float-left">Recover Violation</button>';
            } else {
              echo '<button name="violation-delete" type="submit" class="btn btn-danger float-left">Delete Violation</button>';
            }
            ?>
            <button name="violation-update" type="submit" class="btn btn-success float-right">Update Violation</button>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php include('../templates/footer.php') ?>