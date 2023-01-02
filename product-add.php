<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
// session_start();
require_once('includes/app.php');

$database = new Dbh();
$db = $database->connect();
$product = new Post($db);

if ($_SERVER["REQUEST_METHOD"] === "POST" ) {
  if (isset($_POST['save'])) {

    error_log('Form submitted');
    // var_dump($_POST);
    // error_log(var_export($_POST, true));
    // $data = $_POST;
    // $errors = array();
   
    $product->sku = $_POST['sku'];
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->productType = $_POST['productType'];
    $product->size = $_POST['size'];
    $product->weight = $_POST['weight'];
    $product->height = $_POST['height'];
    $product->width = $_POST['width'];
    $product->length =  $_POST['length'];

    $validation = new UserValidator($product);
    error_log(var_export($validation, true));
    $errors = $validation->validateForm();
    error_log(var_export($errors, true));
    if (empty($errors)) {
      unset($_POST['save']);
      $success = $product->insert($_POST);

      if ($success) {
          // Redirect to the form page and set a success message in the session
          $_SESSION['success'] = 'Product added successfully';
          header('Location: index.php');
          exit;
      } else {
          // Add the error messages from the insert method to the errors array
          $errors = array_merge($errors, $product->errors);
      }
  }
    
  } 
  
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

</head>

<body>
  <header>
    <h2>Product List</h2>
    <nav>
      <button class="save_btn" type="submit" name="save" value='save' form="product_form"><span>SAVE</span></button>
      <button class="canc_btn" id="cancelBtn" action="action" type="button" value="Cancel" onclick="location.href='index.php'"><span>CANCEL</span></button>
    </nav>
  </header>

  <section class="product-form">

    <form action='product-add.php' method="post" id="product_form" name="product_form">

      <div class="input-data">
        <label id="sku-label" for="sku">SKU</label>
        <input type="text" name="sku" id="sku" class="form-control" placeholder="#sku">
        <div id="sku-error" style="display: <?= isset($errors['sku']) ? 'block' : 'none' ?>">
          <?= htmlentities($errors['sku'] ?? '') ?>
        </div>
      </div>
      <div class="input-data">
        <label id="name-label" for="name">Name </label>
        <input type="text" name="name" id="name" class="form-control" placeholder="#name"/>
        <div id="sku-error" style="display: <?= isset($errors['name']) ? 'block' : 'none' ?>">
          <?= htmlentities($errors['name'] ?? '') ?>
        </div>

      </div>
      <div class="input-data">
        <label id="price-label" for="price">Price ($)</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="#price"  />
        <div id="sku-error" style="display: <?= isset($errors['price']) ? 'block' : 'none' ?>">
          <?= isset($errors['price']) ? htmlentities($errors['price']) : '' ?>
        </div>

      </div>

      <div class="input-switcher">
        <label for="productType">Type Switcher</label>
        <select id="productType" name="productType" onchange="selectChanged()">
          <option value="">Please select</option>
          <option value="dvd">DVD</option>
          <option value="book">Book</option>
          <option value="furniture">Furniture</option>
        </select>
      </div>
      <div id="sku-error" style="display: <?= isset($errors['productType']) ? 'block' : 'none' ?>">
        <?= isset($errors['productType']) ? htmlentities($errors['productType']) : '' ?>
      </div>
      <div id="dvd">
        <div class="data-input product">
          <label for="size">Size (MB):</label>
          <input type="number" id="size" name="size" class="form-control ">
          <div id="sku-error" style="display: <?= isset($errors['size']) ? 'block' : 'none' ?>">
            <?= isset($errors['size']) ? htmlentities($errors['size']) : '' ?>
          </div>

          <!-- <p class="describe">Please provide size in (MB)</p> -->
        </div>
      </div>

      <div id="book">
        <div class="data-input product">
          <label for="weight">Weight (KG):</label>
          <input type="number" id="weight" name="weight" class="form-control " >
          <div id="sku-error" style="display: <?= isset($errors['weight']) ? 'block' : 'none' ?>">
            <?= isset($errors['weight']) ? htmlentities($errors['weight']) : '' ?>
          </div>

          <!-- <p class="describe">Please provide weight in KG</p> -->
        </div>

      </div>

      <div id="furniture">
        <div class="data-input product">
          <label for="height">Height (CM):</label>
          <input type="number" id="height" name="height" class="form-control ">
          <div id="sku-error" style="display: <?= isset($errors['height']) ? 'block' : 'none' ?>">
            <?= isset($errors['height']) ? htmlentities($errors['height']) : '' ?>
          </div>
          <!-- <p class="describe">Please provide measurements in (CM)</p> -->
        </div>
        <div class="data-input product">
          <label for="length">Length (CM):</label>
          <input type="number" id="length" name="length" class="form-control" >
          <div id="sku-error" style="display: <?= isset($errors['length']) ? 'block' : 'none' ?>">
            <?= isset($errors['length']) ? htmlentities($errors['length']) : '' ?>
          </div>
          <!-- <p class="describe">Please provide measurements in (CM)</p> -->
        </div>
        <div class="data-input product">
          <label for="width">Width (CM):</label>
          <input type="number" id="width" name="width" class="form-control ">
          <div id="sku-error" style="display: <?= isset($errors['width']) ? 'block' : 'none' ?>">
            <?= isset($errors['width']) ? htmlentities($errors['width']) : '' ?>
          </div>
          <!-- <p class="describe">Please provide measurements in (CM)</p> -->
        </div>

      </div>
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