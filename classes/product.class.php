<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);


class Product implements ProductInterface
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;
    protected $additionalProperties;

    public function __construct($id, $sku, $name, $price, $productType, array $additionalProperties)
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
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setAdditionalProperties($additionalProperties)
    {
        $this->additionalProperties = $additionalProperties;
    }

    public function getAdditionalProperties()
    {
        return $this->additionalProperties;
    }

    public static function createProduct($row) {
        $id = $row['id'];
        $productType = $row['productType'];
        $additionalProperties = [];
        if ($productType == 'DVD') {
            $product = new self(
                $row['id'],
                $row['sku'],
                $row['name'],
                $row['price'],
                $row['productType'],
                $row['size']
            );
            $additionalProperties = ['Size: ' . $row['size']];
        } elseif ($productType == 'Book') {
            $product = new self(
                $row['id'],
                $row['sku'],
                $row['name'],
                $row['price'],
                $row['productType'],
                $row['weight']
            );
            $additionalProperties = ['Weight: ' . $row['weight']];
        } elseif ($productType == 'Furniture') {
            $product = new self(
                $row['id'],
                $row['sku'],
                $row['name'],
                $row['price'],
                $row['productType'],
                $row['height'],
                $row['length'],
                $row['width']
            );
            $additionalProperties = [
                'Height: ' . $row['height'],
                'Length: ' . $row['length'],
                'Width: ' . $row['width'],
            ];
        } else {
            $product = new self(
                $row['id'],
                $row['sku'],
                $row['name'],
                $row['price'],
                $row['productType'],
                []
            );
            if ($row['size']) {
                $additionalProperties[] = 'Size: ' . $row['size'];
            }
            if ($row['weight']) {
                $additionalProperties[] = 'Weight: ' . $row['weight'];
            }
            if ($row['height'] && $row['length'] && $row['width']) {
                $additionalProperties = [
                    'Height: ' . $row['height'] . '</br>' .
                    'Length: ' . $row['length'] . '</br>' .
                    'Width: ' . $row['width']];
                }
                $product->setAdditionalProperties($additionalProperties);
                return $product;
        }
}
}

interface ProductInterface
{
    public function setAdditionalProperties(array $additionalProperties);
    public function getAdditionalProperties();
}


trait DvdTrait
{
    public function setAdditionalProperties(array $additionalProperties)
    {
        $this->additionalProperties = 
        array_merge($this->additionalProperties, ['Size: ' . $additionalProperties[0]]);
    }
    public function getAdditionalProperties(): array
    {
        return $this->additionalProperties;
    }
}

trait BookTrait
{
    public function setAdditionalProperties(array $additionalProperties)
    {
        $this->additionalProperties = 
        array_merge($this->additionalProperties, ['Weight: ' . $additionalProperties[0]]);
    }
    public function getAdditionalProperties(): array
    {
        return $this->additionalProperties;
    }
}

trait FurTrait
{
    public function setAdditionalProperties(array $additionalProperties) {
        $this->additionalProperties = array_merge(
            $this->additionalProperties,
            ['Height: ' . $additionalProperties[0], 'Length: ' . $additionalProperties[1], 'Width: ' . $additionalProperties[2]]
        );
    }

    public function getAdditionalProperties(): array {
        return $this->additionalProperties;
    }
}
