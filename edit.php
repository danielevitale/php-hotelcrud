<?php
include 'db_config.php';

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Controllo esito connessione
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

$id_stanza = intval($_GET['id']);

$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);
?>

<?php
include 'partial_php/_head.php';
include 'partial_php/_header.php';
?>


    <?php
    if ($result && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
    ?>
    <div class="container_modifiche">
      <h2>Modifica stanza</h2>
      <form class="" action="edit_manager.php" method="get">
        <label for="numero_stanza">Numero stanza</label>
        <input type="text" name="numero_stanza" value="<?php echo $row['room_number']?>">
        <label for="piano">Piano</label>
        <input type="number" name="piano" value="<?php echo $row['floor']?>">
        <label for="numero_letti">Numero letti</label>
        <input type="number" name="numero_letti" value="<?php echo $row['beds']?>">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="submit" value="Salva">
      </form>
    </div>

    <?php
      }
    } elseif ($result) {
        echo "0 results";
      } else {
          echo "query error";
        }
    ?>

    <?php
    $conn->close();
    ?>


  </body>
</html>
