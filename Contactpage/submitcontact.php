
    <?php

header('Content-Type: application/json');
require_once "config.php";

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit();
}

// 1. Collect and sanitize input
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// 2. Server-side validation (never trust client-side JS alone)
$errors = [];

if ($name === '' || strlen($name) > 100) {
    $errors[] = "Please enter a valid name.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}
if ($subject === '' || strlen($subject) > 200) {
    $errors[] = "Please enter a subject.";
}
if ($message === '') {
    $errors[] = "Message cannot be empty.";
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => implode(" ", $errors)]);
    exit();
}

// 3. Insert into database using a prepared statement (prevents SQL injection)
$stmt = $conn->prepare(
    "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)"
);
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Your message has been sent successfully!"
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Something went wrong. Please try again later."
    ]);
}

$stmt->close();
$conn->close();
?>