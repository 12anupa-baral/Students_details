<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "inventory";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['formNo'])) {
    $formNo = $_GET['formNo'];
    
    // Prepare and execute SQL query to fetch data based on FormNo
    $sql = "SELECT * FROM Admission WHERE FormNo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $formNo);
    $stmt->execute();
    $result = $stmt->get_result();

  
    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
       
        echo json_encode($row);
    } else {
        
        echo json_encode(array());
    }

    $stmt->close();
} else {
   
    echo json_encode(array());
}

$conn->close();
?>
