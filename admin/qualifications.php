<?php include 'includes/header.php'; ?>

<?php
// Handle Edit Mode
$edit_mode = false;
$qual_to_edit = null;
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $edit_query = "SELECT * FROM qualifications WHERE id = $edit_id";
    $edit_result = mysqli_query($conn, $edit_query);
    if ($qual = mysqli_fetch_assoc($edit_result)) {
        $edit_mode = true;
        $qual_to_edit = $qual;
    }
}
?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Add/Edit Form -->
    <div class="md:col-span-1">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">
                <?php echo $edit_mode ? 'Edit Qualification' : 'Add New Qualification'; ?>
            </h3>
            <form action="actions/qualification_action.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $edit_mode ? $qual_to_edit['id'] : ''; ?>">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Title / Degree</label>
                    <input type="text" name="title" value="<?php echo $edit_mode ? htmlspecialchars($qual_to_edit['title']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                 <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Institute / Company</label>
                    <input type="text" name="institute" value="<?php echo $edit_mode ? htmlspecialchars($qual_to_edit['institute']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                 <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Year / Duration</label>
                    <input type="text" name="year" value="<?php echo $edit_mode ? htmlspecialchars($qual_to_edit['year']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g. 2021-2025" required>
                </div>
                 <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                    <select name="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="education" <?php echo ($edit_mode && $qual_to_edit['type'] == 'education') ? 'selected' : ''; ?>>Education</option>
                        <option value="experience" <?php echo ($edit_mode && $qual_to_edit['type'] == 'experience') ? 'selected' : ''; ?>>Experience</option>
                    </select>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-black hover:bg-gray-800 text-[#D4AF37] font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="<?php echo $edit_mode ? 'update' : 'add'; ?>">
                        <?php echo $edit_mode ? 'Update' : 'Add'; ?>
                    </button>
                    <?php if ($edit_mode): ?>
                        <a href="qualifications.php" class="text-gray-500 text-sm hover:underline">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- List -->
    <div class="md:col-span-2">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="font-bold text-gray-800">Qualifications & Experience</h3>
                <a href="skills.php" class="text-sm text-blue-500 hover:underline">Manage Skills &rarr;</a>
            </div>
            
            <?php if (isset($_SESSION['success'])): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 m-4" role="alert">
                    <p><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
                </div>
            <?php endif; ?>

            <div class="p-0">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase leading-normal">
                            <th class="py-3 px-6">Title</th>
                            <th class="py-3 px-6">Institute</th>
                            <th class="py-3 px-6">Year</th>
                            <th class="py-3 px-6">Type</th>
                            <th class="py-3 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php
                        $quals = mysqli_query($conn, "SELECT * FROM qualifications ORDER BY year DESC");
                        if (mysqli_num_rows($quals) > 0) {
                            while ($row = mysqli_fetch_assoc($quals)) {
                                echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                                echo "<td class='py-3 px-6 font-medium'>" . htmlspecialchars($row['title']) . "</td>";
                                echo "<td class='py-3 px-6'>" . htmlspecialchars($row['institute']) . "</td>";
                                echo "<td class='py-3 px-6'>" . htmlspecialchars($row['year']) . "</td>";
                                echo "<td class='py-3 px-6'><span class='bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs'>" . ucfirst($row['type']) . "</span></td>";
                                echo "<td class='py-3 px-6 text-right'>
                                        <a href='qualifications.php?edit=" . $row['id'] . "' class='text-blue-500 hover:text-blue-700 mr-2'><i class='fas fa-edit'></i></a>
                                        <a href='actions/qualification_action.php?delete=" . $row['id'] . "' class='text-red-500 hover:text-red-700' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i></a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='py-4 px-6 text-center'>No qualifications found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
