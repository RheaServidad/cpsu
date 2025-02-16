<?php
include 'includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" class="rounded-circle" href="assets/images/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/login-register.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to right, #c9d6ff, #e2e2e2);
        }

        .container {
            background-color: #fff;
            width: 500px;
            padding: 2rem;
            margin: 5% auto;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        h1.form-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 1rem;
            background-color: #f9f9f9;
            transition: all 0.3s;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #007bff;
            background-color: #fff;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 1rem;
            color: #666;
            pointer-events: none;
            transition: all 0.3s;
        }

        .input-group input:focus+label,
        .input-group select:focus+label,
        .input-group input:not(:placeholder-shown)+label {
            top: -10px;
            font-size: 0.9rem;
            color: #007bff;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links a {
            color: #007bff;
            font-weight: 600;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .logo {
            width: 150px;
            height: 150px;
            display: block;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            h1.form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container" id="signup">
        <?php include 'includes/sweetmessage.php'; ?>

        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <img src="img/logoo.png" class="rounded-circle logo" alt="Logo">
            </div>
        </div>
        <h1 class="form-title">Admin Register</h1>
        <form action="process.php" method="post">
            <!-- First Name Field -->
            <div class="input-group">
                <input type="text" name="f_name" id="fname" placeholder=" " required>
                <label for="fname">First Name</label>
            </div>
            <!-- Middle Name Field -->
            <div class="input-group">
                <input type="text" name="m_name" id="mname" placeholder=" " required>
                <label for="mname">Middle Name</label>
            </div>
            <!-- Last Name Field -->
            <div class="input-group">
                <input type="text" name="l_name" id="lname" placeholder=" " required>
                <label for="lname">Last Name</label>
            </div>
            <!-- Course and Faculty Status Fields -->
            <div class="input-group">
                <select name="colleges" id="colleges" required>
                    <option value="" disabled selected>Colleges</option>
                    <option value="Head Admin">Head Admin</option>
                    <option value="College of Computer Studies">College of Computer Studies</option>
                    <option value="College of Business Management">College of Business Management</option>
                </select>
            </div>
            <!-- Email Field -->
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder=" " required>
                <label for="email">Email</label>
            </div>
            <!-- Password Field -->
            <div class="input-group">
                <input type="password" name="password1" id="password1" placeholder=" " required>
                <label for="password1">Password</label>
            </div>
            <!-- Confirm Password Field -->
            <div class="input-group">
                <input type="password" name="password2" id="password2" placeholder=" " required>
                <label for="password2">Confirm Password</label>
            </div>
            <!-- Submit Button -->
            <button type="submit" name="register" class="btn">Register</button>
        </form>

        <div class="links">
            <p>Already Have an Account? <a href="../alllogin.php">Sign In</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>