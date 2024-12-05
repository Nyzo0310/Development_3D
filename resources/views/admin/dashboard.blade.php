<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
            color: white;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }

        .navbar .username {
            display: flex;
            align-items: center;
        }

        .navbar .username i {
            margin-right: 5px;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 0;
        }

        .sidebar .user-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .user-info img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar .user-info h5 {
            margin: 0;
            font-size: 1.2rem;
        }

        .sidebar .user-info span {
            font-size: 0.9rem;
            color: #28a745;
        }

        .sidebar h5 {
            color: #ccc;
            font-size: 1rem;
            margin-left: 15px;
            margin-top: 20px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .sidebar h5.highlighted {
            color: #007bff;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            border-radius: 4px;
            margin: 5px 0;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #007bff;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .kpi-cards .card {
            text-align: center;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .card.bg-blue {
            background-color: #007bff;
        }

        .card.bg-green {
            background-color: #28a745;
        }

        .card.bg-yellow {
            background-color: #ffc107;
        }

        .card.bg-red {
            background-color: #dc3545;
        }

        /* Chart Section */
        .chart-section {
            margin-top: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .chart-section select {
            width: 200px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a class="navbar-brand" href="#">Company Name</a>
        <div class="username">
            <i class="fas fa-user-circle"></i>
            <span>Username</span>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <img src="{{ asset('path_to_user_icon.png') }}" alt="User Icon">
            <h5>Username</h5>
            <span><i class="fas fa-circle"></i> Online</span>
        </div>

        <!-- Menu -->
        <h5 class="highlighted">Reports</h5>
        <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>

        <h5 class="highlighted">Manage</h5>
        <a href="#"><i class="fas fa-calendar-check"></i> Attendance</a>
        <a href="#"><i class="fas fa-users"></i> Employees</a>
        <a href="#"><i class="fas fa-dollar-sign"></i> Deductions</a>
        <a href="#"><i class="fas fa-briefcase"></i> Positions</a>

        <h5 class="highlighted">Printables</h5>
        <a href="#"><i class="fas fa-print"></i> Payroll</a>
        <a href="#"><i class="fas fa-clock"></i> Schedule</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Dashboard</h2>
        <div class="row g-3 kpi-cards">
            <div class="col-md-3">
                <div class="card bg-blue">
                    <h3>1</h3>
                    <p>Total Employees</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-green">
                    <h3>100.00%</h3>
                    <p>On Time Percentage</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-yellow">
                    <h3>1</h3>
                    <p>On Time Today</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-red">
                    <h3>0</h3>
                    <p>Late Today</p>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-section">
            <h3>Monthly Attendance Report</h3>
            <select>
                <option>Select Year</option>
                <option>2024</option>
                <option>2023</option>
            </select>
            <!-- Chart Placeholder -->
            <div style="height: 300px; background-color: #e9ecef; margin-top: 20px;"></div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>