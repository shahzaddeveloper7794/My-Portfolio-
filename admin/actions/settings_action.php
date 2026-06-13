<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect text inputs
    $site_name = mysqli_real_escape_string($conn, $_POST['site_name']);
    $footer_text = mysqli_real_escape_string($conn, $_POST['footer_text']);
    $slogan = mysqli_real_escape_string($conn, $_POST['slogan']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_keywords = mysqli_real_escape_string($conn, $_POST['meta_keywords']);
    $hero_title = mysqli_real_escape_string($conn, $_POST['hero_title']);
    $hero_subtitle = mysqli_real_escape_string($conn, $_POST['hero_subtitle']);
    $about_text = mysqli_real_escape_string($conn, $_POST['about_text']);
    $contact_email = mysqli_real_escape_string($conn, $_POST['contact_email']);
    $contact_phone = mysqli_real_escape_string($conn, $_POST['contact_phone']);
    $whatsapp_number = mysqli_real_escape_string($conn, $_POST['whatsapp_number']);
    $contact_address = mysqli_real_escape_string($conn, $_POST['contact_address']);
    $facebook_link = mysqli_real_escape_string($conn, $_POST['facebook_link']);
    $twitter_link = mysqli_real_escape_string($conn, $_POST['twitter_link']);
    $linkedin_link = mysqli_real_escape_string($conn, $_POST['linkedin_link']);
    $instagram_link = mysqli_real_escape_string($conn, $_POST['instagram_link']);
    $github_link = mysqli_real_escape_string($conn, $_POST['github_link']);

    // Handle File Uploads
    $upload_dir = '../../assets/uploads/';
    
    // Function to handle upload
    function handleUpload($file_input_name, $current_file_name_in_db) {
        $target_dir = "../../assets/uploads/";
        if (isset($_FILES[$file_input_name]) && $_FILES[$file_input_name]['error'] == 0) {
            $file_name = time() . '_' . basename($_FILES[$file_input_name]['name']);
            
            // Auto-create directory if it doesn't exist
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . $file_name;
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            // Allow certain file formats
            if(in_array($file_type, ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp'])) {
                if (move_uploaded_file($_FILES[$file_input_name]['tmp_name'], $target_file)) {
                    return $file_name;
                }
            }
        }
        return $current_file_name_in_db; // Return old file name if no new file uploaded
    }

    // Get current settings to retrieve old file names
    $current_settings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM settings LIMIT 1"));

    $site_logo = handleUpload('site_logo', $current_settings['site_logo']);
    $site_favicon = handleUpload('site_favicon', $current_settings['site_favicon']);
    $hero_image = handleUpload('hero_image', $current_settings['hero_image']);

    // Update Query
    $query = "UPDATE settings SET 
              site_name = '$site_name',
              meta_title = '$meta_title',
              meta_description = '$meta_description',
              meta_keywords = '$meta_keywords',
              footer_text = '$footer_text',
              slogan = '$slogan',
              hero_title = '$hero_title',
              hero_subtitle = '$hero_subtitle',
              about_text = '$about_text',
              contact_email = '$contact_email',
              contact_phone = '$contact_phone',
              whatsapp_number = '$whatsapp_number',
              contact_address = '$contact_address',
              facebook_link = '$facebook_link',
              twitter_link = '$twitter_link',
              linkedin_link = '$linkedin_link',
              instagram_link = '$instagram_link',
              github_link = '$github_link',
              site_logo = '$site_logo',
              site_favicon = '$site_favicon',
              hero_image = '$hero_image'
              WHERE id = 1";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Settings updated successfully!";
    } else {
        $_SESSION['error'] = "Error updating settings: " . mysqli_error($conn);
    }
    
    header("Location: ../settings.php");
    exit;

} else {
    header("Location: ../settings.php");
    exit;
}
?>
