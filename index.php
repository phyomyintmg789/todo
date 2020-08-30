<?php
require "config.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
    <?php
$pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC ");
$pdostatement -> execute();
$result = $pdostatement->FetchAll();
     ?>
    <div class="card">
      <div class="card-body">
        <div class="">
            <a type="button" class="btn btn-success" href="add.php">Create New</a>
        </div><br>

        <h2> Todo Home Page</h2>
        <table class="table table-stripted">
          <thead>
            <tr>
              <td>ID</td>
              <td>Title</td>
              <td>Descption</td>
              <td>Created</td>
              <td> Action</td>

            </tr>
          </thead>
          <tbody>
            <?php
          $i = 1;
if ($result) {
  foreach ($result as $value) {
  ?>  <tr>

      <td><?php echo $i; ?></td>
      <td><?php echo $value['title'] ?></td>
      <td><?php echo $value['description'] ?></td>
      <td><?php echo date('Y-m-d',strtotime( $value['created_at'])) ?></td>
      <td>
<a type="buttton"class="btn btn-warning" href="edit.php?id=<?php echo $value['id']; ?>">Edit</a>
<a type="buttton"class="btn btn-danger" href="delete.php?id=<?php echo $value['id'];?>"> Delete </a>
      </td>
    </tr>
    <?php
$i++;
   }
}
             ?>

          </tbody>
        </table>

      </div>

    </div>
  </body>
</html>
