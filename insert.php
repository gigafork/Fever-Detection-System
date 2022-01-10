<?php

header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();
date_default_timezone_set('Asia/Kolkata');
 
// Check if we got the field from the user
if (isset($_GET['temp'])) {
 
    $temp = $_GET['temp'];
    $hum = $_GET['hum'];
    $prediction = $_GET['prediction'];
 
    // Include data base connect class
    $filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

 
    // Connecting to database 
    $db = new DB_CONNECT();
    $con=mysqli_connect("18.217.222.254","admin_spectrum","spectrumcet@mysql","admin_default") or die(mysqli_error($con));

 
    // Fire SQL query to insert data in weather
    $result = mysqli_query($con,"INSERT INTO data2(temp,hum,prediction) VALUES('$temp','$hum','$prediction')");
 
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = " successfully created.";
 
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // Show JSON response
    echo json_encode($response);
}
?>
