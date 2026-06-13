<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// Function to create slug
function create_slug($string){
    $slug = trim($string);
    $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug); 
    $slug = str_replace(' ', '-', $slug);
    $slug = strtolower($slug);
    return $slug;
}

// ADD Category
if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = create_slug($name);

    if (!empty($name)) {
        $query = "INSERT INTO categories (name, slug) VALUES ('$name', '$slug')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Category added successfully!";
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Category name is required.";
    }
    header("Location: ../categories.php");
    exit;
}

// UPDATE Category
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = create_slug($name);

    if (!empty($name)) {
        $query = "UPDATE categories SET name='$name', slug='$slug' WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Category updated successfully!";
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Category name is required.";
    }
    header("Location: ../categories.php");
    exit;
}

// DELETE Category
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Optional: Check if projects exist in this category before deleting. 
    // For now we will just delete it, projects might become orphaned or we should have a restraint.
    // Ideally we'd suggest moving projects or prevent deletion.
    
    $query = "DELETE FROM categories WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Category deleted successfully!";
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
    }
    header("Location: ../categories.php");
    exit;
}
?>
