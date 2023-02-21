<?php

class Book extends Product  {

  use CommonTrait;

  protected $weight;

  public function __construct($id, $sku, $name, $price, $productType, $weight)
  {
            $this->weight = $weight;
            $this->additionalProperties = [$this->weight];
            parent::__construct($id, $sku, $name, $price, $productType, $this->additionalProperties);
  }
  
  public function setWeight($weight)
  {
      $this->weight = $weight;
      $this->additionalProperties[] =  $this->weight;
  }
  
  public function getWeight()
  {
      return $this->weight;
  }
  
}
