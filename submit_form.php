<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "inventory";
    $port = 3306;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into table
    $sql = "INSERT INTO Admission (FormNo, Sname, rank, gender, score, school, district, vdc, ward, tole, mobileNo, TelNo, email, guardian, priority1, priority2, priority3) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isissssisssssssss", $FormNo, $Sname, $rank, $gender, $score, $school, $district, $vdc, $ward, $tole, $mobileNo, $TelNo, $email, $guardian, $priority1, $priority2, $priority3);

    // Set parameters and execute statement
    $FormNo = $_POST["FormNo"];
    $Sname = $_POST["Sname"];
    $rank = $_POST["rank"];
    $gender = $_POST["gender"]; 
    $score = $_POST["score"];
    $school = $_POST["school"];
    $district = $_POST["district"];
    $vdc = $_POST["vdc"];
    $ward = $_POST["ward"];
    $tole = $_POST["tole"];
    $mobileNo = $_POST["mobileNo"];
    $TelNo = $_POST["TelNo"];
    $email = $_POST["email"];
    $guardian = $_POST["guardian"];
    $priority1 = $_POST["priority1"];
    $priority2 = $_POST["priority2"];
    $priority3 = $_POST["priority3"];

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "New record inserted successfully";
        echo "<h2>Your Input:</h2>";
        echo $FormNo;
        echo "<br>";
        echo $Sname;
        echo "<br>";
        echo $gender;
        echo "<br>";
        echo $score;
        echo "<br>";
        echo $school;
        echo "<br>";
        echo $district;
        echo "<br>";
        echo $vdc;
        echo "<br>";
        echo $ward;
        echo "<br>";
        echo $tole;
        echo "<br>";
        echo $mobileNo;
        echo "<br>";
        echo $TelNo;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $guardian;
        echo "<br>";
        echo $priority1;
        echo "<br>";
        echo $priority2;
        echo "<br>";
        echo $priority3;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Log SQL query execution
    $log_message = "SQL query: " . $sql . "\n";
    $log_message .= "Execution status: " . ($stmt->execute() ? "Success" : "Failed") . "\n";
    error_log($log_message);

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If not submitted via POST method, redirect to the form page
    header("Location: form.php");
    exit();
}
?>
