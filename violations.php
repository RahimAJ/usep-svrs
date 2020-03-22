<?php include('templates/header.php') ?>
<?php include('templates/navbar.php') ?>

<?php
include('includes/dbh-inc.php');
$violations_array = mysqli_query($conn, "SELECT * FROM violations");
?>

<div class="container mt-4">
    <h3>Violations</h3>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="width: 13%">Violation No.</th>
                <th>Student ID</th>
                <th>Details</th>
                <th>Date Created</th>
                <th>Created by</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($violations_array)) {
                if ($row['deleted'] != NULL)
                    continue; ?>
                <tr onclick="window.location='violations.php?violation-id=<?php echo $row['id']; ?>'">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['details']; ?></td>
                    <td><?php echo $row['date_created']; ?></td>
                    <td><?php echo $row['created_by']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
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