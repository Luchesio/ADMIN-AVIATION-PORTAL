<?php 
include("connection.php"); // Ensure this is included first

function generateCode($length = 6) {
    // Generate a random 6-digit number
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= rand(0, 9); // Append a random digit (0-9)
    }
    return $code;
}

function generateFutureDateTime($days = 2) {
    // Generate a random future date and time
    $dateTime = new DateTime();
    $dateTime->modify("+$days days"); // Add the specified number of days

    // Generate a random hour and minute
    $randomHour = rand(0, 23); // Random hour (0-23)
    $randomMinute = rand(0, 59); // Random minute (0-59)

    // Set the random time
    $dateTime->setTime($randomHour, $randomMinute, 0); // Set the time to random hour and minute

    return $dateTime->format('Y-m-d H:i:s'); // Format the date and time as Year-Month-Day Hour:Minute:Second
}

if (isset($_POST['reschedule_btn'])) {
    $ticket_id = $_POST['ticket_id'];

    // Generate a new future date and time
    $newFutureDateTime = generateFutureDateTime(2); // Generate a new future date and time (2 days from now)

    // Prepare and bind
    $stmt = $con->prepare("UPDATE ticket SET time = ? WHERE id = ?");
    $stmt->bind_param("si", $newFutureDateTime, $ticket_id); // 's' for string, 'i' for integer

    // Execute the statement
    if ($stmt->execute()) {
        echo "Ticket rescheduled successfully to: " . $newFutureDateTime;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

if(isset($_POST['create_btn'])){
    // Retrieve form data
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $code = generateCode(6); // Generate a new 6-digit code
    $futureDateTime = generateFutureDateTime(2); // Generate a future date and time (2 days from now)

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO ticket (name, number, email, code, time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $number, $email, $code, $futureDateTime); // 's' for string, 'i' for integer

    // Execute the statement
    if($stmt->execute()){
        echo "New ticket created successfully with code: " . $code . " and date: " . $futureDateTime; // Display the generated code and date
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Handle ticket cancellation
if (isset($_POST['cancel_btn'])) {
    $ticket_id = $_POST['ticket_id'];

    // Prepare and bind
    $stmt = $con->prepare("DELETE FROM ticket WHERE id = ?");
    $stmt->bind_param("i", $ticket_id); // 'i' for integer

    // Execute the statement
    if ($stmt->execute()) {
        echo "Ticket canceled successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Fetch existing tickets
include('get-ticket.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tickets.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https ://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Sofadi+One&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="language.js" defer></script>
    <title>Document</title>
</head>
<body>
<nav>
<a href="index.php" class="navlink"><i class="fas fa-user" style=" margin-right:17px;" ></i><span id="dashboard">Dashboard</span></a>
        <a href="flights.php" class="navlink" ><i class="fas fa-plane" style=" margin-right:17px;" ></i><span id="navFlights">Flights</span></a>
        <a href="tickets.php" class="navlink"><i class="fas fa-ticket-alt" style=" margin-right:17px;" ></i><span id="navTickets">Tickets</span></a>
        <a href="travelers.php" class="navlink"><i class="fas fa-users" style=" margin-right:17px;" ></i><span id="navTravelers">Travelers</span></a>
        <a href="notifiation.php" class="navlink"><i  class="fas fa-bell" style=" margin-right:17px;" ></i><span id="navNotifications">Notification</span></a>
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
            <div class="dash">Tickets</div>
            <div>something</div>
        </nav>

        <section class="part1">
            <h1 class="tic">Ticket Information</h1>
            <div class="head">
                <div class="part1ss">Traveler Name</div>
                <div class="part1ss">Flight Code</div>
                <div class="part1ss">Time</div>
                <div class="part1ss">Reschedule</div>
                <div class="part1ss">Cancel</div>
            </div>
            
            <?php include('get-ticket.php');?>

            <?php while($row= $featured_products->fetch_assoc()){ ?>
    <div class="tab">
        <div class="part1ss"><?php echo $row['name']; ?></div>
        <div class="part1ss"><?php echo $row['code']; ?></div>
        <div class="part1ss"><?php echo $row['time']; ?></div>
        <div class="part1ss">
            <form action="" method="post" style="display:inline;">
                <input type="hidden" name="ticket_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="reschedule_btn" class="btnnn">Reschedule</button>
            </form>
        </div>
        <div class="part1ss">
            <form action="" method="post" style="display:inline;">
                <input type="hidden" name="ticket_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="cancel_btn" class="btnnn2">Cancel</button>
            </form>
        </div>
    </div>
<?php } ?>
            <button class="btn">Generate ticket</button>
        </section>
        <div class="popup">
            <div class="darkk">
                <h1>Enter Details</h1>
                <form action="" method="post">
                    <input type="text" name="name" id="nu" placeholder="Enter Your Name!!">
                    <input type="number" name="number" id="nu" placeholder="Enter Your Number!!">
                    <input type="email" name="email" id="nu" placeholder="Enter Your E-mail!!">
                    <input type="submit" name="create_btn" value="Submit" class="butt">
                </form>
            </div>
        </div>
    </div>
    <script src="tickett.js"></script>
</body>
</html>