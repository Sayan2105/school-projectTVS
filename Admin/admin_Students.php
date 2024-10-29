<?php
// Start session to check if admin is logged in
session_start();

// Include database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "school"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$query = "SELECT * FROM Students INNER JOIN Grades ON Students.student_id = Grades.student_id"; 
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

    <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Login.php">Logout</a>
                </li>
            </ul>
        </nav>
        
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary">
            <a href="admin_dashboard.php" class="brand-link">
                <span class="admin-dshbrd">Admin Dashboard</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="adminMain.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_password.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Passwords</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_admission.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_messages.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_Students.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="textList.php" class="nav-link"  >
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Website Contents</p>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
 
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
                            <h3 class="card-title">Students table</h3>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Class</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Assignment Name</th>
                                        <th>Grade</th>
                                        <th>Date Assigned</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['student_id'] . "</td>";  
                                            echo "<td>" . $row['first_name'] . "</td>";  
                                            echo "<td>" . $row['last_name'] . "</td>";  
                                            echo "<td>" . $row['class_id'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['phone'] . "</td>";
                                            echo "<td>" . $row['assignment_name'] . "</td>";
                                            echo "<td>" . $row['grade'] . "</td>";
                                            echo "<td>" . $row['date_assigned'] . "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
    <script src="AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/AdminLTE/js/adminlte.min.js"></script>
</body>
</html>