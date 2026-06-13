<?php
require_once '../config/db.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $query = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        if (mysqli_query($conn, $query)) {
            header("Location: ../contact.php?success=1");
        } else {
            header("Location: ../contact.php?error=1");
        }
    } else {
        header("Location: ../contact.php?error=1");
    }
    exit;
} else {
    header("Location: ../contact.php");
    exit;
}
?>
