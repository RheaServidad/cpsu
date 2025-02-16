<?php 
if(isset($_SESSION['logged_in'])){
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
            /* Light green gradient */
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

    .form-title {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .input-group-text {
        background-color: #f2f2f2;
        border: 1px solid #ccc;
    }

    .input-group input {
        border-radius: 25px;
        padding: 12px;
    }

    /* Create smooth hover effect */
    .btn a {
        color: white;
        text-decoration: none;
    }

    /* Custom scrollbar */
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
                <img src="img/logoo.png" class="rounded-circle" style="width: 150px; height: 150px;"
                    alt="Logo">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-15">
                <h1 class="form-title text-center">ADMIN</h1>
                <form method="post" action="CCS_ADMIN/process.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Name@email.com" required>
                            <span class="input-group-text me-2"><i class="fas fa-envelope"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" required>
                            <span class="input-group-text me-2"><i class="fas fa-lock" aria-hidden="true"></i></span>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>