<?php

require_once('includes/app.php');

$database = new Dbh();
$db = $database->connect();

// $products = new Post($db);

if (isset($_POST['submit'])) {

    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();
    
    // $products->insertData();

}

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <!-- <script type="text/javascript">
        // user have to use id for form and call validate method
        $(document).ready(function() {
$("#product_form").validate({
  messages : {
sku: {
  required: "Please, enter valid SKU"
},
name: {
required: "Please, enter product name",
},
price: {
required: "Please, enter price"
},
size: {
required: "Please, provide the size of the DVD"
},
weight: {
required: "Please, provide the weight"
},
height: {
required: "Please, provide the required dimension"
},
length: {
required: "Please, provide the required dimension"
},
width: {
required: "Please, provide the required dimension"
}
}
});
});
    </script> -->
</head>

<body>
  <header>
    <h2>Product List</h2>
    <nav>
    <button type="submit" name="submit" value='save' form="product_form">SAVE</button>
     <button id="cancelBtn" action="action" type="button" value="Cancel" onclick="history.back();" > CANCEL</button>
    </nav>
  </header>

  <section class="product-form">
    <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="POST" id="product_form" name="product_form" >
      <div class="input-data">
        <label id="sku-label" for="sku">SKU</label>
        <input type="text" name="sku" id="sku" class="form-control" placeholder="#sku" value="<?php echo htmlspecialchars($_POST['sku']) ?? '' ?>"/>
        <div class="error">
          <?php echo $errors['sku'] ?? '' ?>
        </div>
      </div>
      <div class="input-data">
        <label id="name-label" for="name">Name </label>
        <input type="text" name="name" id="name" class="form-control" placeholder="#name" value="<?php echo htmlspecialchars($_POST['name']) ?? '' ?>" />
      </div>
      <div class="input-data">
        <label id="price-label" for="price">Price ($)</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="#price" value="<?php echo htmlspecialchars($_POST['price']) ?? '' ?>" />
      </div>

      <div class="input-switcher">
        <label for="productType">Type Switcher</label>
        <select id="productType" name="productType" onchange="selectChanged()">
          <option value="" style="visibility: hidden;">Please select</option>
          <option value="dvd">DVD</option>
          <option value="book">Book</option>
          <option value="furniture">Furniture</option>
        </select>
      </div>
      <div id="dvd">
        <div class="data-input product">
          <label for="size">Size (MB):</label>
          <input type="number" id="size" name="size"  class="form-control " value="<?php echo htmlspecialchars($_POST['size']) ?? '' ?>">
          <p class="describe">Please provide size in (MB)</p>
        </div>
      </div>

      <div id="book">
        <div class="data-input product">
          <label for="weight">Weight (KG):</label>
          <input type="number" id="weight" name="weight" class="form-control " value="<?php echo htmlspecialchars($_POST['weight']) ?? '' ?>">
          <p class="describe">Please provide weight in KG</p>
        </div>

      </div>

      <div id="furniture">
        <div class="data-input product">
          <label for="height">Height (CM):</label>
          <input type="number" id="height" name="height" class="form-control " value="<?php echo htmlspecialchars($_POST['height']) ?? '' ?>">
          <p class="describe">Please provide measurements in (CM)</p>
        </div>
        <div class="data-input product">
          <label for="length">Length (CM):</label>
          <input type="number" id="length" name="length" class="form-control" value="<?php echo htmlspecialchars($_POST['length']) ?? '' ?>">
          <p class="describe">Please provide measurements in (CM)</p>
        </div>
        <div class="data-input product">
          <label for="width">Width (CM):</label>
          <input type="number" id="width" name="width" class="form-control " value="<?php echo htmlspecialchars($_POST['width']) ?? '' ?>">
          <p class="describe">Please provide measurements in (CM)</p>
        </div>

      </div>
     
    </form>

  </section>

  <footer>
    <h2>Scandiweb Test Assignement</h2>
  </footer>

  <script src="js/main.js"></script>

</body>

</html>