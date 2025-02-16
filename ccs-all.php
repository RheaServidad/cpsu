<?php
include '../conn.php';
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    ob_end_flush();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competency</title>
    <link rel="icon" class="rounded-circle" href="assets/images/logo.png" type="image/png">

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/datatables.min.css">

    <!-- Custom CSS for smaller font sizes -->
    <style>
    body {
        font-size: 14px;
    }

    .small-heading {
        font-size: 18px;
        color: black;
    }

    table {
        font-size: 12px;

    }

    table th {
        background: white;
        color: black;
    }

    .custom-manage-button {
        background: white;
        color: black;
        /* Ensure the text color is white for better visibility */
    }

    .btn {
        font-size: 13px;

    }
    </style>
</head>

<body class='bg-light'>
    <div class='d-flex vh-100 vw-100 overflow-hidden'>
        <?php include 'sidebar.php'; ?>

        <div class='flex-grow-1 overflow-auto'>
            <?php include 'header.php'; ?>

            <div class="row mt-2 justify-content-center">
                <div class="col me-2 ms-2">

                    <div class="row justify-content-center">
                        <?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
?>
                        <div class="col-12">
                            <h4 class="my-3 text-center small-heading">
                                <strong>COMPETENCY DEVELOPMENT ASSESSMENT FORM</strong>
                            </h4>
                            <div class="text-center">
                                <h5>As of School Year 2023-2024</h5>
                            </div>
                            <div class="text-center mb-3">
                                <a href="export_excel.php?id=<?= urlencode($id) ?>" class="btn btn-success">Export to
                                    Excel</a>
                            </div>

                            <table id="MyTable" class="shadow-sm table table-striped table-bordered w-100 text-center">
                                <thead class="table-info">
                                    <tr>
                                        <th rowspan="2">No.</th>
                                        <th rowspan="2">Competency Need Addressed</th>
                                        <th colspan="2">Nature of Intervention</th>
                                        <th rowspan="2">Intervention to be Provided</th>
                                        <th colspan="2">Inclusive Dates of Attendance (mm/dd/yyyy)</th>
                                        <th rowspan="2">Number of Hours</th>
                                        <th colspan="2">Venue</th>
                                        <th rowspan="2">Conducted/Sponsored By (Full Name)</th>
                                        <th rowspan="2">Effectiveness (Scale 1-5)</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Internal (by CPSU)</th>
                                        <th>External (by Outsider)</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Local/Regional/National</th>
                                        <th>Place</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
            // Prepare and execute the query to fetch data
            $selectData = $conn->prepare("SELECT * FROM personnel WHERE user_id = ?");
            $selectData->execute([$id]);

            $cnt = 1; // Initialize counter
            foreach ($selectData as $data) {
            ?>
                                    <tr>
                                        <td class="text-center"><?= $cnt++ ?></td>
                                        <td><?= htmlspecialchars($data['competency']) ?></td>
                                        <td>
                                            <input type="checkbox"
                                                <?= ($data['internal'] == 'Internal') ? 'checked' : '' ?> disabled>
                                        </td>
                                        <td>
                                            <input type="checkbox"
                                                <?= ($data['external'] == 'External') ? 'checked' : '' ?> disabled>
                                        </td>
                                        <td><?= htmlspecialchars($data['intervention']) ?></td>
                                        <td><?= htmlspecialchars($data['from']) ?></td>
                                        <td><?= htmlspecialchars($data['to']) ?></td>
                                        <td><?= htmlspecialchars($data['hours']) ?></td>
                                        <td><?= htmlspecialchars($data['venue']) ?></td>
                                        <td><?= htmlspecialchars($data['place']) ?></td>
                                        <td><?= htmlspecialchars($data['sponsored']) ?></td>
                                        <td><?= htmlspecialchars($data['effectiveness']) ?></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-success custom-manage-button dropdown-toggle"
                                                    type="button" id="dropdownMenuButton<?= $data['id'] ?>"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Manage
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton<?= $data['id'] ?>">
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#viewModal<?= $data['id'] ?>">
                                                            <i class="fa-solid fa-eye text-success"></i> View
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#editModal<?= $data['id'] ?>">
                                                            <i class="fa-regular fa-pen-to-square text-warning"></i>
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal<?= $data['id'] ?>">
                                                            <i class="fa-regular fa-trash-can text-danger"></i> Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
            }
            ?>
                                </tbody>
                            </table>

                            <div class="text-center mt-3">
                                <a class="btn btn-primary" href="index.php">
                                    <i class="fa-solid fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#MyTable').DataTable({
            "searching": true,
            "paging": true,
            "info": true,
            "ordering": true,
            "lengthChange": true
        });
    });
    </script>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
</body>

</html>