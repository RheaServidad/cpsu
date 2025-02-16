<?php


include '../conn.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    ob_end_flush();
    header("Location: ADMIN/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .bg-purple {
        background-color: #800080;
    }

    .bg-dark-pink {
        background-color: #C71585;
    }
</style>

<body class="bg-light">
    <div class="d-flex vh-100 vw-100 overflow-hidden">
        <?php
        include 'sidebar.php';
        ?>

        <div class="flex-grow-1 overflow-auto">

            <?php
          //  include 'header.php';
            ?>
            <div class="p-5">
                <a href="gallery.php" class="text-decoration-none text-white">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        <div class="col">
                            <?php
                            $userID = $_SESSION['u_id'];
                            // Prepare the SQL statement to count the number of personnel
                            $countcertificates = $conn->prepare("SELECT COUNT(*) AS certificates_count FROM certificates WHERE user_id = ?");
                            $countcertificates->execute([$userID]);

                            // Fetch the count from the result
                            $certificatesCount = $countcertificates->fetch(PDO::FETCH_ASSOC)['certificates_count'];
                            ?>
                            <div class="text-2xl"><?php echo $certificatesCount; ?></div>
                            <div class="bg-purple text-white p-4 rounded">
                                <div> Certificates </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>