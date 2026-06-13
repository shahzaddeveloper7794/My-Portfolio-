<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once dirname(__DIR__, 2) . '/config/db.php';

// Fetch site name for header
$settings_query = "SELECT site_name FROM settings LIMIT 1";
$settings_result = mysqli_query($conn, $settings_query);
$site_settings = mysqli_fetch_assoc($settings_result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?php echo htmlspecialchars($site_settings['site_name'] ?? 'Portfolio'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gold-text { color: #D4AF37; }
        .gold-border { border-color: #D4AF37; }
        .gold-bg { background-color: #D4AF37; }
        .gold-bg-hover:hover { background-color: #B5952F; }
        .sidebar-link:hover { color: #D4AF37; border-left: 4px solid #D4AF37; background-color: #1f2937; }
        .sidebar-link.active { color: #D4AF37; border-left: 4px solid #D4AF37; background-color: #1f2937; }
    </style>
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-black text-gray-400 flex flex-col shadow-xl">
        <div class="h-16 flex items-center justify-center border-b border-gray-800">
            <h1 class="text-xl font-bold gold-text">ADMIN PANEL</h1>
        </div>
        <nav class="flex-1 overflow-y-auto py-4">
            <ul>
                <li>
                    <a href="index.php" class="sidebar-link flex items-center px-6 py-3 transition-all <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="settings.php" class="sidebar-link flex items-center px-6 py-3 transition-all <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>">
                        <i class="fas fa-cogs mr-3"></i> Site Settings
                    </a>
                </li>
                <li>
                    <a href="projects.php" class="sidebar-link flex items-center px-6 py-3 transition-all <?php echo basename($_SERVER['PHP_SELF']) == 'projects.php' ? 'active' : ''; ?>">
                        <i class="fas fa-briefcase mr-3"></i> Projects
                    </a>
                </li>
                <li>
                    <a href="categories.php" class="sidebar-link flex items-center px-6 py-3 transition-all <?php echo basename($_SERVER['PHP_SELF']) == 'categories.php' ? 'active' : ''; ?>">
                        <i class="fas fa-tags mr-3"></i> Categories
                    </a>
                </li>
                 <li>
                    <a href="skills.php" class="sidebar-link flex items-center px-6 py-3 transition-all <?php echo basename($_SERVER['PHP_SELF']) == 'skills.php' ? 'active' : ''; ?>">
                        <i class="fas fa-code mr-3"></i> Skills & Qualif.
                    </a>
                </li>
                <li>
                    <a href="messages.php" class="sidebar-link flex items-center px-6 py-3 transition-all <?php echo basename($_SERVER['PHP_SELF']) == 'messages.php' ? 'active' : ''; ?>">
                        <i class="fas fa-envelope mr-3"></i> Messages
                    </a>
                </li>
            </ul>
        </nav>
        <div class="p-4 border-t border-gray-800">
            <a href="logout.php" class="flex items-center text-red-400 hover:text-red-300 transition-colors">
                <i class="fas fa-sign-out-alt mr-3"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col overflow-hidden bg-gray-50">
        <!-- Top Header can go here if needed -->
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-800 uppercase tracking-wider">
                <?php 
                    $page = basename($_SERVER['PHP_SELF'], '.php');
                    echo str_replace(['-', '_'], ' ', ucfirst($page));
                    if($page == 'index') echo 'Dashboard';
                ?>
            </h2>
            <div class="flex items-center space-x-4">
                 <a href="../index.php" target="_blank" class="text-sm text-gray-600 hover:text-gray-900 flex items-center">
                    <i class="fas fa-external-link-alt mr-2"></i> View Site
                 </a>
                <span class="text-sm font-medium text-gray-600">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto p-8">
