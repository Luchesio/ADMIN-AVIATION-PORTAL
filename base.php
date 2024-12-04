<?php
require 'vendor/autoload.php';
// Include the shared data file
$data = require 'data.php'; // Including data.php will automatically fetch flight and passenger data

// Get the filtered flights
$filteredFlights = $data['flights'];

// Prepare the response for the front-end (only Air Peace flights)
$responseData = [];
foreach ($filteredFlights as $flight) {
    $responseData[] = [
        'flightNumber' => $flight['flight']['iataNumber'],
        'airline' => $flight['airline']['name'],
        'scheduledDeparture' => $flight['departure']['scheduledTime'],  // Departure scheduled time
        'departureTerminal' => $flight['departure']['terminal'],
        'arrivalScheduledTime' => $flight['arrival']['scheduledTime'],  // Arrival scheduled time
        'status' => $flight['status']
    ];
}

// Send the filtered Air Peace flight data to the front-end (JSON response)
header('Content-Type: application/json');
echo json_encode($responseData);
?>
