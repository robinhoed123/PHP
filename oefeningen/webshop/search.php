<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "webshop");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = $_POST['query'];
$sql = "SELECT product_id, naam, beschrijving, gewicht, vissoort, prijs, voorraad, foto FROM product WHERE naam LIKE '%" . mysqli_real_escape_string($link, $query) . "%'";
$result = mysqli_query($link, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<li>
                <div class="item">
                    <img src="' . htmlspecialchars($row['foto']) . '" alt="foto van vis">
                    <p><span class="selector">Naam: </span>' . htmlspecialchars($row['naam']) . ' <span class="selector">Gewicht: </span>' . htmlspecialchars($row['gewicht']) . ' gram</p>
                    <p><span class="selector">Beschrijving: </span>' . htmlspecialchars($row['beschrijving']) . '</p>
                    <div class="aankoop">
                        <p><span class="selector">Prijs: </span>' . htmlspecialchars($row['prijs']) . ' €</p>
                        <form action="home.php" method="post">';
        if (isset($_SESSION['id'])) {
            if ($_SESSION['admin'] == 1 && isset($_GET['id'])) {
                echo '<button type="button" onclick="location.href=\'Editproduckt.php?id=' . htmlspecialchars($row['product_id']) . '\'">Wijzig</button>';
            } else {
                $index = array_search($row['product_id'], $_SESSION['vis']);
                $max = $index !== false ? htmlspecialchars($row['voorraad'] - $_SESSION['aantal'][$index]) : htmlspecialchars($row['voorraad']);
                echo '<label for="aantal">Aantal:</label>
                      <input type="number" id="aantal" name="aantal" min="1" max="' . $max . '" required>
                      <input type="hidden" name="product_id" value="' . htmlspecialchars($row['product_id']) . '">
                      <button type="submit">Toevoegen</button>';
            }
        }
        echo '      </form>
                    </div>
                </div>
            </li>';
    }
} else {
    echo "Error: " . mysqli_error($link);
}
mysqli_close($link);
?>