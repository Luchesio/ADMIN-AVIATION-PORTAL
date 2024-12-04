<?php

// How to get packages:
// Install Composer
// Then use these commands in the terminal;
// composer require mailjet/mailjet-apiv3-php 

// The database:
// name:aviation_admin
// table: passengers
// content: name varchar(45) email varchar(45) flight varchar(45) status varchar(45) 

// CREATE TABLE api_cache (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     data TEXT NOT NULL,
//     timestamp DATETIME NOT NULL
// );

require 'vendor/autoload.php';

$hostname = 'localhost';
$dbname = 'aviation_admin';
$username = 'root';
$password = 'sope2000';
$apiKey = "4d5dc6-13d7c8";
$apiUrl = "https://aviation-edge.com/v2/public/timetable?key={$apiKey}&iataCode=LOS&type=departure";

// Define the cache file path and cache expiry time (in seconds)
$cacheFile = 'cache/flights_cache.json';
$cacheExpiry = 600; // 10 mins

// Ensure the cache directory exists
if (!is_dir('cache')) {
    mkdir('cache', 0777, true); // Create the directory with full permissions
}

// Check if the cache file exists and is still valid
if (file_exists($cacheFile) && (filemtime($cacheFile) + $cacheExpiry > time())) {
    // Use the cached data
    $flights = json_decode(file_get_contents($cacheFile), true);
} else {
    // Fetch fresh data from the API
    $response = file_get_contents($apiUrl);
    if ($response === FALSE) {
        die("Error occurred while fetching data from the API.");
    }
    $flights = json_decode($response, true);

    // Cache the fresh data
    file_put_contents($cacheFile, json_encode($flights));
}

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
