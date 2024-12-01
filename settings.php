<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <nav>
      
    </nav>

    <div class="content">
      <h1>Settings</h1>
      <form>
        <label for="theme">Theme:</label>
        <select id="theme">
          <option value="light">Light</option>
          <option value="dark">Dark</option></select
        ><br /><br />

        <label for="language">Language:</label>
        <select id="language">
          <option value="en">English</option>
          <option value="fr">French</option></select
        ><br /><br />

        <button type="button" onclick="saveSettings()">Save</button>
      </form>
    </div>

    <script>
      function saveSettings() {
        alert("Settings saved!");
      }
    </script>
  </body>
</html> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
    <link rel="stylesheet" href="settings.css" />
    <script src="language.js" defer></script>
  </head>
  <body>
  
    <div style="width:150px;height:35px;display:flex;justify-content:space-between;margin-bottom:100px;margin-top:80px;margin-left:100px;">
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
            <a href="settings.php"
              ><p style="color: rgb(37, 85, 37); font-size: 1em; font-weight: 600" >
                Settings
              </p></a
            >
</div>
      <div class="settings-container">
        <h1>Settings</h1>

        <section class="settings-section">
          <h2>Appearance</h2>
          <div class="toggle-group">
            <label for="themeToggle">Dark Mode:</label>
            <input type="checkbox" id="themeToggle" />
          </div>
        </section>

        <section class="settings-section">
          <h2>Language</h2>
          <div class="language-group">
            <label for="languageSelect">Select Language:</label>
            <select id="languageSelect">
              <option value="en">English</option>
              <option value="es">Spanish</option>
              <option value="fr">French</option>
              <option value="de">German</option>
            </select>
          </div>
        </section>
      </div>
    

    <script src="settings.js"></script>
  </body>
</html>
