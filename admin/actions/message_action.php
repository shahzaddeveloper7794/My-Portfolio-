<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// DELETE Message
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $query = "DELETE FROM messages WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Message deleted successfully!";
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
    }
    header("Location: ../messages.php");
    exit;
}
?>
