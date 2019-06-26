


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="public/css/app.css">

  </head>
  <body>

    <div class="container">
      <div class="container_title">
        <h1>Stanze Hotel Boolean</h1>
      </div>

      <div class="container_stanze">

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "hotel";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn && $conn->connect_error) {
            echo ("Connection failed: " . $conn->connect_error);
            exit();
        }

        $sql = "SELECT room_number, floor FROM stanze";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
        ?>
            <table>
            <tr>
              <th>Stanza numero</th>
              <th>Piano</th>
            </tr>
            <tr>
              <td><?php echo $row['room_number']?></td>
              <td><?php echo $row['floor']?></td>
            </tr>
            </table>
        <?php
          }
        } elseif ($result) {
            echo "0 results";
          } else {
              echo "query error";
            }

        $conn->close();
      ?>
    </div>

    </div>


  </body>
</html>
