<?php include 'includes/header.php'; ?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Projects</h1>
    <a href="project_form.php" class="bg-black hover:bg-gray-800 text-[#D4AF37] font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        <i class="fas fa-plus mr-2"></i> Add New Project
    </a>
</div>

<?php if (isset($_SESSION['success'])): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-0">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm uppercase leading-normal">
                    <th class="py-3 px-6">Image</th>
                    <th class="py-3 px-6">Title</th>
                    <th class="py-3 px-6">Category</th>
                    <th class="py-3 px-6">Client</th>
                    <th class="py-3 px-6">Date</th>
                    <th class="py-3 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php
                // Pagination Logic
                $limit = 10;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;

                $total_results = mysqli_query($conn, "SELECT COUNT(*) AS count FROM projects");
                $total_rows = mysqli_fetch_assoc($total_results)['count'];
                $total_pages = ceil($total_rows / $limit);

                $query = "SELECT p.*, c.name as category_name FROM projects p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created_at DESC LIMIT $start, $limit";
                $projects = mysqli_query($conn, $query);

                if (mysqli_num_rows($projects) > 0) {
                    while ($row = mysqli_fetch_assoc($projects)) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 text-left'><img src='../assets/uploads/" . $row['image'] . "' class='w-12 h-12 rounded object-cover'></td>";
                        echo "<td class='py-3 px-6 text-left font-medium'>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['category_name']) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['client']) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . date('M d, Y', strtotime($row['completion_date'])) . "</td>";
                        echo "<td class='py-3 px-6 text-right'>
                                <a href='project_form.php?edit=" . $row['id'] . "' class='text-blue-500 hover:text-blue-700 mr-2'><i class='fas fa-edit'></i></a>
                                <a href='actions/project_action.php?delete=" . $row['id'] . "' class='text-red-500 hover:text-red-700' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='py-4 px-6 text-center'>No projects found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <?php if($total_pages > 1): ?>
    <div class="px-6 py-4 border-t border-gray-200">
        <div class="flex justify-center">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <?php for($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 <?php echo $i == $page ? 'bg-gray-100 text-black font-bold' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>
            </nav>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
