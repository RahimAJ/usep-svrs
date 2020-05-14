<?php include('templates/header.php') ?>
<?php include('templates/navbar.php') ?>

<?php
include('includes/dbh-inc.php');
if (isset($_GET['searchType'], $_GET['searchInput'])) {
    $searchType = $_GET['searchType'];
    $searchInput = $_GET['searchInput'];
    if (empty($searchType) || ($searchInput == "")) {
        header("Location: ./home.php?search=emptyfields");
    }
    if ($searchType == "student_id") {
        $search_array = mysqli_query($conn, "SELECT * FROM students WHERE student_id LIKE '%$searchInput%'");
    }
    if ($searchType == "name") {
        $search_array = mysqli_query($conn, "SELECT * FROM students WHERE student_lastname LIKE '%$searchInput%' OR student_firstname LIKE '%$searchInput%'");
    }
} else {
    header("Location: ./home.php?search=error");
}
?>

<div class="container mt-4">
    <h3>Search</h3>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Course</th>
                <th style="width: 12%">Violations</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($search_array)) {
                if ($row['deleted'] != NULL)
                    continue; ?>
                <tr onclick="window.location='student-list.php?student-id=<?php echo $row['student_id']; ?>'">
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['student_lastname']; ?></td>
                    <td><?php echo $row['student_firstname']; ?></td>
                    <td><?php echo $row['course_id']; ?></td>
                    <td>
                        <?php
                        $student_id = $row['student_id'];
                        $result = mysqli_query($conn, "SELECT * FROM violations WHERE (student_id = '$student_id') AND (deleted IS NULL);");
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
        $('#datatable').DataTable();
    });
</script>