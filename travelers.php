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

if(isset($_POST['create_btn'])){
    // Retrieve form data
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $code = generateCode(6); // Generate a new 6-digit code

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO ticket (name, number, email, code) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $number, $email, $code); // 's' for string, 'i' for integer

    // Execute the statement
    if($stmt->execute()){
        echo "New ticket created successfully with code: " . $code; // Display the generated code
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
    <link rel="stylesheet" href="travelerss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Sofadi+One&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="language.js" defer></script>
    <script src="traveler.js"></script>
    <title>Document</title>
</head>
<body>
<div id="loading-screen">
      <div class="spinner"></div>
       </div>
       <div id="main-content" style="display: none">

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
    <div class="bodyy">
        <nav class="second">
            <div class="dash">Customers</div>
            <div>something</div>
        </nav>

        <section class="part1">
            <div class="head">
                <div class="part1ss">ID</div>
                <div class="part1ss">Traveler Name</div>
                <div class="part1ss">Phone Number</div>
                <div class="part1ss">E-mail</div>
            </div>
            
            <?php include('get-ticket.php');?>

            <?php while($row= $featured_products->fetch_assoc()){ ?>
                <div class="tab">
                    <div class="part1ss"><?php echo $row['id']; ?></div>
                    <div class="part1ss"><?php echo $row['name']; ?></div>
                    <div class="part1ss"><?php echo $row['number']; ?></div>
                    <div class="part1ss"><?php echo $row['email']; ?></div>
                </div>
            <?php } ?>
        </section>
       
    </div>
            </div>
    <script src="ticket.js"></script>
    
</body>
</html>