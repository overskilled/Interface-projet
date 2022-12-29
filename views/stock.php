<?php
    include_once 'Header.php';
    include_once '..\includes\db.inc.php';
    session_start();
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
    $stmt        = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql_request)) {
      header("location: ../stock.php?error=statement failed");
      exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
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
    mysqli_stmt_close($stmt);
    ?>
</div>
  </tbody>
</table>

