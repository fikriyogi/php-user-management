<?php
  include 'core/db_connect.php';
  if (isset($_GET['offset']) && isset($_GET['limit'])) {
      $offset = $_GET['offset'];
      $limit = $_GET['limit'];
      $data = mysqli_query($connect, "SELECT * FROM mhsasia LIMIT {$limit} OFFSET {$offset}");
      while($row = mysqli_fetch_array($data)){
        echo "<div class='w3-card-4' >
              <header class='w3-container w3-blue'>
                <a href='".$row['no_kk']."' title='".$row['nama']."'><h1>".$row['nama']."</h1></a>
              </header>
              <div class='w3-container'>
                <h1>".$row['nik']."</h1>  </div>
            </div><br><br>
";
      }
  }
 ?>