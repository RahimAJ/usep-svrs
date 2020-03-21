<?php include('templates/header.php') ?>
<?php include('templates/navbar.php') ?>

<?php
include('includes/dbh-inc.php');
$violations_array = mysqli_query($conn, "SELECT * FROM students");
?>

<div class="container mt-4">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Course</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($violations_array)) {
        if ($row['deleted'] != NULL)
          continue; ?>
        <tr onclick="window.location='student-list.php?student-id=<?php echo $row['id']; ?>'">
          <td><?php echo $row['student_id']; ?></td>
          <td><?php echo $row['student_lastname']; ?></td>
          <td><?php echo $row['student_firstname']; ?></td>
          <td><?php echo $row['course_id']; ?></td>
        </tr>
      <?php
      } ?>
    </tbody>
  </table>
</div>

<?php include('templates/footer.php') ?>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>