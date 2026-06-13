<?php include 'includes/header.php'; ?>

<?php
// Handle Edit Mode
$edit_mode = false;
$category_to_edit = null;
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $edit_query = "SELECT * FROM categories WHERE id = $edit_id";
    $edit_result = mysqli_query($conn, $edit_query);
    if ($category = mysqli_fetch_assoc($edit_result)) {
        $edit_mode = true;
        $category_to_edit = $category;
    }
}
?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Add/Edit Form -->
    <div class="md:col-span-1">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">
                <?php echo $edit_mode ? 'Edit Category' : 'Add New Category'; ?>
            </h3>
            <form action="actions/category_action.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $edit_mode ? $category_to_edit['id'] : ''; ?>">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                    <input type="text" name="name" value="<?php echo $edit_mode ? htmlspecialchars($category_to_edit['name']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-black hover:bg-gray-800 text-[#D4AF37] font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="<?php echo $edit_mode ? 'update' : 'add'; ?>">
                        <?php echo $edit_mode ? 'Update Category' : 'Add Category'; ?>
                    </button>
                    <?php if ($edit_mode): ?>
                        <a href="categories.php" class="text-gray-500 text-sm hover:underline">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories List -->
    <div class="md:col-span-2">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="font-bold text-gray-800">All Categories</h3>
            </div>
            
            <?php if (isset($_SESSION['success'])): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 m-4" role="alert">
                    <p><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['error'])): ?>
                 <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 m-4" role="alert">
                    <p><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
                </div>
            <?php endif; ?>

            <div class="p-0">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase leading-normal">
                            <th class="py-3 px-6">ID</th>
                            <th class="py-3 px-6">Name</th>
                            <th class="py-3 px-6">Slug</th>
                            <th class="py-3 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php
                        $categories = mysqli_query($conn, "SELECT * FROM categories ORDER BY id ASC");
                        if (mysqli_num_rows($categories) > 0) {
                            while ($row = mysqli_fetch_assoc($categories)) {
                                echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                                echo "<td class='py-3 px-6'>" . $row['id'] . "</td>";
                                echo "<td class='py-3 px-6 font-medium'>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td class='py-3 px-6'>" . htmlspecialchars($row['slug']) . "</td>";
                                echo "<td class='py-3 px-6 text-right'>
                                        <a href='categories.php?edit=" . $row['id'] . "' class='text-blue-500 hover:text-blue-700 mr-2'><i class='fas fa-edit'></i></a>
                                        <a href='actions/category_action.php?delete=" . $row['id'] . "' class='text-red-500 hover:text-red-700' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i></a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='py-4 px-6 text-center'>No categories found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
