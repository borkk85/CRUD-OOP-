<?php

class Post extends Product {

    private $conn;
    protected $table = 'skandi';
    protected $primaryKeys = ['id'];
    protected $uniqueKeys = ['sku', 'name'];
    protected $attributes = ['price',
        'productType', 'size', 'weight', 'height', 'length', 'width'];


    public function read(): array
    {

        $query =  'SELECT * FROM '. $this->getTable() .' ORDER BY id DESC' ;
        $stmt = $this->conn->prepare($query);
//        $stmt->execute();
        $data = [];
        while($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            $product=new Post();
            $product->setAttributes($result);

            $data[]=$product;

    }
        return $data;


    }




}