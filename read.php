<?php
include 'config.php';

$query = "SELECT * FROM produits";
$result = $conn->query($query);

// Check if query execution was successful
if ($result) {
    $rows = array();
    
    // Fetch data and store it in an associative array
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    
    // Convert the associative array to JSON
    $json_data = json_encode($rows);

    // Output JSON data
    echo $json_data;
} else {
    // Handle query execution failure
    echo "Error executing the query: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
