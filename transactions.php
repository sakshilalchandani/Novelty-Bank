<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>History</title>
  </head>
  <body>
    <?php require 'common_files/_nav.php'; ?>


<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>



<?php
    require 'common_files/_dbconnect.php';

    //1
    $sql1 = "select * from transactions ORDER BY date DESC";
    $sql_execute = mysqli_query($con, $sql1);

    echo "<div class='container'>
    <table class='table table-hover'>
    <thead>
      <tr>
        <th scope='col'>Sender</th>
        <th scope='col'>Receiver</th>
        <th scope='col'>Amount Sent</th>
        <th scope='col'>Date of Transaction</th>
      </tr>
    </thead>
    <tbody>";

    while($row=mysqli_fetch_assoc($sql_execute)){
      echo "<tr>";
      echo "<td>" . $row['Sender'] . "</td>";
      echo "<td>" . $row['Receiver'] . "</td>";
      echo "<td>" . $row['Money'] . "</td>";
      $date_time = $row['Date'];
      $only_date = date("d-m-Y",strtotime($date_time));
      echo "<td>" . $only_date . "</td>";

      echo "</tr>";
    }
    echo "</tbody>
    </table>";

?>


<?php
//1                   KEY HIGHLIGHT ---> $sql1 = ORDER BY DESC  !!!!!!!!


?>