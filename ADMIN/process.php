<?php
include '../conn.php';

// Register a user
if (isset($_POST['admin_register'])) {
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
            header("Location: admin_register.php?msg=" . urlencode($msg));
            exit();
        } else {
            // Proceed with registration
            $hash = password_hash($pass1, PASSWORD_DEFAULT);

            // INSERT INTO users
            $addUser = $conn->prepare("INSERT INTO admin (a_fname, a_mname, a_lname, a_colleges, a_email, a_pass ) VALUES( ?, ?, ?, ?, ?, ?)");
            $addUser->execute([
                $fname,
                $mname,
                $lname,
                $colleges,
                $email,
                $hash
            ]);

            // Redirect based on college attribute
            if ($colleges == 'Head Admin') {
                header("Location: ADMIN/admin_login.php");
           // } elseif ($colleges == 'College of Business Management') {
            //    header("Location: CBM/login.php");
           // } else {
           //     header("Location: Admin/dashboard.php");
            }
            exit();
        }
    } else {
        $msg = "Passwords do not match!";
        header("Location: admin_register.php?msg=" . urlencode($msg));
        exit();
    }
}


// Login
if (isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->prepare('SELECT * FROM admin WHERE a_email = ?');
    $check->execute([$email]);

    $data = $check->fetch();

    if ($data && password_verify($password, $data['a_pass'])) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['a_id'] = $data['a_id'];

        header("Location:admin_dashboard.php");
        exit();
    } else {
        $alrt = 'Email or Password do not match!';
        header("Location: admin_login.php?alrt=$alrt");
        exit;
    }
}


// logout.php
if (isset($_GET['logout'])) {
    session_start();
    // Clear all session variables
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destroy the session.
    session_destroy();

    // Redirect to login page
    header("Location:login.php");
    exit();
}