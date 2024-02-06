<?php
    // Include your database configuration
    include 'config.php';

    // Allow CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type");

    // Check if JSON data is received via POST request
    $json_data = file_get_contents('php://input');
    if(empty($json_data)) {
        // If no JSON data is received, send error response
        http_response_code(400); // Bad Request
        echo json_encode(array("error" => "No JSON data received"));
        echo "Error no Data received";
        exit;
    }

    // Decode the JSON data into an associative array
    $data_array = json_decode($json_data, true);

    // Check if JSON data is valid
    if($data_array === null) {
        // If JSON data is invalid, send error response
        http_response_code(400); // Bad Request
        echo json_encode(array("error" => "Invalid JSON data"));
        exit;
    }

    // Extract data from the JSON array
    $numProduit = $data_array["numProduit"];
    $designation = $data_array["designation"];
    $prix = $data_array["prix"];
    $quantite = $data_array["quantite"];
    $montant = $data_array["montant"];

    // Prepare and execute the SQL query to insert the data into the database
    $query = "INSERT INTO produits VALUES ('$numProduit', '$designation', $prix, $quantite, $montant)";
    $result = $conn->query($query);

    // Check if the query was successful
    if (!$result) {
        // If an error occurred, send error response
        http_response_code(500); // Internal Server Error
        echo json_encode(array("error" => $conn->error));
    } else {
        // If successful, send success response
        echo json_encode(array("message" => "Data inserted successfully"));
    }
?>
