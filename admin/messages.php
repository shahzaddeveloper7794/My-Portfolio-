<?php include 'includes/header.php'; ?>

<h1 class="text-3xl font-bold text-gray-800 mb-6">Messages</h1>

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
                    <th class="py-3 px-6">Date</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Subject</th>
                    <th class="py-3 px-6">Message</th>
                    <th class="py-3 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php
                $query = "SELECT * FROM messages ORDER BY created_at DESC";
                $messages = mysqli_query($conn, $query);

                if (mysqli_num_rows($messages) > 0) {
                    while ($row = mysqli_fetch_assoc($messages)) {
                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        echo "<td class='py-3 px-6 whitespace-nowrap'>" . date('M d, Y', strtotime($row['created_at'])) . "</td>";
                        echo "<td class='py-3 px-6 font-medium'>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td class='py-3 px-6'><a href='mailto:" . htmlspecialchars($row['email']) . "' class='text-blue-500 hover:underline'>" . htmlspecialchars($row['email']) . "</a></td>";
                        echo "<td class='py-3 px-6'>" . htmlspecialchars($row['subject']) . "</td>";
                        echo "<td class='py-3 px-6 truncate max-w-xs' title='" . htmlspecialchars($row['message']) . "'>" . htmlspecialchars(substr($row['message'], 0, 50)) . "...</td>";
                        echo "<td class='py-3 px-6 text-right'>
                                <a href='actions/message_action.php?delete=" . $row['id'] . "' class='text-red-500 hover:text-red-700' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='py-4 px-6 text-center'>No messages found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
