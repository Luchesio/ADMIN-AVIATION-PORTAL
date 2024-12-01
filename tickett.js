var tap = document.querySelector("#tap"); // Ensure this selects the correct element
var menuu = document.querySelector(".menu");

tap.addEventListener("click", (event) => {
  menuu.classList.toggle("activee");
});


var btnn = document.querySelector(".btn");
var pop = document.querySelector(".popup");
var closeBtn = document.querySelector(".close-btn"); // Select the close button
var body = document.body; // Reference to the body


btnn.addEventListener("click", () => {
    pop.classList.add("active");
    body.classList.add("blur"); // Add blur class to body
});

closeBtn.addEventListener("click", () => {
    pop.classList.remove("active");
    body.classList.remove("blur"); // Remove blur class from body
});

// Toggle the menu when the Flights link is clicked
tap.addEventListener("click", (event) => {
    menuu.classList.toggle("activee");
});



$(document).ready(function() {
  $('.cancel-btn').click(function() {
      var ticketId = $(this).data('id');
      var row = $('#ticket-' + ticketId); // Get the row to remove

      $.ajax({
          type: 'POST',
          url: 'cancel_ticket.php',
          data: { ticket_id: ticketId },
          success: function(response) {
              var result = JSON.parse(response);
              if (result.success) {
                  row.remove(); // Remove the row from the DOM
              } else {
                  alert('Error: ' + result.error);
              }
          },
          error: function() {
              alert('An error occurred while processing your request.');
          }
      });
  });
});




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


