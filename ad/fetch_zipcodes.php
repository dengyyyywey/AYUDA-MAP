<?php
// Check if the area is set in the request
if(isset($_GET['area'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ayuda";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch zip codes corresponding to the selected area
    $selectedArea = $_GET['area'];
    $sql = "SELECT zipcode FROM area WHERE areas = '$selectedArea'";
    $result = $conn->query($sql);

    // Prepare an array to store the zip codes
    $zipcodes = array();

    if ($result->num_rows > 0) {
        // Fetch zip codes and add them to the array
        while ($row = $result->fetch_assoc()) {
            $zipcodes[] = $row['zipcode'];
        }
    }

    // Close database connection
    $conn->close();

    // Send the zip codes array as JSON response
    header('Content-Type: application/json');
    echo json_encode($zipcodes);
} else {
    echo "Area parameter is not set";
}
?>
