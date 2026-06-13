<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// ADD Skill
if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $percentage = intval($_POST['percentage']);

    if (!empty($name)) {
        $query = "INSERT INTO skills (name, percentage) VALUES ('$name', $percentage)";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Skill added successfully!";
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Skill name is required.";
    }
    header("Location: ../skills.php");
    exit;
}

// UPDATE Skill
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $percentage = intval($_POST['percentage']);

    if (!empty($name)) {
        $query = "UPDATE skills SET name='$name', percentage=$percentage WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Skill updated successfully!";
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Skill name is required.";
    }
    header("Location: ../skills.php");
    exit;
}

// DELETE Skill
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $query = "DELETE FROM skills WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Skill deleted successfully!";
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
    }
    header("Location: ../skills.php");
    exit;
}
?>
