<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="contactformulier.css">
   
    
    <title>Robin Herickx</title>
    <body>
        <div class="wrapper"> 
          <div class="menu">
            <ul class="menu-bar">
            <?php include 'menubalk.php'; ?>
            </ul>
          </div>
       
            <!-- Video achtergrond -->
    <video autoplay muted loop class="Video">
      <source src="Aquarium.mp4" type="video/mp4">
      Je browser ondersteunt geen HTML5 video.
  </video>
          <!-- Inhoud -->
          <h1 class="title">contact formulier</h1>
          <div class="card">
          <form id="contactForm" action="mailto:r0983377@student.thomasore.be" method="post" enctype="text/plain">
            <p class="voornaam">Voornaam: <input type="text" id="voornaam" name="voornaam"></p>
            <p class="achternaam">Achternaam: <input type="text" id="achternaam" name="achternaam"></p>
            <p class="email">Email: <input type="text" id="email" name="email"></p>
            <p class="bericht">Bericht: <textarea id="bericht" name="bericht"></textarea></p>
            <p class="caracter" id="caracters">0/200</p>
            <div class="knop">
                <input type="submit" value="Verzend">
                <input type="reset" value="Reset">
            </div>
        </form>
        </div>
        <script src="validation.js"></script>
      </div>
    </div>
  </body>
  <footer>
    <p>Copyright © Thomas More Mechelen-Antwerpen vzw - Campus De Nayer - Professionele bachelor elektronica-ict – 2025</p>
</footer>
