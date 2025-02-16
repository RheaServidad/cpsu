<?php
require __DIR__ . '/vendor/autoload.php';

require '../conn.php'; // Include database connection

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

$id = isset($_GET['id']) ? $_GET['id'] : '';

try {
    // Verify if the Excel template exists
    $filePath = __DIR__ . "/Competency-DevelopmentAssessment.xlsx";
    if (!file_exists($filePath)) {
        die("Error: The Excel template file 'Competency-DevelopmentAssessment.xlsx' is missing.");
    }

    // Load Excel template
    $reader = new XlsxReader(); // Use correct class for reading
    $spreadsheet = $reader->load($filePath);
    $sheet = $spreadsheet->getActiveSheet();

    // Fetch data from the database
    $query = $conn->prepare("SELECT * FROM personnel WHERE user_id = ?");
    $query->execute([$id]);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    $row = 6; // Start inserting data from this row
    $count = 1;

    foreach ($results as $data) {
        $sheet->setCellValue("A$row", $count++);
        $sheet->setCellValue("B$row", $data['competency']);
        $sheet->setCellValue("C$row", $data['internal'] == 'Internal' ? '✓' : '');
        $sheet->setCellValue("D$row", $data['external'] == 'External' ? '✓' : '');
        $sheet->setCellValue("E$row", $data['intervention']);
        $sheet->setCellValue("F$row", $data['from']);
        $sheet->setCellValue("G$row", $data['to']);
        $sheet->setCellValue("H$row", $data['hours']);
        $sheet->setCellValue("I$row", $data['venue']);
        $sheet->setCellValue("J$row", $data['place']);
        $sheet->setCellValue("K$row", $data['sponsored']);
        $sheet->setCellValue("L$row", $data['effectiveness']);
        $row++;
    }

    // Set headers for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Competency-Development.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new XlsxWriter($spreadsheet); // Use correct writer class
    $writer->save('php://output');
} catch (Exception $e) {
    echo "Error exporting data: " . $e->getMessage();
}
?>
