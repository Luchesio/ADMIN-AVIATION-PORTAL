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
