<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// ADD 
if (isset($_POST['add'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $institute = mysqli_real_escape_string($conn, $_POST['institute']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    if (!empty($title)) {
        $query = "INSERT INTO qualifications (title, institute, year, type) VALUES ('$title', '$institute', '$year', '$type')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Qualification added successfully!";
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Title is required.";
    }
    header("Location: ../qualifications.php");
    exit;
}

// UPDATE 
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $institute = mysqli_real_escape_string($conn, $_POST['institute']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    if (!empty($title)) {
        $query = "UPDATE qualifications SET title='$title', institute='$institute', year='$year', type='$type' WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Qualification updated successfully!";
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Title is required.";
    }
    header("Location: ../qualifications.php");
    exit;
}

// DELETE 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $query = "DELETE FROM qualifications WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Qualification deleted successfully!";
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
    }
    header("Location: ../qualifications.php");
    exit;
}
?>
