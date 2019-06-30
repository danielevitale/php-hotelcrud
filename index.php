<?php
include 'db_config.php';

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Controllo esito connessione
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

// Effettuo la query per ottenere tutte le stanze del db
$sql = "SELECT room_number, id FROM stanze";
$result = $conn->query($sql);
?>

<?php
include 'partial_php/_head.php';
include 'partial_php/_header.php';
?>
  <!-- Creo il container che contiene il numero delle stanze e le varie opzioni per gestirle -->
  <div class="container">
    <a id="crea" href="create.php">Crea una nuova stanza</a>
    <div class="container_stanze">
      <?php
      // Controllo che la query inserita sia giusta e che abbia restituito almeno una riga di risultati
      if ($result && $result->num_rows > 0) {
        // Stampo i risultati della query
        while($row = $result->fetch_assoc()) {
      ?>
        <div class="stanze">
          <h2>Stanza numero: <span><?php echo $row['room_number']?></span> </h2>
          <!-- Nei 3 link dei 3 buttons inserisco il file di riferimento e l'id di quella stanza -->
          <a type="button" href="show.php?id=<?php echo $row['id'] ?>">Visualizza</a>
          <a type="button" href="edit.php?id=<?php echo $row['id'] ?>">Modifica</a>
          <a type="button" href="delete.php?id=<?php echo $row['id'] ?>">Cancella</a>
        </div>
      <?php
        }
      } elseif ($result) {
          echo "0 results";
        } else {
            echo "query error";
          }
      ?>
    </div>
  </div>

  <?php
  $conn->close();
  ?>


  </body>
</html>
