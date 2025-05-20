<?php
/**
 * Database connection file
 * This file establishes a connection to the MySQL database
 */

// Database credentials
$db_host = "localhost";  // Usually "localhost" for local development
$db_name = "motobuzz_db"; // The database name we created
$db_user = "root";       // Default MySQL username (change according to your setup)
$db_pass = "";           // Default MySQL password (change according to your setup)

// Create a connection
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set default fetch mode to associative array
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

/**
 * Function to clean input data
 * @param string $data - The data to be cleaned
 * @return string - The cleaned data
 */
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>