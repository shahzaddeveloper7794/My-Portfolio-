<?php
// Local install script to create the portfolio database and seed data.
$host = 'localhost';
$user = 'root';
$password = '';
$schemaFile = __DIR__ . '/schema.sql';

if (!file_exists($schemaFile)) {
    die('Error: schema.sql file not found.');
}

$schemaSql = file_get_contents($schemaFile);
if ($schemaSql === false) {
    die('Error: Unable to read schema.sql file.');
}

$connection = mysqli_connect($host, $user, $password);
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

mysqli_set_charset($connection, 'utf8mb4');

if (!mysqli_multi_query($connection, $schemaSql)) {
    die('Database creation/import failed: ' . mysqli_error($connection));
}

// Flush all results to ensure the multi-query completed.
do {
    if ($result = mysqli_store_result($connection)) {
        mysqli_free_result($result);
    }
} while (mysqli_next_result($connection));

mysqli_close($connection);

echo "Database 'portfolio' created and seeded successfully.\n";
