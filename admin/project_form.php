<?php include 'includes/header.php'; ?>

<?php
$edit_mode = false;
$project = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $result = mysqli_query($conn, "SELECT * FROM projects WHERE id = $id");
    if ($project = mysqli_fetch_assoc($result)) {
        $edit_mode = true;
    }
}
?>

<div class="mb-6 flex items-center justify-between">
    <h1 class="text-3xl font-bold text-gray-800"><?php echo $edit_mode ? 'Edit Project' : 'Add New Project'; ?></h1>
    <a href="projects.php" class="text-gray-600 hover:text-gray-900"><i class="fas fa-arrow-left mr-2"></i> Back to List</a>
</div>

<?php if (isset($_SESSION['error'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></span>
    </div>
<?php endif; ?>

<form action="actions/project_action.php" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
    <input type="hidden" name="id" value="<?php echo $edit_mode ? $project['id'] : ''; ?>">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="md:col-span-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">Project Title</label>
            <input type="text" name="title" value="<?php echo $edit_mode ? htmlspecialchars($project['title']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        
        <!-- Category Dropdown -->
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Category</label>
            <div class="relative">
                <select name="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Select Category</option>
                    <?php
                    $categories = mysqli_query($conn, "SELECT * FROM categories ORDER BY name ASC");
                    while ($cat = mysqli_fetch_assoc($categories)) {
                        $selected = ($edit_mode && $project['category_id'] == $cat['id']) ? 'selected' : '';
                        echo "<option value='" . $cat['id'] . "' $selected>" . htmlspecialchars($cat['name']) . "</option>";
                    }
                    ?>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Client Name</label>
            <input type="text" name="client" value="<?php echo $edit_mode ? htmlspecialchars($project['client']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
         <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Completion Date</label>
            <input type="date" name="completion_date" value="<?php echo $edit_mode ? $project['completion_date'] : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Project Link</label>
            <input type="url" name="link" value="<?php echo $edit_mode ? htmlspecialchars($project['link']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="https://...">
        </div>

        <div class="md:col-span-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo $edit_mode ? htmlspecialchars($project['description']) : ''; ?></textarea>
        </div>

        <div class="md:col-span-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">Project Image</label>
            <?php if ($edit_mode && $project['image']): ?>
                <img src="../assets/uploads/<?php echo $project['image']; ?>" class="h-32 mb-2 object-cover rounded">
            <?php endif; ?>
            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100" <?php echo $edit_mode ? '' : 'required'; ?>>
        </div>
    </div>

    <div class="flex items-center justify-end">
        <button class="bg-black hover:bg-gray-800 text-[#D4AF37] font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="submit" name="<?php echo $edit_mode ? 'update' : 'add'; ?>">
            <?php echo $edit_mode ? 'Update Project' : 'Add Project'; ?>
        </button>
    </div>
</form>

<?php include 'includes/footer.php'; ?>
