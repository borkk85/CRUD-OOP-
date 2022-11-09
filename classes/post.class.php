<?php



class Post 

{
  //DB 
  private $conn;
  private $table = 'skandi';

  //Properties 


  public function __construct($db) {
    $this->conn = $db;
  }
  
  public function insertData()
  {
    $query = 'INSERT INTO ' . $this->table . '
            SET             
            
            sku = :sku,
            name = :name,
            price = :price,
            productType = :productType,
            size = :size,
            weight = :weight,
            height = :height,
            length = :length,
            width = :width';

            $stmt = $this->conn->prepare($query);
          
            $this->sku;
            $this->name; 
            $this->price; 
            $this->productType; 
            $this->size;
            $this->weight;
            $this->height;
            $this->length;
            $this->width;

            $stmt->bindParam(':sku', $this->sku);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':productType', $this->productType);
            $stmt->bindParam(':size', $this->size);
            $stmt->bindParam(':weight', $this->weight);
            $stmt->bindParam(':height', $this->height);
            $stmt->bindParam(':length', $this->length);
            $stmt->bindParam(':width', $this->width);

            try {
              $stmt->execute();

              return true;

            } catch (PDOException $e) {
              if($e->errorInfo[1]==1062) {
                return false;
              }
              throw $e;
            }
  }

  public function read()
  {
    $query = 'SELECT 
    p.id as id, 
    p.sku,
    p.name, 
    p.price, 
    p.productType,
    p.size, 
    p.weight, 
    p.height, 
    p.length, 
    p.width FROM '. $this->table .' p  ORDER BY p.id DESC'; 

  $stmt = $this->conn->prepare($query);
  $stmt->execute();

  return $stmt;

  }

  public function delete()
  {
    try {
      $stmt = $this->conn->prepare("DELETE FROM skandi WHERE id = ?");
      $stmt->execute([$this->id]);
      return $stmt->fetchAll();
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function checkItemExists()
  {
    try {
      $stmt = $this->conn->prepare("SELECT * FROM skandi WHERE sku = ?");
      $stmt->execute([$this->sku]);
      $result = $stmt->fetchAll(); 
      if(count($result) == 0) {
        return false;
        
    } 
        else {
        return true;
      }
      }catch (Exception $e) {
      return $e->getMessage();
    }
  }
}
  // public function getPost() {
  //     $sql = "SELECT * FROM skandi";
  //     $stmt = $this->connect()->prepare($sql);
  //     $stmt->execute();

  //     while($result = $stmt->fetchAll()) {
  //       return $result;
  //     };
  //   }

  //   public function addPost($sku, $name, $price, $productType, $size, $weight, $height, $length, $width) {

  //     $sql = "SELECT * FROM skandi WHERE sku = 'sku'";
  //     $stmtCheck = $this->connect()->prepare($sql);
  //     $stmtCheck->execute();
  //     if ($stmtCheck->rowCount() > 0) {
  //     echo 'product SKU already exists';
  //     header('Location: product-add.php');

  //     } else {
  //     $sql = "INSERT INTO skandi(sku, name, price, productType, size, weight, height, length, width) 
  //     VALUES('$sku','$name','$price','$productType', '$size' ,'$weight','$height','$length', '$width')";
  //     $stmt = $this->connect()->prepare($sql);
  //     $stmt->execute();

  //     header('Location:index.php');
  //     exit();
  //     }
  //   }

