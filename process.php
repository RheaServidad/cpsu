<?php
include '../conn.php';

// Login

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->prepare('SELECT * FROM admin WHERE a_email = ?');
    $check->execute([$email]);

    $data = $check->fetch();

    if ($data && password_verify($password, $data['a_pass'])) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['a_id'] = $data['a_id'];

        header("Location:dashboard.php");
        exit();
    } else {
        $alrt = 'Email or Password do not match!';
        header("Location: login.php?alrt=" . urlencode($alrt));
        exit;
    }
}


// Register a user
if (isset($_POST['register'])) {
    $fname = $_POST['f_name'];
    $mname = $_POST['m_name'];
    $lname = $_POST['l_name'];
    $colleges = $_POST['colleges'];
    $email = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    // Check if passwords match
    if ($pass1 === $pass2) {
        // Check if email already exists
        $checkEmail = $conn->prepare("SELECT * FROM admin WHERE a_email = ?");
        $checkEmail->execute([$email]);

        if ($checkEmail->rowCount() > 0) {
            // Email already exists
            $msg = "Email is already registered!";
            header("Location: register.php?msg=" . urlencode($msg));
            exit();
        } else {
            // Proceed with registration
            $hash = password_hash($pass1, PASSWORD_DEFAULT);

            // INSERT INTO users
            $addUser = $conn->prepare("INSERT INTO admin (a_fname, a_mname, a_lname, a_colleges, a_email, a_pass ) VALUES(?, ?, ?, ?, ?, ?)");
            $addUser->execute([
                $fname,
                $mname,
                $lname,
                $colleges,
                $email,
                $hash
            ]);

            // Redirect based on college attribute
            if ($colleges == 'College of Computer Studies') {
                header("Location:CCS_ADMIN/dashboard.php
                ");
            } elseif ($colleges == 'College of Business Management') {
                header("Location: CBM_ADMIN/login.php");
            } else {
                header("Location: Admin/dashboard.php");
            }
            exit();
        }
    } else {
        $msg = "Passwords do not match!";
        header("Location: register.php?msg=" . urlencode($msg));
        exit();
    }
}