<?php include 'includes/header.php'; ?>

<?php
// Fetch Stats
$projects_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM projects"))['count'];
$messages_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM messages"))['count'];
$skills_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM skills"))['count'];
?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Stat Card 1 -->
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 gold-border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm uppercase font-semibold">Total Projects</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1"><?php echo $projects_count; ?></h3>
            </div>
            <div class="text-yellow-500 text-4xl opacity-50">
                <i class="fas fa-briefcase"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 gold-border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm uppercase font-semibold">Messages</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1"><?php echo $messages_count; ?></h3>
            </div>
            <div class="text-blue-500 text-4xl opacity-50">
                <i class="fas fa-envelope"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 gold-border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm uppercase font-semibold">Skills Listed</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1"><?php echo $skills_count; ?></h3>
            </div>
            <div class="text-green-500 text-4xl opacity-50">
                <i class="fas fa-code"></i>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="font-bold text-gray-800">Recent Projects</h3>
    </div>
    <div class="p-0">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm uppercase leading-normal">
                    <th class="py-3 px-6">Title</th>
                    <th class="py-3 px-6">Category</th>
                    <th class="py-3 px-6">Date</th>
                    <th class="py-3 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php
                $recent_projects = mysqli_query($conn, "SELECT p.*, c.name as category_name FROM projects p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created_at DESC LIMIT 5");
                if (mysqli_num_rows($recent_projects) > 0) {
                    while ($row = mysqli_fetch_assoc($recent_projects)) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 text-left whitespace-nowrap'><div class='flex items-center'><span class='font-medium'>" . htmlspecialchars($row['title']) . "</span></div></td>";
                        echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['category_name']) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>" . date('M d, Y', strtotime($row['created_at'])) . "</td>";
                        echo "<td class='py-3 px-6 text-right'>
                                <a href='projects.php?edit=" . $row['id'] . "' class='text-blue-500 hover:text-blue-700 mr-2'><i class='fas fa-edit'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='py-4 px-6 text-center'>No projects found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
