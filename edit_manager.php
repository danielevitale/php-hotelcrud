<?php
include 'db_config.php';

// Connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Controllo esito connessione
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

// Verifico che la get non sia vuota e che quindi l'utente non sia entrato nella pagine senza aver inserito
// i dati nel form della pagina edit.php
if(empty($_GET)) {
  echo "si è verificato un errore";
  exit();
}

// Leggo i parametri inviati dal form della pagina edit.php
$id_stanza = intval($_GET['id']);
$room_number = $_GET['numero_stanza'];
$floor = intval($_GET['piano']);
$beds = intval($_GET['numero_letti']);

// Effettuo la query per modificare i dati della stanza che ha quel id
$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id_stanza";
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
  <h1>Modifica effettuata</h1>
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
