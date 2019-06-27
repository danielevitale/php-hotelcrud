<?php
include 'db_config.php';

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Controllo esito connessione
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

$sql = "SELECT room_number, id FROM stanze";
$result = $conn->query($sql);
?>

<?php
include 'partial_php/_head.php';
include 'partial_php/_header.php';
?>

  <div class="container">
    <div class="container_stanze">
      <?php
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
      ?>
        <div class="stanze">
          <h2>Stanza numero: <span><?php echo $row['room_number']?></span> </h2>
          <a type="button" href="show.php?id=<?php echo $row['id'] ?>">Visualizza</a>
          <a type="button" href="edit.php?id=<?php echo $row['id'] ?>">Modifica</a>
          <a type="button" href="#">Cancella</a>
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
