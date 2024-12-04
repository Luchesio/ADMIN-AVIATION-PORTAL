function updateGreeting() {
    const paragraph = document.getElementById("goodday");
    const currentHour = new Date().getHours(); // Get the current hour (0-23)
    const savedLanguage = localStorage.getItem("language") || "en"; // Get saved language, default to 'en'
  
    // Greeting messages in different languages
    const greetings = {
      en: {
        morning: "Good Morning",
        afternoon: "Good Afternoon",
        evening: "Good Evening"
      },
      es: {
        morning: "Buenos Días",
        afternoon: "Buenas Tardes",
        evening: "Buenas Noches"
      },
      fr: {
        morning: "Bonjour",
        afternoon: "Bon Après-midi",
        evening: "Bonsoir"
      },
      de: {
        morning: "Guten Morgen",
        afternoon: "Guten Tag",
        evening: "Guten Abend"
      }
    };
  
    // Determine the greeting based on the hour
    let greeting = "";
    if (currentHour >= 6 && currentHour < 12) {
      greeting = greetings[savedLanguage].morning;
    } else if (currentHour >= 12 && currentHour < 18) {
      greeting = greetings[savedLanguage].afternoon;
    } else {
      greeting = greetings[savedLanguage].evening;
    }
  
    // Update the paragraph with the appropriate greeting in the selected language
    paragraph.textContent = greeting;
  }
  
    
    // Call the function immediately to set the greeting
    updateGreeting();
    setInterval(updateGreeting, 60000);

     // Set a timeout to hide the loading screen after 3 seconds (3000 ms)
window.addEventListener("load", function () {
    setTimeout(function () {
      document.getElementById("loading-screen").style.display = "none";
      document.getElementById("main-content").style.display = "block";
      document.body.classList.remove("loading");
    }, 3000); // 3000 ms = 3 seconds
  });


  // Get all the navigation links
const navLinks = document.querySelectorAll('.navlink');

// Add event listener to each link
navLinks.forEach(link => {
  link.addEventListener('click', () => {
    // Remove the active class from all links
    navLinks.forEach(link => link.classList.remove('active'));
    
    // Add the active class to the clicked link
    link.classList.add('active');
  });
});

fetch('base.php')
.then(response => response.json())  // Parse the JSON response
.then(data => {
    // Select the container element where flights will be displayed
    const flightsContainer = document.querySelector('.flights');
    
    // Loop through the flight data and create HTML for each flight
    data.forEach(flight => {
        const flightElement = document.createElement('div');
        flightElement.classList.add('flight');
        
        flightElement.innerHTML = `
          
            <div class="flight__header">
            <p>
              <i class="fa-solid fa-plane" id="col" style="color:#727171; position:absolute; left:-30px; top: 1px;"></i>
            </p>
            <div style="display:flex; gap:1rem; align-items:center;">
              <p>${flight.departureAirport}</p>
              <img src="arrow-right-long.svg" style="height:40px; width:200px"/>
              <p>${flight.arrivalAirport}</p>
            </div>
            <p style="margin-left: auto">${flight.airline}</p>
          </div>
          <div class="flight__main">
            <div class="info">
              <p>${new Date(flight.scheduledDeparture).toLocaleDateString()}</p> <!-- Converts to local date format -->
              <p>${flight.departureAirport}</p>
              <p style="color:#727171">${flight.departureAirport}</p>
              <time style="font-size:24px; font-weight: 700; color:black;">${new Date(flight.scheduledDeparture).toLocaleTimeString()}</time>
            </div>
            <div style="text-align:center; display:grid">
              <time>${new Date(flight.scheduledDeparture).toLocaleTimeString()}</time>
              <img src="arrow-right-long.svg" style="height:50px; width:50px"/>
            </div>
            <div class="info">
              <p>${new Date(flight.arrivalScheduledTime).toLocaleDateString()}</p> <!-- Converts to local date format -->
              <p>${flight.arrivalAirport}</p>
              <p style="color:#727171">${flight.arrivalAirport}</p>
              <time style="font-size:24px; font-weight: 700; color:black;">${new Date(flight.arrivalScheduledTime).toLocaleTimeString()}</time>
            </div>
            <div style="align-self:end">
              <p style="color:#FF7100">Price starts from 50</p> <!-- Replace this with a dynamic price if available -->
              <p>Operated by ${flight.airline}</p>
            </div>
          </div>
        `;
        
        // Append the flight data to the container
        flightsContainer.appendChild(flightElement);
    });
})
.catch(error => {
    console.error('Error fetching flight data:', error);
});