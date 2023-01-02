<?php

class Book extends Product  {

use BookTrait;

  public function __construct($id, $sku, $name, $price, $productType, $weight) {
    // Call the parent constructor to initialize the sku, name, price, and productType properties
    parent::__construct($id, $sku, $name, $price, $productType, ['Weight: ' . $weight]);
}

public function getAdditionalProperties(): array {
    // Return an array of the additional properties for the DVD object
    return parent::getAdditionalProperties();
}

}