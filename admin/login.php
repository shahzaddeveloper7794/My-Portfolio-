<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Shahzad Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gold-text { color: #D4AF37; }
        .gold-border { border-color: #D4AF37; }
        .gold-bg { background-color: #D4AF37; }
        .gold-bg-hover:hover { background-color: #B5952F; }
    </style>
</head>
<body class="bg-black text-white h-screen flex items-center justify-center">

    <div class="w-full max-w-sm p-8 bg-gray-900 rounded-lg shadow-lg border border-gray-800">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold gold-text">Admin Panel</h1>
            <p class="text-gray-400 mt-2">Login to manage your portfolio</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-900/50 text-red-200 p-3 rounded mb-4 text-sm border border-red-800">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="actions/login_action.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="username">Username</label>
                <input class="w-full bg-black border border-gray-700 rounded py-2 px-3 text-white focus:outline-none focus:border-[#D4AF37]" id="username" name="username" type="text" placeholder="Enter username" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="password">Password</label>
                <input class="w-full bg-black border border-gray-700 rounded py-2 px-3 text-white focus:outline-none focus:border-[#D4AF37]" id="password" name="password" type="password" placeholder="Enter password" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="w-full gold-bg text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline gold-bg-hover transition duration-300" type="submit">
                    Sign In
                </button>
            </div>
        </form>
        <div class="text-center mt-6">
            <p class="text-gray-500 text-sm">Confidentially Developed By Shahzad</p>
        </div>
    </div>

</body>
</html>
