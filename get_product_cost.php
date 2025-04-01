<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventrix";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

if (isset($_GET['product_code'])) {
    $product_code = $_GET['product_code'];
    $query = "SELECT Cost FROM product WHERE ProductCode = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $product_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode(["cost" => $row['Cost']]);
    } else {
        echo json_encode(["error" => "Product not found"]);
    }
}

$conn->close();
?>
