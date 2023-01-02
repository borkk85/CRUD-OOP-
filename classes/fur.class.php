<?php

class Fur extends Product   {

    use FurTrait;

    public function __construct($id, $sku, $name, $price, $productType, $height, $length, $width) {
        // Call the parent constructor to initialize the sku, name, price, and productType properties
        parent::__construct($id, $sku, $name, $price, $productType, ['Height: ' . $height, 'Length: ' . $length, 'Width: ' . $width]);
    }

    public function getAdditionalProperties(): array {
        // Return an array of the additional properties for the Furniture object
        return parent::getAdditionalProperties();
    }
}