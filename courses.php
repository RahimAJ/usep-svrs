<?php include('templates/header.php') ?>
<?php include('templates/navbar.php') ?>

<?php
include('includes/dbh-inc.php');
$violations_array = mysqli_query($conn, "SELECT * FROM courses");
?>

<div class="container mt-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>No. of Students</th>
                <th>No. of Violations</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($violations_array)) {?>
                <tr onclick="window.location='courses.php?course-id=<?php echo $row['id']; ?>'">
                    <td><?php echo $row['course_id']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td>
                        <?php
                        $course_id = $row['course_id'];
                        $result = mysqli_query($conn, "SELECT * FROM students WHERE course_id = '$course_id';");
                        echo mysqli_num_rows($result);
                        ?>
                    </td>
                    <td>
                        <?php
                        $course_id = $row['course_id'];
                        $result = mysqli_query($conn, "SELECT violations.student_id FROM violations
                        LEFT JOIN students ON students.student_id = violations.student_id
                        WHERE students.course_id = '$course_id';");
                        echo mysqli_num_rows($result);
                        ?>
                    </td>
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