<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aerolert - Our Team</title>
    <link rel="stylesheet" href="team.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <script src="language.js" defer></script>
  </head>
  <body>
    <div id="loading-screen">
      <div class="spinner"></div>
    </div>
    <div id="main-content" style="display: none">
      <div class="line"></div>

      <div style="width:150px;height:35px;display:flex;justify-content:space-between;margin-bottom:100px;margin-top:80px;margin-left:100px;">
  <a href="aboutus.php"
              ><p
                style="
                  color: grey;
                  font-size: 1em;
                  font-weight: 600;
                  margin-right: 8px;
                "
                id="aboutus"
              >
                About Us
              </p></a
            >
            <p style="margin-right: 8px">▸</p>
            <a href="team.php"
              ><p style="color: rgb(37, 85, 37); font-size: 1em; font-weight: 600" >
                Team
              </p></a
            >
</div>
      <div class="container">
        <header class="team-header">
          <h1>Meet the Aerolert Team</h1>
          <p style="font-weight: 600">
            Our passionate team of professionals drives innovation and
            excellence in aviation management.
          </p>
        </header>
        <div class="team-grid">
          <!-- Team Member 1 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 1" class="team-photo" />
            <h3>Oyugbo Oseghale Luchesio</h3>
            <p>Front-end Lead</p>
          </div>
          <!-- Team Member 2 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 2" class="team-photo" />
            <h3>Ndee-Amaugo Faith .</h3>
            <p>Front-end Developer</p>
          </div>
          <!-- Team Member 3 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 3" class="team-photo" />
            <h3>Sowole Oluwagbemileke D</h3>
            <p>Security & Front-end Developer</p>
          </div>
          <!-- Team Member 4 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 4" class="team-photo" />
            <h3>Okafor Stephanie I.</h3>
            <p>Front-end Developer</p>
          </div>
          <!-- Team Member 5 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 5" class="team-photo" />
            <h3>Otomiewo Eric Onaefeme</h3>
            <p>Front-end Developer</p>
          </div>
          <!-- Team Member 6 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 6" class="team-photo" />
            <h3>Oluwameso Oluwakayode</h3>
            <p>Front-end Developer</p>
          </div>
          <!-- Team Member 7 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 7" class="team-photo" />
            <h3>Onuoha Joseph O.</h3>
            <p>Lead Designer & Lead Back-end</p>
          </div>
          <!-- Team Member 8 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 8" class="team-photo" />
            <h3>Olagundoye Olaniyi S</h3>
            <p>Back-end Developer</p>
          </div>
          <!-- Team Member 9 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 9" class="team-photo" />
            <h3>Ogundele Oluwademilade I</h3>
            <p>Back-end Developer</p>
          </div>
          <!-- Team Member 10 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 10" class="team-photo" />
            <h3>Umeizudike Timothy O.</h3>
            <p>UI/UX & Back-end Developer</p>
          </div>
          <!-- Team Member 11 -->
          <div class="team-member">
            <img src="img/hmm.png" alt="Team Member 11" class="team-photo" />
            <h3>Obasi Emmanuel Allison</h3>
            <p>Security & Documentation</p>
          </div>
          <!-- Add more team members as needed -->
        </div>
      </div>


      <div class="footer-bottom">
              <p style="margin-top:10px;">&copy; 2024 Aerolert. All rights reserved.</p>
            </div>
    </div>
    <script>
      // Show loading screen initially
      document.body.classList.add("loading");

      // Set a timeout to hide the loading screen after 3 seconds (3000 ms)
      window.addEventListener("load", function () {
        setTimeout(function () {
          document.getElementById("loading-screen").style.display = "none";
          document.getElementById("main-content").style.display = "block";
          document.body.classList.remove("loading");
        }, 3000); // 3000 ms = 3 seconds
      });
    </script>
  </body>
</html>
