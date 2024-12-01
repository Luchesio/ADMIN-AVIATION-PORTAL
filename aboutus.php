<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="aboutus.css" />
    <script src="language.js" defer></script>
    <title>Aerolert - About Us</title>
  </head>
  <body>
    <div id="loading-screen">
      <div class="spinner"></div>
    </div>
    <div id="main-content" style="display: none">
      <div class="line"></div>

      <div class="container">
        <div class="row" style="margin-top: 60px">
          <!-- b -->
          <div class="col-12 d-flex" style="margin-bottom: 80px">
            <a href="index.php"
              ><p
                style="
                  color: grey;
                  font-size: 1em;
                  font-weight: 600;
                  margin-right: 8px;
                "
                id="dashboard"
              >
                Dashboard
              </p></a
            >
            <p style="margin-right: 8px">▸</p>
            <a href="aboutus.html"
              ><p style="color: rgb(37, 85, 37); font-size: 1em; font-weight: 600" id="aboutus">
                About Us
              </p></a
            >
          </div>
          <!-- e -->

          <div class="col-12" style="margin-bottom: 10px">
            <h1 id="ahead">About</h1>
          </div>

          <div class="col-12" style="margin-bottom: 40px">
            <p class="about" id="about2">
              At Aerolert, we are committed to revolutionizing the aviation
              industry by providing real-time updates to travelers worldwide.
              Our innovative solution instantly informs passengers of any flight
              cancellations or schedule changes, ensuring they stay ahead of
              disruptions and make informed travel decisions. By bridging the
              gap between airlines and travelers, we aim to create a seamless
              and stress-free journey for every passenger.
            </p>
          </div>
          <div
            class="col-12 d-flex justify-content-center"
            style="margin-bottom: 40px"
          >
            <p class="informed" id="informed2">Stay Informed, Travel Confidently</p>
          </div>
        </div>
      </div>
      <!-- black background -->
      <div
        style="
          background-color: black;
          width: 100%;
          height: 300px;
          display: flex;
          justify-content: center;
          margin-bottom: 40px;
          align-items: center;
        "
      >
        <div class="container">
          <div class="row">
            <div class="col-6 d-grid">
              <h3 id="ovision">Our Vision</h3>
              <p class="vision" id="visionb">
                To be the global leader in enhancing travel reliability by
                delivering instant and accurate flight information, making air
                travel more predictable and stress-free.
              </p>
            </div>
            <div class="col-6 d-grid">
              <h3 id="omission">Our Mission</h3>
              <p class="vision" id="missionb">
                Our mission is to empower travelers with timely and precise
                notifications about their flights, minimizing inconveniences and
                fostering trust between airlines and passengers. Through
                cutting-edge technology and a user-centric approach, we strive
                to improve the travel experience, one flight at a time.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- ending of black background -->

      <div class="container">
        <div class="row">
          <div class="col-12" style="margin-bottom: 10px">
            <h1 id="missions">Mission Statement</h1>
          </div>
          <div class="col-12" style="margin-bottom: 40px">
            <p class="about" id="missionsb">
              To transform air travel by providing passengers with instant,
              reliable notifications about flight cancellations and schedule
              changes. We aim to minimize travel disruptions, improve
              communication between airlines and passengers, and ensure a
              smoother, more predictable journey for everyone.
            </p>
          </div>
        </div>
      </div>
      <!-- team section -->
      <div class="container teamcontainer">
        <div class="row">
          <div class="col-6 d-grid">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="100"
              height="100"
              viewBox="0 0 64 64"
              fill="rgb(37, 85, 37)"
            >
              <!-- Left Avatar -->
              <circle cx="20" cy="24" r="6" />
              <path d="M14 36c0-4 4-8 6-8s6 4 6 8v2h-12v-2z" />

              <!-- Center Avatar -->
              <circle cx="32" cy="20" r="8" />
              <path d="M24 36c0-6 8-12 8-12s8 6 8 12v3h-16v-3z" />

              <!-- Right Avatar -->
              <circle cx="44" cy="24" r="6" />
              <path d="M38 36c0-4 4-8 6-8s6 4 6 8v2h-12v-2z" />
            </svg>

            <h2 class="heading" id="tteam">Meet The Team</h2>
            <p class="heading">
              Meet the leadership team spearheading Aerolert innovations.
            </p>
            <a href="team.php">
              <button class="teambutton">Our Team</button></a
            >
          </div>
          <div class="col-6 d-grid">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="75"
              height="75"
              viewBox="0 0 64 64"
              fill="rgb(37, 85, 37)"
            >
              <rect x="14" y="20" width="36" height="30" rx="4" ry="4" />
              <rect x="20" y="14" width="24" height="6" />
              <rect x="26" y="6" width="12" height="6" />
              <circle cx="20" cy="52" r="2" fill="rgb(37, 85, 37)" />
              <circle cx="44" cy="52" r="2" fill="rgb(37, 85, 37)" />
            </svg>
            <h2 class="heading" id="oteam">Join Our Team</h2>
            <p class="heading">
              Our employees are our most valuable assets, powering all of
              Aerolert's technological innovations
            </p>
            <button class="teambutton2">VIEW OUR OPENINGS</button>
          </div>
        </div>
      </div>
      <!-- ending of team section -->
      <div class="footer-bottom">
              <p style="margin-top:10px;">&copy; 2024 Aerolert. All rights reserved.</p>
            </div>
    </div>

    <script src="aboutus.js"></script>
    
  </body>
</html>
