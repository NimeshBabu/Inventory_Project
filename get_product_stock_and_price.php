<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventrix";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

// Check if product_code is provided
if (isset($_GET['product_code'])) {
    $product_code = $_GET['product_code'];
    $query = "SELECT Quantity, Price FROM product WHERE ProductCode = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $product_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            "stock" => $row['Quantity'],
            "cost" => $row['Price']
        ]);
    } else {
        echo json_encode(["error" => "Product not found"]);
    }
}

$conn->close();
?>
