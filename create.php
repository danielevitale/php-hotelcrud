<?php
include 'partial_php/_head.php';
include 'partial_php/_header.php';
?>

<div class="container_modifiche">
  <h2>Crea stanza</h2>
  <!-- Form che consente all'utente di inserire i dati di una nuova stanza -->
  <form class="" action="create_manager.php" method="get">
    <label for="numero_stanza">Numero stanza</label>
    <input type="text" name="numero_stanza" value="">
    <label for="piano">Piano</label>
    <input type="number" name="piano" value="">
    <label for="numero_letti">Numero letti</label>
    <input type="number" name="numero_letti" value="">
    <input type="submit" value="Salva">
  </form>
</div>
<a href="index.php">Torna alle stanze</a>
