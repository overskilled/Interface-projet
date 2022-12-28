<?php
    include_once 'Header.php';
    include_once 'includes/db.inc.php';
?>
<div class="container my-5">
  <table class="table table-striped table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Unit price</th>
      <th scope="col">Quatity</th>
      <th scope="col">Category</th>
    </tr>
  </thead>

  <tbody>
   
    <?php
    $sql_request = "SELECT * FROM article;";
    $result      = mysqli_query($connect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
      $id       = $row['Id'];
      $name     = $row['Article Name'];
      $price    = $row['Unit Price'];
      $quantity = $row['Quantity'];
      $category = $row['Category'];
      echo ' <tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$price.'</td>
      <td>'.$quantity.'</td>
      <td>'.$category.'</td>
    </tr>';
    }
    ?>
</div>

    <!--
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>-->
  </tbody>
</table>

