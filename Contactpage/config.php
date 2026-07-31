<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
</head>
<body>
  <?php
// ============================================
// Database connection settings
// Edit these to match your XAMPP / hosting setup
// ============================================

$DB_HOST = "localhost";
$DB_USER = "root";       // default XAMPP user
$DB_PASS = "";           // default XAMPP password (blank)
$DB_NAME = "gpauta_db";

// Create connection using MySQLi
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Check connection
if ($conn->connect_error) {
    // Stop execution and return a JSON error instead of a raw PHP error
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed."
    ]);
    exit();
}

// Force UTF-8 so names/messages with accents etc. store correctly
$conn->set_charset("utf8mb4");
?>  
</body>
</html>