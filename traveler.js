  // Set a timeout to hide the loading screen after 3 seconds (3000 ms)
  window.addEventListener("load", function () {
    setTimeout(function () {
      document.getElementById("loading-screen").style.display = "none";
      document.getElementById("main-content").style.display = "block";
      document.body.classList.remove("loading");
    }, 3000); // 3000 ms = 3 seconds
  });