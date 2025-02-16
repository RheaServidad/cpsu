<?php
include '../conn.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competency</title>
    <link rel="icon" href="assets/images/logo.png" type="image/png">

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/datatables.min.css">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e3e6f3);
            font-family: 'Inter', sans-serif;
        }

        .card-link {
            text-decoration: none;
        }

        .card-custom {
            background: linear-gradient(135deg, #b084f4, #6f42c1, #b084f4);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 80%;
        }

        /* Glow effect on hover */
        .card-custom:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        /* Neon Glow Effect */
        .card-custom::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(145deg, #f5f7fa, #e1e4f2);

            opacity: 0.6;
            z-index: -1;
            transition: opacity 0.3s ease-in-out;
        }

        .card-custom:hover::before {
            opacity: 0.9;
        }

        .card .inner {
            padding: 28px;
            text-align: center;
        }

        /* Link Styling */
        .card-custom a {
            text-decoration: none;
            color: white;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-title {
            font-size: 1.4rem;
            color: rgb(228, 233, 238);
            margin-bottom: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card .display-4 {
            font-size: 1rem;
            color: rgb(237, 224, 234);
            font-weight: 800;
            line-height: 1.2;
        }

        .card-custom:hover .card-title,
        .card-custom:hover .display-4 {
            color: #2980b9;
        }

        .card .display-6 {
            font-size: 2rem;
            color: #333;
            font-weight: bold;
        }

        .card i {
            color: #3498db;
            margin-right: 15px;
            font-size: 1.6rem;
        }

        .card-custom:hover .card-title,
        .card-custom:hover .display-6 {
            color: #3498db;
        }

        /* Custom Header Title */
        .header-title {
            font-size: 25px;
            font-weight: bold;
            color: #6f42c1;
            text-transform: uppercase;
        }

        /* Font size change for Faculty section */
        .faculty-title {
            font-size: 20px;
            /* Smaller font size */
            font-weight: 600;
            /* Optional: Adjust the weight for clarity */
            color: #6f42c1;
        }
    </style>
</head>

<body>
    <div class='d-flex vh-100 vw-100 overflow-hidden'>
        <?php include 'sidebar.php'; ?>

        <div class="flex-grow-1 overflow-auto">
            <?php include 'header.php'; ?>

            <div class="row mt-3 justify-content-center">
                <div class="col me-2 ms-2">
                    <div class="container py-5">
                        <div class="mb-4">
                            <h3 class="header-title text-center">📊 Dashboard</h3>
                        </div>

                        <!-- Aesthetic Cards with Icons -->
                        <div class="row g-4">
                            <div class="col-lg-4 col-6">
                                <a href="venue.php?Total" class="card-link">
                                    <div class="small-box card card-custom">
                                        <div class="inner">
                                            <h5 class="card-title"><i class="fas fa-users"></i> Total Population</h5>
                                            <p class="display-4">18,345</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-6">
                                <a href="venue.php?Local" class="card-link">
                                    <div class="small-box card card-custom">
                                        <div class="inner">
                                            <h5 class="card-title"><i class="fas fa-chalkboard-user"></i> Full Time</h5>
                                            <p class="display-4">18,345</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-6">
                                <a href="venue.php?Regional" class="card-link">
                                    <div class="small-box card card-custom">
                                        <div class="inner">
                                            <h5 class="card-title"><i class="fas fa-user-clock"></i> Part Time</h5>
                                            <p class="display-4">2,745</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Chart & Table Section -->
                        <div class="d-flex flex-wrap gap-4 mt-5 align-items-start">

                            <!-- Chart Section -->
                            <div class="chart-container flex-grow-1" style="min-width: 60%;">
                                <h6 class="header-title">📈 Data Overview by Year</h6>
                                <canvas id="myChart"></canvas>
                            </div>

                            <!-- Table Container -->
                            <div class="table-container" style="min-width: 35%;">
                                <h6 class="header-title">👤 Top Active Users</h6>
                                <table class="table table-bordered table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Users</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Rhea May Servidad</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Faculty Section -->
                        <div class="mt-5">
                            <h7 class="faculty-title"><i class="fas fa-chalkboard-teacher"></i> Faculty</h7>
                            <div class="recent-activities mt-3">
                                <p class="text-muted mb-0">No recent activities to show.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    include '../conn.php';

    $userID = $_SESSION['a_id'];

    // SQL query to get the counts
    $query = "
SELECT 
    YEAR(`to`) AS year,
    SUM(CASE WHEN venue = 'LOCAL' THEN 1 ELSE 0 END) AS local,
    SUM(CASE WHEN venue = 'REGIONAL' THEN 1 ELSE 0 END) AS regional,
    SUM(CASE WHEN venue = 'NATIONAL' THEN 1 ELSE 0 END) AS national
FROM personnel
WHERE user_id = ?
GROUP BY YEAR(`to`)
ORDER BY YEAR(`to`) ASC
";

    $select = $conn->prepare($query);
    $select->execute([$userID]);
    $results = $select->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <script>
        var currentYear = new Date().getFullYear();
        var years = [];
        for (var year = 2019; year <= currentYear; year++) {
            years.push(year.toString());
        }

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Local',
                    data: years.map((_, i) => < ? = $results['local']; ? > +i * 1000),
            backgroundColor: 'rgba(111, 66, 193, 0.6)',
            borderColor: '#6f42c1',
            borderWidth: 1
                },
        {
            label: 'Regional',
                data: years.map((_, i) => < ? = $results['regional']; ? > +i * 200),
            backgroundColor: 'rgba(176, 132, 244, 0.6)',
                borderColor: '#b084f4',
                    borderWidth: 1
        },
        {
            label: 'National',
                data: years.map((_, i) => < ? = $results['national']; ? > +i * 5),
            backgroundColor: 'rgba(203, 189, 226, 0.6)',
                borderColor: '#cbbde2',
                    borderWidth: 1
        }
            ]
        },
        options: {
            responsive: true,
                scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

</body>

</html>