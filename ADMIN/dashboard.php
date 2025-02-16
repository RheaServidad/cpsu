<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Comparison Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #eef2f3, #8e9eab);
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .d-flex {
            display: flex;
        }

        .flex-grow-1 {
            flex-grow: 1;
        }

        .vh-100 {
            height: 100vh;
        }

        .vw-100 {
            width: 100vw;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .overflow-auto {
            overflow: auto;
        }

        .dashboard-container {
            max-width: calc(99% - 250px);
            margin-left: 250px;
            margin-right: 0; /* Removed right margin */
            padding: 30px;
            border-radius: 15px;
            background: #ffffff;
            margin-top: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        h1 {
            font-size: 2.5rem;
            color: #444;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .date-range {
            font-size: 1.1rem;
            color: #666;
        }

        .top-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .card {
            padding: 20px;
            color: #fff;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .card small {
            display: block;
            margin-top: 5px;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .card.violet {
            background: linear-gradient(135deg, #dc09ae, #eb65c7); /* Violet color */
        }

        .card.pink {
            background: linear-gradient(135deg, #ff66b2, #ee0979); /* Pink color */
        }

        .chart-container {
            padding: 20px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .chart-container h2 {
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #444;
            text-align: center;
        }

        .chart-container canvas {
            width: 100%;
            height: 400px;
        }
    </style>
</head>

<body>
    <div class='d-flex vh-100 vw-100 overflow-hidden'>
        <?php include 'sidebar.php'; ?>

        <div class="flex-grow-1 overflow-auto">
            <div class="dashboard-container">
                <?php include 'includes/header.php'; ?>
                <div class="header">
                    <h1>Colleges Performance Dashboard</h1>
                </div>

                <div class="top-cards">
                    <div class="card violet">
                        <h3>College of Computer Studies</h3>
                        <p>70,000</p>
                        <small>.</small>
                    </div>
                    <div class="card pink">
                        <h3>College of Business Management</h3>
                        <p>75,000</p>
                        <small>.</small>
                    </div>
                </div>

                <div class="chart-container">
                    <h2>PERFORMANCE</h2>
                    <canvas id="comparisonChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('comparisonChart').getContext('2d');
        const comparisonChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2019', '2020', '2021', '2022', '2023', '2024'], // Years from 2019 onwards
                datasets: [
                    {
                        label: 'College of Computer Studies',
                        data: [45000, 52000, 48000, 58000, 60000, 65000], // College of Computer Studies Data from 2019 to 2024
                        backgroundColor: 'rgba(220, 9, 174, 0.6)', // Violet color
                        borderColor: 'rgba(220, 9, 174, 1)', // Violet border
                        borderWidth: 1
                    },
                    {
                        label: 'College of Business Management',
                        data: [50000, 56000, 53000, 62000, 64000, 68000], // College of Business Management Data from 2019 to 2024
                        backgroundColor: 'rgba(255, 99, 132, 0.6)', // Pink color
                        borderColor: 'rgba(255, 99, 132, 1)', // Pink border
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Compitency '
                    }
                },
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
