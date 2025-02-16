<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sidebar</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            overflow-x: hidden;
            background: linear-gradient(to bottom, #ffffff, #f1f8f6);
        }

        #sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(to bottom, #66bb6a, #43a047);
            color: #f8f9fa;
            transition: all 0.3s;
            overflow: hidden;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
        }

        #sidebar.collapsed {
            width: 80px;
        }

        #sidebar .square-div {
            text-align: center;
            padding: 35px 0;
            background: linear-gradient(to right, #388e3c, #2e7d32);
        }

        #sidebar .square-div img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        #sidebar .square-div h3 {
            font-size: 1.4rem;
            margin-top: 15px;
            color: #f9fbe7;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #sidebar ul li {
            margin: 0;
        }

        #sidebar ul .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #f8f9fa;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        #sidebar ul .nav-link i {
            font-size: 1.4rem;
            margin-right: 15px;
        }

        #sidebar ul .nav-link:hover,
        #sidebar ul .nav-link.active {
            background: linear-gradient(to right, #388e3c, #ffeb3b);
            color: #ffffff;
            border-left: 6px solid #ffeb3b;
            box-shadow: inset 5px 0 10px rgba(0, 0, 0, 0.1);
        }

        #sidebar ul .submenu {
            padding-left: 20px;
            background: #4caf50;
        }

        #sidebar ul .submenu .nav-link {
            padding: 10px 20px;
            font-size: 0.95rem;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        #sidebar.collapsed + .content {
            margin-left: 80px;
        }

        .toggle-btn {
            position: fixed;
            top: 20px;
            left: 280px;
            background: linear-gradient(to right, #66bb6a, #43a047);
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }

        #sidebar.collapsed + .toggle-btn {
            left: 100px;
        }

        .toggle-btn:hover {
            background: #81c784;
        }

        h1 {
            font-size: 2rem;
            color: #388e3c;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        @media screen and (max-width: 768px) {
            #sidebar {
                width: 200px;
            }

            #sidebar.collapsed {
                width: 60px;
            }

            .content {
                margin-left: 200px;
            }

            #sidebar.collapsed + .content {
                margin-left: 60px;
            }

            .toggle-btn {
                left: 220px;
            }

            #sidebar.collapsed + .toggle-btn {
                left: 70px;
            }
        }
    </style>
</head>

<body>
    <div id="sidebar" class="shadow">
        <div class="square-div">
            <img src="../img/logoo.png" alt="Admin Profile">
            <h3>ADMIN PANEL</h3>
        </div>
        <ul>
            <li><a href="dashboard.php" class="nav-link "><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#certificatesSubmenu" role="button" aria-expanded="false" aria-controls="certificatesSubmenu">
                    <i class="fas fa-certificate"></i><span>Competency</span>
                    <i class="fas fa-chevron-right ms-auto"></i>
                </a>
                <div class="collapse" id="certificatesSubmenu">
                    <ul class="submenu">
                        <li><a href="ccs_form.php" class="nav-link"><i class="fas fa-clipboard"></i><span>Assessment Form</span></a></li>
                        <li><a href="ccs-all.php" class="nav-link"><i class="fas fa-table"></i><span>View All Assessments</span></a></li>
                        <li>
                            <a class="nav-link dropdown-toggle" id="certificateDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-award"></i><span>Certificates</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="ccs-local.php">Local</a></li>
                                <li><a class="dropdown-item" href="ccs-regional.php">Regional</a></li>
                                <li><a class="dropdown-item" href="ccs-national.php">National</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            toggleBtn.classList.toggle('collapsed');
        });
    </script>
</body>

</html>
