<?php
include 'db_config.php';

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Controllo esito connessione
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

$id_stanza = $_GET['id'];

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

    <div class="stanza">
      <h1>Stanza numero: <span><?php echo $row['room_number']?></span> </h1>
      <h2>id: <span><?php echo $row['id']?></span> </h2>
      <h2>Piano: <span><?php echo $row['floor']?></span> </h2>
      <h2>Letti: <span><?php echo $row['beds']?></span> </h2>
      <h2>Created at: <span><?php echo $row['created_at']?></span> </h2>
      <h2>Updated at: <span><?php echo $row['updated_at']?></span> </h2>
    </div>

    <a href="index.php">Torna alle stanze</a>


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
