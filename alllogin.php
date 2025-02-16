
<?php
if (isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    ob_end_flush();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" class="rounded-circle" href="assets/images/logo1.png" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(to right, #d3f9d8, #e2e2e2);
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background: #fff;
            width: 500px;
            padding: 1.2rem;
            margin: 4% auto;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }

        .btn {
            border-radius: 25px;
            padding: 12px 20px;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: #0066cc;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #004b8d;
            transform: scale(1.05);
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .btn-css {
            background-color: rgb(241, 93, 192);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-css:hover {
            background-color: rgb(241, 93, 192);
            transform: scale(1.05);
        }

        .btn-cbm {
            background-color: #800080;
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-cbm:hover {
            background-color: rgb(235, 53, 235);
            transform: scale(1.05);
        }

        .btn-admin {
            background-color: #004085; /* Dark blue for admin */
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-admin:hover {
            background-color:rgb(156, 194, 231); /* Darker blue on hover */
            transform: scale(1.05);
        }

        .form-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .input-group input {
            border-radius: 25px;
            padding: 12px;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #d1e5ff;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(#dc0b1c, #ff22e6, #fff);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php include 'sweetmessage.php'; ?>
    <div class="container" id="signIn">
        <div class="row justify-content-center mt-3">
            <div class="col-12 text-center mb-4">
                <img src="img/logoo.png" class="rounded-circle" style="width: 150px; height: 150px;" alt="Logo">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-15">
                <h1 class="form-title text-center">Sign In</h1>
                <form method="post" action="process.php">
                    <div class="mb-3">
                        <button type="button" class="btn btn-css w-100" onclick="window.location.href='CBM/login.php'">
                            <i class="fas fa-utensils"></i> COLLEGE OF BUSINESS MANAGEMENT
                        </button>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-cbm w-100" onclick="window.location.href='CCS/login.php'">
                            <i class="fas fa-database"></i> COLLEGE OF COMPUTER STUDIES
                        </button>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-admin w-100" onclick="window.location.href='admin_login.php'">
                            <i class="fas fa-user-shield"></i> ADMIN
                        </button>
                    </div>
                    <div class="text-center mt-3">
                        <h6><a class="btn btn-success" href="register.php">Create account</a></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
