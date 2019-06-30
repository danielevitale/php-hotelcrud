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
// i dati nel form della pagina create.php
if(empty($_GET)) {
  echo "Si è verificato un errore";
  exit();
}

// Leggo i parametri inviati dal form della pagina create.php
$room_number = $_GET['numero_stanza'];
$floor = intval($_GET['piano']);
$beds = intval($_GET['numero_letti']);

// Effettuo la query per inserire i dati della nuova stanza
$sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($room_number, $floor, $beds, NOW(), NOW())";
$result = $conn->query($sql);
?>

<?php
include 'partial_php/_head.php';
include 'partial_php/_header.php';
?>

<?php
if ($result) {
?>
  <!-- All'utente compare il messaggio Stanza inserita -->
  <h1>Stanza inserita</h1>
  <a href="index.php">Torna alle stanze</a>
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
