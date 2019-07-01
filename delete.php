<?php
include 'db_config.php';

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Controllo esito connessione
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

// Leggo l'id della stanza che l'utente ha scelto di cancellare
$id_stanza = intval($_GET['id']);

// Effettuo la query per cancellare la stanza che ha quel id
$sql = "DELETE FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);
?>

<?php
include 'partial_php/_head.php';
include 'partial_php/_header.php';
?>

    <?php
    if ($result) {
    ?>
    <!-- All'utente compare il messaggio modifica effettuata -->
      <h1>Cancellazione effettuata</h1>
      <a id="crea" href="index.php">Torna alle stanze</a>
    <?php
    }else {
    ?>
      <h1>Si è verificato un errore</h1>
    <?php
     }
    ?>

    <?php
    $conn->close();
    ?>

  </body>
</html>
