
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
    
  <?php

  require('includes/app.php');

  $database = new Dbh();
  $db = $database->connect();

  $products = new Post($db);


//  echo  $products->read() . PHP_EOL;
//  echo implode(',', $products->getAttributes()) . PHP_EOL;

    foreach($products->read() as $product) {

//        var_dump($products->read());
    echo "<table>";
    echo        "<tbody>";
    echo         "<tr class='content'>";
    echo          "<th> <input type='checkbox' name='checkbox[]'> </th>";
    echo            "<td style='visibility: hidden'></td>";
    echo            "<td>" . implode(',', $products->getAttributes())."</td>";
//    echo            "<td>" . $product->getName() . "</td>";
//    echo            "<td>" . $product->getPrice() . "$</td>";
//    echo            "<td>"  .  $product->getproductType() ."</td>";

    echo           "</tr>";
    echo        "</tbody>";
    echo      "</table>";

   }
      ?>
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