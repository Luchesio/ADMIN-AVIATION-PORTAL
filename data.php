<?php

//How to get packages:
//Install Composer
//Then use this commands in terminal;
// composer require mailjet/mailjet-apiv3-php

//the dtatabase:
//name:aviation_admin
//table: passengers
//content: name varchar(45)  email varchar(45) flight varchar(45) status varchar(45) 

require 'vendor/autoload.php';

// Database and API credentials
$hostname = 'localhost';
$dbname = 'aviation_admin';
$username = 'put-your-db-username';
$password = 'put-your-db-password';
$apiKey = "4d5dc6-13d7c8";
$apiUrl = "https://aviation-edge.com/v2/public/timetable?key={$apiKey}&iataCode=LOS&type=departure";

// Fetch flight data from the API
$response = file_get_contents($apiUrl);
if ($response === FALSE) {
    die("Error occurred while fetching data from the API.");
}
$flights = json_decode($response, true);

// Filter Air Peace flights
$filteredFlights = array_filter($flights, function ($flight) {
    return isset($flight['airline']['name']) && $flight['airline']['name'] === 'Air Peace';
});

// Establish a connection to the database
$con = new mysqli($hostname, $username, $password, $dbname);
if ($con->errno) {
    die("Connection error: " . $con->error);
}

// Fetch passenger data from the database
$query = "SELECT name, email, flight FROM passengers";
$result = $con->query($query);
$passengerData = [];
if ($result->num_rows > 0) {
    while ($passenger = $result->fetch_assoc()) {
        $passengerData[] = [
            'name' => $passenger['name'],
            'email' => $passenger['email'],
            'flight' => $passenger['flight']
        ];
    }
} else {
    $passengerData = ['message' => 'No passengers found in the database.'];
}

// Return the data as an array
return [
    'flights' => $filteredFlights,
    'passengerData' => $passengerData
];
?>
