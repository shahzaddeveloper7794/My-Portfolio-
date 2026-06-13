<?php
require_once dirname(__DIR__) . '/config/db.php';
$settings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM settings LIMIT 1"));
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYS://<?php echo htmlspecialchars($settings['meta_title'] ?: $settings['site_name']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($settings['meta_description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($settings['meta_keywords']); ?>">
    
    <!-- Favicon -->
    <?php if($settings['site_favicon']): ?>
    <link rel="icon" type="image/png" href="assets/uploads/<?php echo $settings['site_favicon']; ?>">
    <?php endif; ?>

    <!-- Clean Professional Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#1e293b', // Navy / Slate 800
                        accent: '#2563eb',  // Royal Blue
                        secondary: '#64748b', // Slate 500
                        bglight: '#f8fafc',  // Slate 50
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['DM Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-bglight text-primary font-sans antialiased selection:bg-accent/10 selection:text-accent">
    
    <!-- Professional Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-200 transition-all duration-300" id="navbar">
        <div class="container mx-auto px-6 h-12 flex items-center justify-between">
            <a href="index.php" class="flex items-center gap-3 group">
                <div class="logo-circle">
                    S<span>.</span>
                </div>
                <span class="text-xl font-bold text-primary tracking-tight font-heading group-hover:text-accent transition-colors">Shahzad</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-10 text-sm font-medium text-secondary">
                <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'text-accent' : 'hover:text-accent'; ?> transition-colors">Home</a>
                <a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'text-accent' : 'hover:text-accent'; ?> transition-colors">About</a>
                <a href="projects.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'projects.php' ? 'text-accent' : 'hover:text-accent'; ?> transition-colors">Portfolio</a>
                <a href="contact.php" class="px-6 py-2.5 bg-accent text-white rounded-lg hover:bg-accent/90 transition-all shadow-lg shadow-accent/20">Contact Me</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-primary" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 p-6 space-y-4 shadow-xl">
            <a href="index.php" class="block text-secondary hover:text-accent font-medium">Home</a>
            <a href="about.php" class="block text-secondary hover:text-accent font-medium">About</a>
            <a href="projects.php" class="block text-secondary hover:text-accent font-medium">Portfolio</a>
            <a href="contact.php" class="block text-accent font-bold">Contact Me</a>
        </div>
    </nav>

    <main class="pt-12">
