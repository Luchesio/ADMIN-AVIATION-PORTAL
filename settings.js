// settings.js

document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("themeToggle");
    const languageSelect = document.getElementById("languageSelect");
  
    // Apply saved settings on load
    const savedTheme = localStorage.getItem("theme");
    const savedLanguage = localStorage.getItem("language");
  
    if (savedTheme === "dark") {
      document.body.classList.add("dark-mode");
      themeToggle.checked = true;
    }
  
    if (savedLanguage) {
      languageSelect.value = savedLanguage;
      applyLanguage(savedLanguage);
    }
  
    // Toggle dark mode
    themeToggle.addEventListener("change", () => {
      if (themeToggle.checked) {
        document.body.classList.add("dark-mode");
        localStorage.setItem("theme", "dark");
      } else {
        document.body.classList.remove("dark-mode");
        localStorage.setItem("theme", "light");
      }
    });
  
    // Change language
    languageSelect.addEventListener("change", (event) => {
      const selectedLanguage = event.target.value;
      localStorage.setItem("language", selectedLanguage);
      applyLanguage(selectedLanguage);
    });
  
    // Function to apply selected language
    function applyLanguage(language) {
      const translations = {
        en: {
          settings: "Settings",
          appearance: "Appearance",
          darkMode: "Dark Mode:",
          language: "Select Language:",
        },
        es: {
          settings: "Configuraciones",
          appearance: "Apariencia",
          darkMode: "Modo Oscuro:",
          language: "Seleccionar Idioma:",
        },
        fr: {
          settings: "Paramètres",
          appearance: "Apparence",
          darkMode: "Mode Sombre:",
          language: "Choisir la Langue:",
        },
        de: {
          settings: "Einstellungen",
          appearance: "Aussehen",
          darkMode: "Dunkler Modus:",
          language: "Sprache Wählen:",
        },
      };
  
      const elements = {
        title: document.querySelector("h1"),
        appearance: document.querySelector(".settings-section:nth-of-type(1) h2"),
        darkMode: document.querySelector("label[for='themeToggle']"),
        language: document.querySelector("label[for='languageSelect']"),
      };
  
      const translation = translations[language];
      if (translation) {
        elements.title.textContent = translation.settings;
        elements.appearance.textContent = translation.appearance;
        elements.darkMode.textContent = translation.darkMode;
        elements.language.textContent = translation.language;
      }
    }
  });
  

  // Add this to the existing settings.js
languageSelect.addEventListener("change", (event) => {
    const selectedLanguage = event.target.value;
    localStorage.setItem("language", selectedLanguage);
  
    // Optional: Reload page to immediately reflect language changes
    location.reload();
  });

  // Set a timeout to hide the loading screen after 3 seconds (3000 ms)
window.addEventListener("load", function () {
  setTimeout(function () {
    document.getElementById("loading-screen").style.display = "none";
    document.getElementById("main-content").style.display = "block";
    document.body.classList.remove("loading");
  }, 3000); // 3000 ms = 3 seconds
});
  