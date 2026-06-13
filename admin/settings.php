<?php include 'includes/header.php'; ?>

<?php
$query = "SELECT * FROM settings LIMIT 1";
$result = mysqli_query($conn, $query);
$settings = mysqli_fetch_assoc($result);
?>

<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Site Settings</h1>
    <p class="text-gray-600">Manage your website's general information and hero section.</p>
</div>

<?php if (isset($_SESSION['success'])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></span>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
    </div>
<?php endif; ?>

<form action="actions/settings_action.php" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
    
    <!-- General Settings -->
    <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">General Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Site Name</label>
            <input type="text" name="site_name" value="<?php echo htmlspecialchars($settings['site_name']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Footer Text / Slogan</label>
            <input type="text" name="footer_text" value="<?php echo htmlspecialchars($settings['footer_text']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="md:col-span-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">Slogan</label>
            <input type="text" name="slogan" value="<?php echo htmlspecialchars($settings['slogan'] ?? ''); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>

    <!-- SEO Settings -->
    <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">SEO Meta Data</h3>
    <div class="mb-6 space-y-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Meta Title</label>
            <input type="text" name="meta_title" value="<?php echo htmlspecialchars($settings['meta_title'] ?? ''); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Meta Description</label>
            <textarea name="meta_description" rows="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo htmlspecialchars($settings['meta_description'] ?? ''); ?></textarea>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Meta Keywords (Comma separated)</label>
            <input type="text" name="meta_keywords" value="<?php echo htmlspecialchars($settings['meta_keywords'] ?? ''); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>

    <!-- Images -->
     <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Images</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Site Logo</label>
            <?php if ($settings['site_logo']): ?>
                <img src="../assets/uploads/<?php echo $settings['site_logo']; ?>" class="h-16 mb-2 object-contain bg-gray-100 p-1">
            <?php endif; ?>
            <input type="file" name="site_logo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Favicon</label>
             <?php if ($settings['site_favicon']): ?>
                <img src="../assets/uploads/<?php echo $settings['site_favicon']; ?>" class="h-8 mb-2 object-contain">
            <?php endif; ?>
            <input type="file" name="site_favicon" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
        </div>
         <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Hero Image</label>
             <?php if ($settings['hero_image']): ?>
                <img src="../assets/uploads/<?php echo $settings['hero_image']; ?>" class="h-16 mb-2 object-cover">
            <?php endif; ?>
            <input type="file" name="hero_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
        </div>
    </div>

    <!-- Hero Section -->
    <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Hero Section</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Hero Title</label>
            <input type="text" name="hero_title" value="<?php echo htmlspecialchars($settings['hero_title']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Hero Subtitle</label>
            <input type="text" name="hero_subtitle" value="<?php echo htmlspecialchars($settings['hero_subtitle']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="md:col-span-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">About Text</label>
            <textarea name="about_text" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo htmlspecialchars($settings['about_text']); ?></textarea>
        </div>
    </div>

    <!-- Contact Info -->
    <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Contact Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="contact_email" value="<?php echo htmlspecialchars($settings['contact_email']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
            <input type="text" name="contact_phone" value="<?php echo htmlspecialchars($settings['contact_phone']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
         <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">WhatsApp Number</label>
            <input type="text" name="whatsapp_number" value="<?php echo htmlspecialchars($settings['whatsapp_number']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Address</label>
            <input type="text" name="contact_address" value="<?php echo htmlspecialchars($settings['contact_address']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>

    <!-- Social Links -->
    <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Social Links</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Facebook</label>
            <input type="text" name="facebook_link" value="<?php echo htmlspecialchars($settings['facebook_link']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Twitter</label>
            <input type="text" name="twitter_link" value="<?php echo htmlspecialchars($settings['twitter_link']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">LinkedIn</label>
            <input type="text" name="linkedin_link" value="<?php echo htmlspecialchars($settings['linkedin_link']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Instagram</label>
            <input type="text" name="instagram_link" value="<?php echo htmlspecialchars($settings['instagram_link']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">GitHub</label>
            <input type="text" name="github_link" value="<?php echo htmlspecialchars($settings['github_link']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>

    <div class="flex items-center justify-end">
        <button class="bg-black hover:bg-gray-800 text-[#D4AF37] font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="submit">
            Save Changes
        </button>
    </div>
</form>

<?php include 'includes/footer.php'; ?>
