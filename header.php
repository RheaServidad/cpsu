<?php
include '../conn.php';

// Ensure $conn is initialized
if (!isset($conn)) {
    die("Database connection is not established.");
}

$cnt = 1;
$select = $conn->prepare("SELECT * FROM users WHERE u_id = ?");
?>

<header class="d-flex justify-content-between align-items-center p-4 bg-white shadow-sm" style="height:70px;">
    <div class="text-lg font-semibold">
        <a class="mobile_btn text-success" id="mobile_btn"><strong><i class="fa-solid fa-bars"></i></strong></a>
    </div>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="assets/images/undraw_profile.svg" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Admin</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-light text-small shadow">
            <li>
                <a class="dropdown-item" href="profile.php">
                    <i class="fas fa-user me-2"></i> Profile
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="Settings.php">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="../alllogin.php">
                    <i class="fas fa-sign-out-alt me-2"></i> Sign out
                </a>
            </li>
        </ul>
    </div>
</header>
