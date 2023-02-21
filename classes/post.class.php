<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);


class Post
{



    public $conn;
    public $table = 'skandi';
public $errors = [];

    public function __construct(PDO $db)
    {

        $this->conn = $db;
    }

    public function read()
    {
        $query = 'SELECT 
              id,
              sku,
              name, 
              price, 
              productType,
              size, 
              weight, 
              height, 
              length, 
              width FROM ' . $this->table . ' ORDER BY id DESC';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        // echo "SQL Query: " . $query . "\n";

        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $product = Product::displayProduct($row);
            // Add the product object to the data array
            $data[] = $product;

          
          print_r($data);
   
          
        }
        return $data;

    }

    public function insert($data) {  
        
       $set_terms = [];
        $params = [];

        foreach(array_keys($data) as $field ) {
            $set_terms[] = "`$field`=?";
            $params[] = $data[$field];
        }

        $params = array_values($params);
        
         // Prepare the INSERT INTO query
          $query = "INSERT INTO `$this->table` SET " . implode(',',$set_terms);
          $stmt = $this->conn->prepare($query);
    
          // Bind the values from the data array to the placeholders in the query
        try {
            $stmt->execute($params);
            header('Location: index.php');
            return [
                'success' => true,
                'message' => "Created Successfully"
            ];
            
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                return [
                    'success' => false,
                    'errors' => [
                        'product' => 'Product already exists'
                    ]
                ];
            } else {
                throw $e;
            }
        }
    }

      public function delete($id) {
        try {
            $sql = "DELETE FROM skandi WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return true;
            header('location:index.php');
        } catch(PDOException $e) {
            // Log the error or display an error message
            // You can also throw the exception again if you want to handle it differently
            throw $e;
            return false;
        }
    } 
}



