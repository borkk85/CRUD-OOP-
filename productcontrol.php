<?php


class ProductController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function index()
    {
        $productQuery = "SELECT * FROM skandi";
        $result = $this->conn->query($productQuery);
        if($result->num_rows > 0){
            return $result; 
        }else{
            return false;
        }
    }

    public function create($inputData)
    {
        $sku = $inputData['sku'];
        $name = $inputData['name'];
        $price = $inputData['price'];
        $productType = $inputData['productType'];
        $size = $inputData['size'];
        $weight = $inputData['weight'];
        $height = $inputData['height'];
        $length = $inputData['length'];
        $width = $inputData['width'];

        $productQuery = "INSERT INTO skandi (sku, name, price, productType, size, weight, height, length, width) VALUES ('$sku','$name','$price','$productType', '$size','$weight','$height','$length', '$width)";
        $result = $this->conn->query($productQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function fetch(){
        $data = null;

        $query = "SELECT * FROM records";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    
}


?>