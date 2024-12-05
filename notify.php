<?php
ob_start();

// Suppress deprecation warnings (or handle them as needed)
error_reporting(E_ALL & ~E_DEPRECATED);

// Mailjet and other code...
require 'vendor/autoload.php'; // Mailjet API autoloader
use \Mailjet\Resources;

// Database credentials
$hostname = 'localhost';
$dbname = 'aviation_admin';
$username = 'your-username-here';
$password = 'your-password-here';

// Mailjet API credentials
$mailApiKey = "03b3b0a70337c332b34efb623164b39f";
$secretKey = "9e0fedc0b8c681e0bc62b2ca536a3c70";

// Initialize Mailjet API client
$mailjet = new \Mailjet\Client($mailApiKey, $secretKey, true, ['version' => 'v3.1']);

// Establish a connection to the database
$con = new mysqli($hostname, $username, $password, $dbname);
if ($con->errno) {
    die("Connection error: " . $con->error);
}

// Send the JSON response header early, before any output
header('Content-Type: application/json');

// Get the passenger data and filtered flights
$data = require 'data.php'; // Assuming this file returns the necessary data
$passengerData = $data['passengerData'];
$filteredFlights = $data['flights'];

while (true) {
    // Fetch passengers with status 'inactive' or 'delay' that haven't received an email yet
    $query = "SELECT id, name, email, flight, status, last_updated FROM passengers WHERE status IN ('inactive', 'delay', 'active')";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        while ($passenger = $result->fetch_assoc()) {
            $foundFlight = false;
            
            $randomNumberInRange = rand(1, 100);
            
            // Look for the corresponding flight in the API data
            foreach ($filteredFlights as $flight) {
                if ($flight['flight']['iataNumber'] == $passenger['flight']) {
                    $foundFlight = true;
                    $flightStatus = $flight['status'];
                    $scheduledDeparture = new DateTime($flight['departure']['scheduledTime']);
                    //$currentTime = new DateTime();
                    //$timeDifference = $scheduledDeparture->getTimestamp() - $currentTime->getTimestamp();
                    //&& $timeDifference <= 600 && $timeDifference > 0


                    // Check if the flight's status is "unknown"
                    if ( ($flightStatus == 'unknown' || $flightStatus == 'scheduled' || $flightStatus == 'active') && ($passenger['status'] == 'inactive'||$passenger['status'] == 'delay')) {
                        sendNotification($passenger, $flight, $mailjet);
                        updatePassengerStatus($passenger['id'], $con); // Update status to 'active'
                        removePassenger($passenger['id'], $con);  // Remove from DB after sending 2-hour reminder
                    }

                    // Handle flight status "cancelled"
                    if ($passenger['status'] == 'inactive' && $flightStatus == 'cancelled') {
                        sendCancellationNotification($passenger, $flight, $mailjet);
                        updatePassengerStatusToDelay($passenger['id'], $con);  // Change status to 'delay'
                    }

                    // Handle flight status "active" (flight is airborne)
                     if ($passenger['status'] == 'active') {
                        removePassenger($passenger['id'], $con); // Remove from DB if flight is active
                     }

                    break;
                }
            }

            // Return the random number as a JSON response
            $responseRandom = [];
            $responseRandom[] = [
                'randomnumber' => $randomNumberInRange
            ];
            echo json_encode($responseRandom); // Send this only after header is set
            
            // If no matching flight was found, handle that case as well
            if (!$foundFlight) {
                // Handle the case where no matching flight is found
            }
        }
    } else {
        echo json_encode(['message' => 'No passengers found in the database.']);
    }

    // Sleep for 5 minutes before checking again
    sleep(20);  // 300 seconds = 5 minutes
}

// Function to send notification to the passenger
function sendNotification($passenger, $flight, $mailjet) {
    $emailBody = "<h3>Hello {$passenger['name']},</h3>";
    $emailBody .= "<p>Your flight information is as follows:</p>";
    $emailBody .= "<p>Flight Number: {$flight['flight']['iataNumber']}</p>";
    $emailBody .= "<p>Airline: {$flight['airline']['name']}</p>";
    $emailBody .= "<p>Departure Airport: {$flight['departure']['iataCode']}</p>";
    $emailBody .= "<p>Scheduled Departure: {$flight['departure']['scheduledTime']}</p>";
    $emailBody .= "<p>Arrival Airport: {$flight['arrival']['iataCode']}</p>";
    $emailBody .= "<p>Arrival Scheduled Time: {$flight['arrival']['scheduledTime']}</p>";
    $emailBody .= "<p>Safe travels!</p>";

    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => 'sopekushimo@gmail.com',
                    'Name' => 'Aviation Admin'
                ],
                'To' => [
                    [
                        'Email' => $passenger['email'],
                        'Name' => $passenger['name']
                    ]
                ],
                'Subject' => 'Your Upcoming Flight Information',
                'HTMLPart' => $emailBody
            ]
        ]
    ];

    $response = $mailjet->post(Resources::$Email, ['body' => $body]);

    // Log the response for debugging
    if ($response->success()) {
        echo "Reminder notification sent to {$passenger['email']}<br>";
    } else {
        // Log Mailjet error response to diagnose
        echo "Failed to send reminder notification to {$passenger['email']}<br>";
        echo "Mailjet API Error: " . json_encode($response->getData()) . "<br>";
    }
}

// Function to send cancellation notification
function sendCancellationNotification($passenger, $flight, $mailjet) {
    $emailBody = "<h3>Hello {$passenger['name']},</h3>";
    $emailBody .= "<p>We regret to inform you that your flight has been cancelled.</p>";
    $emailBody .= "<p>Flight Number: {$flight['flight']['iataNumber']}</p>";
    $emailBody .= "<p>Airline: {$flight['airline']['name']}</p>";
    $emailBody .= "<p>Departure Airport: {$flight['departure']['iataCode']}</p>";
    $emailBody .= "<p>Scheduled Departure: {$flight['departure']['scheduledTime']}</p>";
    $emailBody .= "<p>We apologize for any inconvenience caused.</p>";

    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => 'sopekushimo@gmail.com',
                    'Name' => 'Aviation Admin'
                ],
                'To' => [
                    [
                        'Email' => $passenger['email'],
                        'Name' => $passenger['name']
                    ]
                ],
                'Subject' => 'Your Flight Has Been Cancelled',
                'HTMLPart' => $emailBody
            ]
        ]
    ];

    $response = $mailjet->post(Resources::$Email, ['body' => $body]);

    if ($response->success()) {
        echo "Cancellation notification sent to {$passenger['email']}<br>";
    } else {
        echo "Failed to send cancellation notification to {$passenger['email']}<br>";
    }
}

// Function to update the passenger's status to 'active'
function updatePassengerStatus($passengerId, $con) {
    $updateQuery = "UPDATE passengers SET status = 'active', last_updated = NOW() WHERE id = $passengerId";
    $con->query($updateQuery);
}

// Function to update the passenger's status to 'delay'
function updatePassengerStatusToDelay($passengerId, $con) {
    $updateQuery = "UPDATE passengers SET status = 'delay', last_updated = NOW() WHERE id = $passengerId";
    $con->query($updateQuery);
}

// Function to remove a passenger from the database (flight is airborne or after 2 minutes)
function removePassenger($passengerId, $con) {
    $deleteQuery = "DELETE FROM passengers WHERE id = $passengerId";
    $con->query($deleteQuery);
}

// End output buffering and flush
ob_end_flush();
?>