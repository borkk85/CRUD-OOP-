<?php

require_once('includes/app.php');

$database = new Dbh();
$db = $database->connect();
$product = new Post($db);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['save'])) {
    unset($_POST['save']);
    $data = $_POST;
   
    $product->sku = $data['sku'];
    $product->name = $data['name'];
    $product->price = $data['price'];
    $product->productType = empty($data['productType']) ? NULL : $data['productType'];
    $product->size = empty($data['size']) ? NULL : $data['size'];
    $product->weight = empty($data['weight']) ? NULL : $data['weight'];
    $product->height = empty($data['height']) ? NULL : $data['height'];
    $product->width = empty($data['width']) ? NULL : $data['width'];
    $product->length = empty($data['length']) ? NULL : $data['length'];

    $validation = new UserValidator($product);
    $errors = $validation->validateForm();
    
    if (empty($errors)) {
      unset($data['save']);
      $result = $product->insert($data);
    
      if ($result['success']) {
          
          $response = [
              'success' => true,
              'message' => "Created Successfully"
          ];
          
      } else {
          $response = [
              'success' => false,
              'errors' => $result['errors']
          ];
      }
  } else {
      $response = [
          'success' => false,
          'errors' => $errors
      ];
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
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/normalize.css" />
</head>

<body>
  <header>
    <h2>Product List</h2>
    <nav>
      <button class="save_btn" type="submit" name='save' value='save' form="product_form"><span>Save</span></button>
      <button class="canc_btn" id="cancelBtn" action="action" type="button" value="Cancel" onclick="location.href='index.php'"><span>Cancel</span></button>
    </nav>
  </header>

  <section class="product-form">

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="product_form" name="product_form">
   <div class="input-data">
        <label id="sku-label" for="sku">SKU</label>
        <input type="text" name="sku" id="sku" class="form-control" placeholder="#sku" />
        <div id="sku-error" style="display: <?= isset($errors['sku']) || (isset($result['errors']) && isset($result['errors']['product'])) ? 'block' : 'none' ?>">
          <?= htmlspecialchars($errors['sku'] ?? $result['errors']['product'] ?? '', ENT_QUOTES) ?>
        </div>
      </div>
      <div class="input-data">
        <label id="name-label" for="name">Name </label>
        <input type="text" name="name" id="name" class="form-control" placeholder="#name" />
        <div id="sku-error" style="display: <?= isset($errors['name']) || (isset($result['errors']) && isset($result['errors']['product'])) ? 'block' : 'none' ?>">
          <?= htmlspecialchars($errors['name'] ?? $result['errors']['product'] ?? '', ENT_QUOTES) ?>
        </div>

      </div>
      <div class="input-data">
        <label id="price-label" for="price">Price ($)</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="#price"/>
        <div id="sku-error" style="display: <?= isset($errors['price']) ? 'block' : 'none' ?>">
          <?= isset($errors['price']) ? htmlentities($errors['price']) : '' ?>
        </div>

      </div>

      <div class="input-switcher">
        <label for="productType" >Type Switcher</label>
        <select id="productType" name="productType" onchange="selectChanged()" >
          <option value="" disabled selected >Please select</option>
          <option value="dvd">DVD</option>
          <option value="book" >Book</option>
          <option value="furniture">Furniture</option>
        </select>
      </div>
      <div id="sku-error" style="display: <?= isset($errors['productType']) || isset($errors['size']) || isset($errors['weight']) || isset($errors['weight']) || isset($errors['height']) ? 'block' : 'none' ?>">
        <?= isset($errors['productType']) ? htmlentities($errors['productType']) : '' ?>
        <?= isset($errors['size']) ? htmlentities($errors['size'])  : '' ?>
        <?= isset($errors['weight']) ? htmlentities($errors['weight']) : '' ?>
        <?= isset($errors['height']) ? htmlentities($errors['height']) : '' ?>
      </div>
      <div id="dvd">
        <div class="data-input product">
          <label for="size">Size (MB):</label>
          <input type="number" id="size" name="size" class="form-control"/>
          <div id="sku-error" style="display: <?= isset($errors['size']) ? 'block' : 'none' ?>">
            <?= isset($errors['size']) ? htmlentities($errors['size']) : '' ?>
          </div>

        </div>
      </div>

      <div id="book">
        <div class="data-input product">
          <label for="weight">Weight (KG):</label>
          <input type="number" id="weight" name="weight" class="form-control "/>
          <div id="sku-error" style="display: <?= isset($errors['weight']) ? 'block' : 'none' ?>">
            <?= isset($errors['weight']) ? htmlentities($errors['weight']) : '' ?>
          </div>

        </div>

      </div>

      <div id="furniture">
        <div class="data-input product">
          <label for="height">Height (CM):</label>
          <input type="number" id="height" name="height" class="form-control "/>
          <div id="sku-error" style="display: <?= isset($errors['height']) ? 'block' : 'none' ?>">
            <?= isset($errors['height']) ? htmlentities($errors['height']) : '' ?>
          </div>
        </div>
        <div class="data-input product">
          <label for="length">Length (CM):</label>
          <input type="number" id="length" name="length" class="form-control" />
          <div id="sku-error" style="display: <?= isset($errors['length']) ? 'block' : 'none' ?>">
            <?= isset($errors['length']) ? htmlentities($errors['length']) : '' ?>
          </div>
        </div>
        <div class="data-input product">
          <label for="width">Width (CM):</label>
          <input type="number" id="width" name="width" class="form-control "/>
          <div id="sku-error" style="display: <?= isset($errors['width']) ? 'block' : 'none' ?>">
            <?= isset($errors['width']) ? htmlentities($errors['width']) : '' ?>
          </div>
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
