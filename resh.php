<?php 
include("connection.php"); // Ensure this is included first

// Fetch rescheduled tickets
$result = $con->query("SELECT * FROM ticket WHERE time > NOW()"); // Adjust the query as needed

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
            <div class="dash">Rescheduled Flights</div>
            <div>something</div>
        </nav>

        <section class="part1">
            <div class="head">
                <div class="part1ss">Traveler Name</div>
                <div class="part1ss">New Time</div>
                <div class="part1ss">Flight Code</div>
            </div>

            <?php while($row = $result->fetch_assoc()) { ?>
        <div class="tab">
            <div class="part1ss"><?php echo $row['name']; ?></div>
            <div class="part1ss"><?php echo $row['time']; ?></div>
            <div class="part1ss"><?php echo $row['code']; ?></div>
        </div>
    <?php } ?>
            
            
        </section>
    </div>
    <script src="tickets.js"></script>
</body>
</html>