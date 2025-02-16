<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Aesthetic Sidebar</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        #sidebar {
            height: 100vh;
            transition: width 0.3s ease-in-out;
            background: linear-gradient(135deg,rgb(232, 225, 241), #6f42c1,rgb(232, 225, 241));
            backdrop-filter: blur(10px); /* Glassmorphism effect */
            color: white;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
            overflow-x: hidden;
            width: 250px;
            position: fixed;
            z-index: 1000;
            border-right: 2px solid rgba(255, 255, 255, 0.1); /* Subtle border */
        }

        #sidebar.sidebar-collapsed {
            width: 70px;
        }

        #sidebar.sidebar-expanded {
            width: 300px;
        }

        #sidebar .square-div {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        #sidebar .square-div img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            object-fit: cover;
            transition: transform 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        #sidebar.sidebar-expanded .square-div img {
            transform: scale(1.2);
            border-color: rgba(255, 255, 255, 0.7);
        }

        #sidebar .square-div h3 {
            font-size: 1.2rem;
            margin-top: 15px;
            color: white;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        #sidebar.sidebar-collapsed .square-div h3 {
            opacity: 0;
            transform: translateY(-20px);
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #sidebar ul li {
            margin: 10px 0;
        }

        #sidebar ul .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.3s ease-in-out, color 0.3s ease-in-out, transform 0.3s ease-in-out;
            border-radius: 8px;
            margin: 0 10px;
        }

        #sidebar ul .nav-link i {
            font-size: 1.2rem;
            transition: transform 0.3s ease-in-out;
        }

        #sidebar ul .nav-link:hover,
        #sidebar ul .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            transform: translateX(5px);
        }

        #sidebar ul .nav-link:hover i {
            transform: scale(1.1);
        }

        #sidebar.sidebar-collapsed .nav-link span {
            display: none;
        }

        #sidebar.sidebar-collapsed .nav-link i {
            margin: 0 auto;
            font-size: 1.5rem;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        #sidebar.sidebar-collapsed+.content {
            margin-left: 70px;
        }

        .arrow {
            margin-left: auto;
            transition: transform 0.3s ease-in-out;
        }

        .nav-link[aria-expanded="true"] .arrow {
            transform: rotate(90deg);
        }

        .submenu {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            margin: 5px 10px;
            padding: 5px 0;
        }

        .submenu .nav-link {
            padding-left: 40px;
        }

        .dropdown-menu {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px); /* Glassmorphism effect */
        }

        .dropdown-item {
            color: white;
            padding: 10px 20px;
            transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        .dropdown-toggle::after {
            display: none;
        }

        /* Hover effect for dropdown toggle */
        .dropdown-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body>
    <div id="sidebar" class="sidebar-expanded shadow">
        <div class="square-div">
            <img src="../img/css1.jpg" alt="Profile Icon">
            <h3>COLLEGE OF COMPUTER STUDIES ADMIN</h3>
        </div>
        <ul>
            <li><a href="dashboard.php" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#certificatesSubmenu" role="button"
                    aria-expanded="false" aria-controls="certificatesSubmenu">
                    <i class="fas fa-certificate"></i><span>Competency</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </a>
                <div class="collapse" id="certificatesSubmenu">
                    <ul class="submenu ms-4">
                        <li><a href="ccs_form.php" class="nav-link"><i class="fas fa-clipboard"></i><span>Assessment
                                    Form</span></a></li>
                        <li><a href="ccs-all.php" class="nav-link"><i class="fas fa-table"></i><span>View All
                                    Assessments</span></a></li>
                        <li>
                            <a class="nav-link dropdown-toggle" id="certificateDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-award"></i><span>Certificates</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="ccs-all.php">All Certificate</a></li>
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

    <div class="content">
        <!-- Your content goes here -->
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.nav-link[data-bs-toggle="collapse"]').on('click', function () {
                $(this).find('.arrow').toggleClass('rotate');
            });
        });
    </script>
</body>

</html>