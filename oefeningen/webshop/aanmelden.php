<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Robin Herickx</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="aanmelden.css">
    <script src="aanmelden.js"></script>
</head>

<body>
    <!-- Video achtergrond -->
    <video autoplay muted loop class="Video">
        <source src="Aquarium.mp4" type="video/mp4">
        Je browser ondersteunt geen HTML5 video.
    </video>

    <!-- Wrapper voor inhoud en menu -->
    <div class="wrapper">
        <div class="menu">
            <ul class="menu-bar">
            <?php include 'menubalk.php'; ?>
            </ul>
        </div>
   
    <!-- Hoofdinhoud -->
    <div id="kies">
        <button class="kies" onclick="showDiv('inloggen')">aanmelden</button>
        <button class="kies" onclick="showDiv('aanmaken')">acount aanmaken</button>
    </div>
    <div id="inloggen" style="display:none;">
        <h1 class="title">log in</h1>
        <div class="card">
        <form name="loginForm" action="login_process.php" method="post" onsubmit="validateLoginForm(event)" onreset="confirmReset(event)">
        <p class="email">Email: <input type="text" name="email" required></p>
          <p class="wachtwoord">Wachtwoord: <input type="password" name="wachtwoord" required></p>
          <div class="knop">
              <input type="submit" value="Verzend">
              <input type="reset" value="Reset">
          </div>
      </form>
      </div>
    </div>
   
    <div id="aanmaken" style="display:none;">
        <h1 class="title">acount aanmaken</h1>
        <div class="card">
        <form name="createAccountForm" action="CreatAcount.php" method="post" onsubmit="validateCreateAccountForm(event)" onreset="confirmReset(event)">
        <p class="voornaam">Voornaam: <input type="text" name="voornaam" required></p>
        <p class="achternaam">Achternaam: <input type="text" name="achternaam" required></p>
        <p class="adres">Adres: <input type="text" name="adres" required></p>
        <p class="email">Email: <input type="email" name="email" required></p>
        <p class="wachtwoord">Wachtwoord: <input type="password" name="wachtwoord" required></p>
        <p class="bevestig-wachtwoord">Bevestig Wachtwoord: <input type="password" name="bevestig-wachtwoord" required></p>
          <div class="knop">
              <input type="submit" value="Verzend">
              <input type="reset" value="Reset">
          </div>
      </form>
      </div>
    </div>
</div>
</body>
</html>
