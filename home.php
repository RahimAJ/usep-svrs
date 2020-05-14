<?php include('templates/header.php') ?>
<?php include('templates/navbar.php') ?>
<?php include('includes/home-inc.php') ?>

<?php
echo '<script language="javascript">
  ';
if (isset($_GET['violation'])) {
  $violation = $_GET['violation'];
  switch ($violation) {
    case 'emptyfields':
      echo 'alert("Violation - Please fill in all fields!")';
      break;
    case 'studentnotfound':
      echo 'alert("Student not found!\nPlease add the student first!")';
      break;
    case 'violationadded':
      echo 'alert("Violation successfully added!")';
      break;
  }
}

if (isset($_GET['student'])) {
  $student = $_GET['student'];
  switch ($student) {
    case 'emptyfields':
      echo 'alert("Student - Please fill in all fields!")';
      break;
    case 'coursenotfound':
      echo 'alert("Course not found!\nPlease add the course first!")';
      break;
    case 'studentadded':
      echo 'alert("Student successfully added!")';
      break;
  }
}

if (isset($_GET['course'])) {
  $course = $_GET['course'];
  switch ($course) {
    case 'emptyfields':
      echo 'alert("Course - Please fill in all fields!")';
      break;
    case 'courseadded':
      echo 'alert("Course successfully added!")';
      break;
  }
}
echo '
</script>';
?>

<div class="container mt-4">
  <div class="container py-3">
    <div class="row">
      <div class="ml-auto col-lg-3 col-sm-4 py-2">

        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item p-2 list-group-item-action active" data-toggle="list" href="#list1" role="tab">
            <img class="img-fluid rounded-circle bg-warning" src="./assets/img/violation-icon.png"> Violation
          </a>
          <a class="list-group-item p-2 list-group-item-action" data-toggle="list" href="#list2" role="tab">
            <img class="img-fluid rounded-circle bg-primary" src="./assets/img/student-icon.png"> Student
          </a>
          <a class="list-group-item p-2 list-group-item-action" data-toggle="list" href="#list3" role="tab">
            <img class="img-fluid rounded-circle bg-info" src="./assets/img/course-icon.png"> Course
          </a>

        </div>
      </div>
      <div class="mr-auto col-lg-7 col-sm-8 py-2">
        <div class="tab-content">
          <div class="tab-pane active" id="list1" role="tabpanel">
            <h4>VIOLATION</h4>
            <hr />
            <form method="POST" class="col-8 mx-auto">
              <div class="form-group">
                <label for="violation_studendtID">Student ID</label>
                <input name="violation_studentID" type="text" class="form-control" id="violation_studentID" placeholder="Please type the Student's ID">
              </div>
              <div class="form-group">
                <label for="violation_details">Details</label>
                <textarea style="height:200px;" name="violation_details" type="textarea" class="form-control" id="violation_details" placeholder="Input details about the student's violation"></textarea>
              </div>
              <hr />
              <button name="violation-add" type="submit" class="btn btn-success float-right">Add Violation</button>
            </form>
          </div>
          <div class="tab-pane" id="list2" role="tabpanel">
            <h4>STUDENT</h4>
            <hr />
            <form method="POST" class="col-8 mx-auto">
              <div class="form-group">
                <label for="student_studentID">Student ID</label>
                <input name="student_studentID" type="text" class="form-control" id="student_studentID" placeholder="Please type the Student's ID">
              </div>
              <div class="form-group">
                <label for="student_lastname">Surname</label>
                <input name="student_lastname" type="text" class="form-control" id="student_lastname" placeholder="Student's Last Name">
              </div>
              <div class="form-group">
                <label for="student_firstname">Given Name</label>
                <input name="student_firstname" type="text" class="form-control" id="student_firstname" placeholder="Student's Given Name">
              </div>
              <div class="form-group">
                <label for="student_course">Course ID</label>
                <input name="student_course" type="text" class="form-control" id="student_course" placeholder="Ex. BSIT, BSCE, BSBA">
              </div>
              <hr />
              <button name="student-add" type="submit" class="btn btn-success float-right">Add Student</button>
            </form>
          </div>
          <div class="tab-pane" id="list3" role="tabpanel">
            <h4>COURSE</h4>
            <hr />
            <form method="POST" class="col-8 mx-auto">
              <div class="form-group">
                <label for="course_courseID">Course ID</label>
                <input name="course_courseID" type="text" class="form-control" id="course_courseID" placeholder="Ex. BSIT, BSCE, BSBA">
              </div>
              <div class="form-group">
                <label for="course_name">Course Full Name</label>
                <input name="course_name" type="text" class="form-control" id="course_name" placeholder="Ex. Bachelor of Science in Civil Engineering">
              </div>
              <hr />
              <button name="course-add" type="submit" class="btn btn-success float-right">Add Course</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include('templates/footer.php') ?>