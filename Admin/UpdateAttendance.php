<?php
session_start();

include('database.php');

// Fetch data from the database
$query = "SELECT * FROM Students;"; 
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Tables</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="AdminLTE-3.1.0/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar and Sidebar -->
        <?php include('Sidebar-Nav.php'); ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Students Table</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student First Name</th>
                                        <th>Student Last Name</th>
                                        <th>Attendance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Display each student row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $student_id = $row['student_id'];
                                        $attendance = $row['Attendance'];
                                    ?>
                                    <tr>
                                    <!-- Form for updating marks -->
                                    <form action="updateAttendanceInsert.php" method="POST">
                                        <!-- Display student information -->
                                        <td><?php echo $row['student_id']; ?></td>
                                        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['last_name']); ?></td>

                                        <!-- Marks display and input fields -->
                                        <td id="marks-display-<?php echo $row['student_id']; ?>"><?php echo $attendance; ?></td>
                                        <td style="display: none;" id="marks-edit-<?php echo $row['student_id']; ?>">
                                            <input name="NewAttendance" type="number" id="marks-input-<?php echo $row['student_id']; ?>" value="<?php echo $attendance; ?>">
                                        </td>

                                        <!-- Hidden student_id input for form submission -->
                                        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">

                                        <!-- Edit and Save buttons -->
                                        <td>
                                            <button type="button" onclick="enableEdit(<?php echo htmlspecialchars($row['student_id']); ?>)" id="edit-button-<?php echo $row['student_id']; ?>" class="btn btn-warning btn-sm">Edit</button>
                                            <button type="submit" style="display: none;" id="save-button-<?php echo $row['student_id']; ?>" class="btn btn-success btn-sm">Save</button>
                                        </td>
                                    </form>
                                </tr>                
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


     
    </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
    <script src="AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/AdminLTE/js/adminlte.min.js"></script>

    <script>
    function enableEdit(studentId) {
    // Hide the marks display and show the input field
    document.getElementById('marks-display-' + studentId).style.display = 'none';
    document.getElementById('marks-edit-' + studentId).style.display = 'block';
    document.getElementById('edit-button-' + studentId).style.display = 'none';
    document.getElementById('save-button-' + studentId).style.display = 'inline';
}

    </script>
</body>
</html>
