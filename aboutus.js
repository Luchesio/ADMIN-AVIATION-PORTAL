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


// Wait for DOM to load
document.addEventListener("DOMContentLoaded", () => {
    const leftCol = document.querySelector(".col-6:first-child"); // Select the first column
    const rightCol = document.querySelector(".col-6:last-child"); // Select the second column

    const observerOptions = {
        root: null, // Use the viewport as the root
        threshold: 0.1, // Trigger when 10% of the element is visible
    };

    const observerCallback = (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("slide-in-visible");
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Add slide-in classes and observe
    leftCol.classList.add("slide-in-left");
    rightCol.classList.add("slide-in-right");

    observer.observe(leftCol);
    observer.observe(rightCol);
});



const emailInput = document.getElementById("email");
  const emailError = document.getElementById("emailError");
  const form = document.getElementById("emailForm");

  form.addEventListener("submit", (e) => {
    // Prevent form submission if email is invalid
    if (!emailInput.checkValidity()) {
      e.preventDefault(); // Stop form submission
      emailError.style.display = "block"; // Show error message
    } else {
      emailError.style.display = "none"; // Hide error message
    }
  });

  emailInput.addEventListener("input", () => {
    // Hide error message as user types
    emailError.style.display = emailInput.checkValidity() ? "none" : "block";
  });