<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);


class Product implements ProductInterface
{

    use CommonTrait;


    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;
    protected $additionalProperties = [];

    public function __construct($id, $sku, $name, $price, $productType, array $additionalProperties = [])
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
        $this->additionalProperties = $additionalProperties;
    }



    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return "$this->price $";
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }


    public static function displayProduct($row)
    {
        $productType = $row['productType'];
        if ($productType == 'dvd') {
            $product = new Dvd(
                $row['id'],
                $row['sku'],
                $row['name'],
                $row['price'],
                $row['productType'],
            );
            $product->setAdditionalProperties(['Size: ' . $row['size'] . 'MB']);
        } elseif ($productType == 'book') {
            $product = new Book(
                $row['id'],
                $row['sku'],
                $row['name'],
                $row['price'],
                $row['productType'],
                $row['weight']
            );
            $product->setAdditionalProperties(['Weight: ' . $row['weight'] . 'KG']);
        } elseif ($productType == 'furniture') {
            $product = new Fur(
                $row['id'],
                $row['sku'],
                $row['name'],
                $row['price'],
                $row['productType'],
                $row['height'],
                $row['length'],
                $row['width']
            );
            $product->setAdditionalProperties([
                'Dimension: ' . $row['height'] . 'x'
                    . $row['length'] . 'x' . $row['width']
            ]);
        } else {
            $product = new Product(
                $row['id'],
                $row['sku'],
                $row['name'],
                $row['price'],
                $row['productType'],
                []
            );
            
        }
        // var_dump($product);
        return $product;
        // print_r($product);
    }
}

interface ProductInterface
{
    public function setAdditionalProperties(array $additionalProperties);
    public function getAdditionalProperties();
}

trait CommonTrait
{
    public function setAdditionalProperties(array $additionalProperties)
    {
        $this->additionalProperties =  $additionalProperties;
    }

    public function getAdditionalProperties(): array
    {
        return $this->additionalProperties;
    }
}
