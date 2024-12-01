
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Sofadi+One&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="language.js" defer></script>
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
        <div class="dash" ><span id="dashboard">Dashboard </span></div>
        <div class="good">
              <p id="goodday" id="good"></p>

              <i class="fas fa-user" style="margin-left: 20px"></i>
            </div>
         </nav>
        <section class="part1">
        <h1 class="parthead" id="homeTitle">Welcome to Aerolert's Management System</h1>
        <p class="text" id="homeDescription">Aerolert helps aviation professionals streamline their operations, manage flights schedules, and provide exceptional service to travelers</p>
        </section>
        <section class="part2">
        <div class="box"><div class="dark">
        <i class="fa-solid fa-plane-departure" id="col"></i>
        <p class="man" id="idManaged">Flights Managed</p>
        <p class="num">100+</p>
        </div></div>
        <div class="box2"><div class="dark">
        <i class="fa-solid fa-users" id="col"></i>
        <p class="man" id="idAssisted">Travelers Assisted</p>
        <p class="num">15000+</p>
        </div></div>
        <div class="box3"><div class="dark">
        <i class="fas fa-envelope" id="col"></i>
        <p class="man" id="idSent" style="text-align:center;">Notifications Sent</p>
        <p class="num">8500+</p>
        </div></div>
    </section>
    <!-- <section class="part3">
        <h1 class="part3head" id="idFeatures">Key Features</h1>
        <div class="part3text"  ><i class="fa-solid fa-circle-check" id="che"></i>  <p id="idReal"> Real-time Flight Management </p></div>
        <p class="part3text" id="idAutomated"><i class="fa-solid fa-circle-check" id="che"></i>   Automated Notifications</p>
        <p class="part3text" id="idUser"><i class="fa-solid fa-circle-check" id="che"></i>   User-Friendly Reports</p>
        <p class="part3text" id="idIntuitive"><i class="fa-solid fa-circle-check" id="che"></i>   Intuitive Ticket Booking</p>
    </section> -->
        <section class="part3">
        <h1 class="part3head" id="idFeatures">Key Features</h1>
        <div class="part3text">
        <i class="fa-solid fa-circle-check che"></i>
        <p id="idReal">Real-time Flight Management</p>
        </div>
        <div class="part3text">
        <i class="fa-solid fa-circle-check che"></i>
        <p id="idAutomated">Automated Notifications</p>
        </div>
        <div class="part3text">
        <i class="fa-solid fa-circle-check che"></i>
        <p id="idUser">User-Friendly Reports</p>
        </div>
        <div class="part3text">
        <i class="fa-solid fa-circle-check che"></i>
        <p id="idIntuitive">Intuitive Ticket Booking</p>
         </div>
         </section>

    <!-- <footer></footer> -->
          <div class="footer-container">
              <!-- Company Info -->
              <div class="footer-section about">
                <h3 class="f-head">Aerolert</h3>
                <p id="faerolert">
                  Aerolert is your trusted aviation management platform,
                  ensuring seamless flight operations and communication for
                  travelers and staff.
                </p>
              </div>

              <!-- Quick Links -->
              <div class="footer-section links">
                <h4 class="f-head">Quick Links</h4>
                <ul>
                  <li><a href="index.php"><span id="dashboard">Dashboard</span></a></li>
                  <li><a href="flights.php"><span id="navFlights">Flights</span></a></li>
                  <li><a href="tickets.php"><span id="navTickets">Tickets</span></a></li>
                  <li><a href="travelers.php"><span id="navTravelers">Travelers</span></a></li>
                  <li><a href="aboutus.php"><span id="aboutus">About Us</span></a></li>
                </ul>
              </div>

              <!-- Contact -->
              <div class="footer-section contact">
                <h4 class="f-head">Contact Us</h4>
                <p><i class="fas fa-phone"></i> +2349056035245</p>
                <p><i class="fas fa-envelope"></i> support@aerolert.com</p>
                <p>
                  <i class="fas fa-map-marker-alt"></i> 123 Aviation Lane, Ikeja
                  , Lagos
                </p>
              </div>

              <!-- Social Media -->
              <div class="footer-section social">
                <h4 class="f-head">Follow Us</h4>
                <div class="social-icons">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
            </div>
    </div>
</div>
    <script src="index.js"></script>
</body>
</html>