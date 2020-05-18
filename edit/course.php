<?php include('../templates/header.php') ?>
<?php include('../templates/navbar.php') ?>

<?php
include('../includes/dbh-inc.php');
if (isset($_GET['course-id'])) {
  $editID = $_GET['course-id'];
  if (empty($editID) || ($editID == "")) {
    header("Location: ./home.php?edit=emptyfields");
  }
  $edit_array = mysqli_query($conn, "SELECT * FROM courses WHERE course_id = '$editID'");
  if (mysqli_num_rows($edit_array) < 1) {
    header("Location: ../home.php?course=notfound");
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
        <h3>EDIT COURSE</h3>
        <h6>ID No. - <?php echo $editID ?></h6>
      </div>
      <div class="mx-auto col-8 py-2">
        <?php
        while ($row = mysqli_fetch_array($edit_array)) {
        ?>
          <form method="POST" action="includes/edit-inc.php" class="col-8 mx-auto">
            <input type="hidden" name="main_ID" value="<?php echo $row['id'] ?>">
            <input type="hidden" name="old_ID" value="<?php echo $row['course_id'] ?>">
            <div class="form-group">
              <label for="course_id">Course ID</label>
              <input name="course_id" type="text" class="form-control" id="course_id" value="<?php echo $row['course_id'] ?>">
            </div>
            <div class="form-group">
              <label for="course_name">Course Description</label>
              <input name="course_name" type="text" class="form-control" id="course_name" value="<?php echo $row['course_name'] ?>">
            </div>
            <hr />
            <button name="course-update" type="submit" class="btn btn-success float-right">Update course</button>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php include('../templates/footer.php') ?>