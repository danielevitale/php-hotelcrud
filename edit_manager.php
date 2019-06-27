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
$room_number = $_get['numero_stanza'];
$floor = intval($_get['piano']);
$beds = intval($_get['numero_letti']);

var_dump($beds);
var_dump($floor);


$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id_stanza";
$result = $conn->query($sql);
?>

<?php
include 'partial_php/_head.php';
include 'partial_php/_header.php';
?>

<h1>Modifica effettuata</h1>

<?php
$conn->close();
?>


</body>
</html>
