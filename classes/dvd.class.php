<?php

class DVD extends Product {

    use DvdTrait;

    public function __construct($id, $sku, $name, $price, $productType, $size)
    {
        // Call the parent constructor to initialize the sku, name, price, and productType properties
        parent::__construct($id, $sku, $name, $price, $productType, ['Size: ' . $size]);
    }

    public function getAdditionalProperties(): array
    {
        // Return an array of the additional properties for the DVD object
        return parent::getAdditionalProperties();
    }

}