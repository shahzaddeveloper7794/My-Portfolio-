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

// Handle File Upload
function handleImageUpload($input_name) {
    if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $filename = $_FILES[$input_name]['name'];
        $filetype = $_FILES[$input_name]['type'];
        $filesize = $_FILES[$input_name]['size'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
             return ['error' => 'Invalid file type.'];
        }
        
        // 5MB Limit
        if ($filesize > 5 * 1024 * 1024) {
             return ['error' => 'File size too large.'];
        }

        $new_filename = time() . '_' . $filename;
        $target_dir = '../../assets/uploads/';
        
        // Auto-create directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $destination = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES[$input_name]['tmp_name'], $destination)) {
            return ['success' => $new_filename];
        } else {
             return ['error' => 'Failed to move uploaded file.'];
        }
    }
    return null;
}

// Main Handling Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    
    // Determine if it's an update or add based on ID presence
    if ($id > 0) {
        // UPDATE PROJECT
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $category_id = intval($_POST['category_id']);
        $client = mysqli_real_escape_string($conn, $_POST['client']);
        $completion_date = mysqli_real_escape_string($conn, $_POST['completion_date']);
        $link = mysqli_real_escape_string($conn, $_POST['link']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $slug = create_slug($title);

        // Image Upload
        $image_query_part = "";
        $upload = handleImageUpload('image');
        if (isset($upload['error'])) {
            $_SESSION['error'] = $upload['error'];
            header("Location: ../project_form.php?edit=$id");
            exit;
        }
        if (isset($upload['success'])) {
            $image = $upload['success'];
             // Retrieve old image and delete it if needed
            $old_img_result = mysqli_query($conn, "SELECT image FROM projects WHERE id=$id");
            $project_data = mysqli_fetch_assoc($old_img_result);
            if($project_data && $project_data['image'] && file_exists('../../assets/uploads/'.$project_data['image'])) {
                unlink('../../assets/uploads/'.$project_data['image']);
            }
            $image_query_part = ", image='$image'";
        }

        $query = "UPDATE projects SET 
                  title='$title', 
                  slug='$slug', 
                  category_id=$category_id, 
                  client='$client', 
                  completion_date='$completion_date', 
                  link='$link', 
                  description='$description'
                  $image_query_part 
                  WHERE id=$id";

        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Project updated successfully!";
            header("Location: ../projects.php");
        } else {
            $_SESSION['error'] = "Error updating project: " . mysqli_error($conn);
            header("Location: ../project_form.php?edit=$id");
        }
        exit;

    } else {
        // ADD NEW PROJECT
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $category_id = intval($_POST['category_id']);
        $client = mysqli_real_escape_string($conn, $_POST['client']);
        $completion_date = mysqli_real_escape_string($conn, $_POST['completion_date']);
        $link = mysqli_real_escape_string($conn, $_POST['link']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $slug = create_slug($title);

        // Image Upload
        $upload = handleImageUpload('image');
        if (isset($upload['error'])) {
            $_SESSION['error'] = $upload['error'];
            header("Location: ../project_form.php");
            exit;
        }
        $image = isset($upload['success']) ? $upload['success'] : '';

        $query = "INSERT INTO projects (category_id, title, slug, description, image, client, completion_date, link) 
                  VALUES ($category_id, '$title', '$slug', '$description', '$image', '$client', '$completion_date', '$link')";

        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "Project added successfully!";
            header("Location: ../projects.php");
        } else {
            $_SESSION['error'] = "Error adding project: " . mysqli_error($conn);
            header("Location: ../project_form.php");
        }
        exit;
    }
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    
    // Retrieve image to delete file
    $result = mysqli_query($conn, "SELECT image FROM projects WHERE id=$id");
    if($row = mysqli_fetch_assoc($result)){
        if($row['image'] && file_exists('../../assets/uploads/'.$row['image'])){
            unlink('../../assets/uploads/'.$row['image']);
        }
    }

    $query = "DELETE FROM projects WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Project deleted successfully!";
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
    }
    header("Location: ../projects.php");
    exit;
}
?>
