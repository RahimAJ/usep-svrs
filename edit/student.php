<?php include('../templates/header.php') ?>
<?php include('../templates/navbar.php') ?>

<?php
include('../includes/dbh-inc.php');
if (isset($_GET['student-id'])) {
  $editID = $_GET['student-id'];
  if (empty($editID) || ($editID == "")) {
    header("Location: ./home.php?edit=emptyfields");
  }
  $edit_array = mysqli_query($conn, "SELECT * FROM students WHERE student_id = '$editID'");
  if (mysqli_num_rows($edit_array) < 1) {
    header("Location: ../home.php?student=notfound");
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
        <h3>EDIT STUDENT</h3>
        <h6>ID No. - <?php echo $editID ?></h6>
      </div>
      <div class="mx-auto col-8 py-2">
        <?php
        while ($row = mysqli_fetch_array($edit_array)) {
        ?>
          <form method="POST" action="includes/edit-inc.php" class="col-8 mx-auto">
            <input type="hidden" name="main_ID" value="<?php echo $row['id'] ?>">
            <input type="hidden" name="old_ID" value="<?php echo $row['student_id'] ?>">
            <div class="form-group">
              <label for="student_studentID">Student ID</label>
              <input name="student_studentID" type="text" class="form-control" id="student_studentID" value="<?php echo $row['student_id'] ?>">
            </div>
            <div class="form-group">
              <label for="student_lastname">Surname</label>
              <input name="student_lastname" type="text" class="form-control" id="student_lastname" value="<?php echo $row['student_lastname'] ?>">
            </div>
            <div class="form-group">
              <label for="student_firstname">Given Name</label>
              <input name="student_firstname" type="text" class="form-control" id="student_firstname" value="<?php echo $row['student_firstname'] ?>">
            </div>
            <div class="form-group">
              <label for="student_course">Course ID</label>
              <input name="student_course" type="text" class="form-control" id="student_course" value="<?php echo $row['course_id'] ?>">
            </div>
            <hr />
            <?php 
              if($row['deleted'] != NULL){
                echo '<button name="student-recover" type="submit" class="btn btn-warning float-left">Recover Student</button>';
            } else {
                echo '<button name="student-delete" type="submit" class="btn btn-danger float-left">Delete Student</button>';
              }
            ?>
            <button name="student-update" type="submit" class="btn btn-success float-right">Update Student</button>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php include('../templates/footer.php') ?>