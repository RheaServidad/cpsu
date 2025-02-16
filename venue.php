<?php
include '../conn.php';
session_start();

// Check if the user is not logged in

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competency</title>
    <link rel="icon" class="rounded-circle" href="assets/images/logo.png" type="image/png">

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/datatables.min.css">

    <!-- Custom CSS -->
    <style>
    /* Apply linear gradient background to table header */
    table th {
        background: linear-gradient(135deg, #6f42c1, #b084f4);
        color: white;
    }

    .custom-manage-button {
        background: linear-gradient(135deg, #6f42c1, #b084f4);
        color: white;
    }

    /* Style the table rows */
    table tbody tr {
        transition: background-color 0.3s ease;
    }

    /* Add hover effect on table rows */
    table tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .dropdown-menu {
        border-radius: 10px;
    }

    /* Adjust the size of the certificate preview */
    table td img,
    table td iframe {
        max-width: 400px;
        max-height: 250px;
    }

    /* Add padding to the table */
    table {
        padding: 10px;
    }

    /* Style the "No" column to be more prominent */
    table td:first-child {
        font-weight: bold;
        background-color: #f8f9fa;
    }

    /* Add margin to the action buttons */
    .dropdown-item {
        margin: 5px 0;
    }

    /* Add space and make it mobile-friendly */
    .table-wrapper {
        margin: 10px;
        overflow-x: auto;
    }
    </style>

</head>

<body>
    <div class='d-flex vh-100 vw-100 overflow-hidden'>
        <?php include 'sidebar.php'; ?>

        <div class='flex-grow-1 overflow-auto'>
            <?php include 'header.php'; ?>
            <div class="table-wrapper">
                <h4 class="text-center mb-3 heading-text">
                    COMPETENCY DEVELOPMENT ASSESSMENT FORM
                </h4>
                <h5 class="text-center mb-4 text-muted">As of School Year 2023-2024</h5>

                <?php
                // Fetch users
                $query = "SELECT u.*, COUNT(p.id) AS count 
                FROM users u
                LEFT JOIN personnel p ON u.u_id = p.user_id 
                GROUP BY u.u_id
                ORDER BY u_lname ASC";
                $select = $conn->prepare($query);
                $select->execute();

                ?>

                <table id="MyTable" class="shadow-sm table table-striped table-bordered w-100 text-center">
                    <thead class="table-info">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Count of Certificates</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cnt = 1;
                        foreach ($select as $data) {
                            ?>
                        <tr>
                            <td><?= $cnt++ ?></td>
                            <td><?= $data['u_lname'] ?>, <?= $data['u_fname'] ?> <?= substr($data['u_mname'], 0, 1) ?>.

                            </td>
                            <td><?= $data['count'] ?></td>
                            <td><?= $data['u_status'] ?></td>
                            <td>
                                <a href="ccs-all.php?id=<?= $data['u_id'] ?>">
                                    <i class="fa-solid fa-eye text-success"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>

                <a class="btn btn-primary text-center" href='index.php'>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>

</body>

</html>