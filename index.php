      <?php

      require('includes/app.php');

      $database = new Dbh();
      $db = $database->connect();

      $post = new Post($db);
      $products = $post->read();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/normalize.css" />
</head>

<body>
  <header>
    <h2>Product List</h2>
    <nav>
      <button class="add-btn" id="addBtn"><span>ADD</span></button>
      <button class="mass-btn" type="submit" id="deleteBtn" form="delete_form" name="delete" value="delete" onclick="checkSelected();"><span>MASS DELETE</span></button>
    </nav>
  </header>
  <section class="product-list-wrapper">
       
    
<form method="POST" action="delete.php" id="delete_form">
    <?php foreach ($products as $product) : ?>
      <table>
      
        <tbody>
             
          <tr class='content'>
             
            <th>
             <input type='checkbox' class='delete-checkbox' name='checkbox[]' value="<?= $product->getId() ?>">
            </th>
            <td> <?= $product->getSku() ?> </td>
            <td> <?=  $product->getName() ?> </td>
            <td> <?=  $product->getPrice() ?> </td>
            <td> <?= implode(', ', $product->getAdditionalProperties()) ?> </td>
          </tr>
            
        </tbody>
       
      </table>
 <?php endforeach; ?>
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
