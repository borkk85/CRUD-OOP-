<?php
include('includes/app.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style/normalize.css" />
  <link rel="stylesheet" href="style/style.css" />
</head>

<body>
  <header>
    <h2>Product List</h2>
    <nav>
      <button class="add-btn" id="addBtn">ADD</button>
      <button class="mass-btn" type="submit" id="deleteBtn" form="delete_form" name="delete" value="delete">MASS DELETE</button>
    </nav>
  </header>
  <section class="product-list-wrapper">
  <form method="POST" action="delete.php" id="delete_form">
    
  <?php $database = new Dbh(); 
  $db = $database->connect(); 
  $posts = new ProductShow($db);
  $posts->ShowAllProducts(); ?>

  <!-- <?php foreach($posts->read() as $product) : ?>

    <table>
            <tbody>
              <tr class="content">
                <th> <input type="checkbox" name="checkbox[]" value="<?= $product['id'] ?>"> </th>
                <td style="visibility: hidden"><?= $product['id'] ?></td>
                <td><?= $product['SKU'] ?></td>
                <td><?= $product['Name'] ?></td>
                <td><?= $product['Price'] ?>$</td>
                  <td> Size: <?= $product['getAttributes'] ?> MB </td>
                  <td> Weight: <?= $product['getAttributes'] ?> KG </td>
                  <td> Dimensions: <?= $product['getAttributes'] ?> x <?= $product['Length'] ?> x <?= $product['Width'] ?> CM </td>
               </tr>
            </tbody>
          </table>

    <?php endforeach; ?> -->
  </form>
  </section>
  <footer class="footer-wrap">
    <div class="footer">
      <h2>Scandiweb Test Assignement</h2>
    </div>
  </footer>
  <script src="js/main.js"></script>
</body>

</html>