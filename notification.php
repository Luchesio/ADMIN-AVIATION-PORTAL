<?php 
include("connection.php"); // Ensure this is included first
include("functions.php");

$user_data = check_login($con);

// Fetch travelers for the dropdown
$travelers = [];
$query = "SELECT id, name, email FROM ticket"; // Adjust the table name as necessary
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $travelers[] = $row; // Store each traveler in the array
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['send_email'])){
    // Retrieve form data
    $traveler_id = $_POST['traveler_id'];
    $message = $_POST['message'];

    // Fetch the traveler's email based on the selected ID
    $query = "SELECT email FROM ticket WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $traveler_id);
    $stmt->execute();
    $stmt->bind_result($traveler_email);
    $stmt->fetch();
    $stmt->close();

    // Send email using PHPMailer
    if (!empty($traveler_email)) {
        $subject = "Notification from Aerolert";
        $body = "<p>$message</p>";
        if (send_email($traveler_email, $subject, $body)) {
            echo "<script>alert('Email sent successfully to $traveler_email');</script>";
        } else {
            echo "<script>alert('Failed to send email.');</script>";
        }
    } else {
        echo "<script>alert('Traveler not found.');</script>";
    }
}

function send_email($to, $subject, $message) {
    // Convert newline characters into <br> for better formatting in email
    $message = nl2br($message); // Convert newlines to <br> tags

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kodiokeke0@gmail.com'; // Your email address
        $mail->Password = 'uwdvicefvibhocyh'; // Your app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('kodiokeke0@gmail.com', 'Aerolert');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);  // Send email as HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;  // HTML message body

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        // Error logging
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notificationn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <title>Send Notifications</title>
</head>
<body>
<div id="loading-screen">
      <div class="spinner"></div>
</div>
<div id="main-content" style="display: none">

<nav>
<a href="index.php" class="navlink"><i class="fas fa-user" style=" margin-right:17px;" ></i><span id="dashboard">Dashboard</span></a>
        <a href="#" class="navlink" ><i class="fas fa-plane" style=" margin-right:17px;" ></i><span id="navFlights">Flights</span></a>
        <a href="tickets.php" class="navlink"><i class="fas fa-ticket-alt" style=" margin-right:17px;" ></i><span id="navTickets">Tickets</span></a>
        <a href="travelers.php" class="navlink"><i class="fas fa-users" style=" margin-right:17px;" ></i><span id="navTravelers">Travelers</span></a>
        <a href="notification.php" class="navlink"><i  class="fas fa-bell" style=" margin-right:17px;" ></i><span id="navNotifications">Notification</span></a>
        <a href="" class="navlink"><i class="fas fa-chart-line" style=" margin-right:17px;" ></i><span id="navReports">Reports</span></a>
        <a href="help.php" class="navlink"><i class="fas fa-question-circle" style=" margin-right:17px;" ></i><span id="navHelp">Help Center</span></a>
        <a href="settings.php" class="navlink"><i class="fas fa-cog" style=" margin-right:17px;" ></i><span id="navSettings">Settings</span></a>
    </nav>

    <div class="menu">
        <a href="" class="navlink">Completed Flights</a>
        <a href="resh.php" class="navlink">Rescheduled Flights</a>
        <a href="cancel.php" class="navlink">Cancelled Flights</a>
    </div>

<div class="bodyy">
<nav class="second">
            <div class="dash">Customers</div>
            <i class="fas fa-user" ></i>
        </nav>
    <form method="POST" action="" class="notification-container">
        <label for="traveler_id">Select Traveler:</label>
        <select name="traveler_id" id="traveler_id" required>
            <option value="">Select a traveler</option>
            <?php foreach ($travelers as $traveler): ?>
                <option value="<?php echo $traveler['id']; ?>"><?php echo htmlspecialchars($traveler['name']); ?></option>
            <?php endforeach; ?>
        </select>

        <label for="message">Message:</label>
        <textarea name="message" id="message" placeholder="Type your message here..." required></textarea>


        <div class="actions">
            <button type="submit" name="send_email">Send Email</button>
        </div>
    </form>

    <div id="notification-response"></div>
</div>
<script>
    window.addEventListener("load", function () {
    setTimeout(function () {
      document.getElementById("loading-screen").style.display = "none";
      document.getElementById("main-content").style.display = "block";
      document.body.classList.remove("loading");
    }, 3000); // 3000 ms = 3 seconds
  });
</script>
<script src="tick.js"></script>
<script src="theme.js"></script>
</div>
</body>
</html>