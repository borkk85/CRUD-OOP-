<?php 

class Book extends Product implements HaveWeight {

    protected $weight;

    public function __construct($sku, $name, $price, $weight) {

        parent::__construct($sku, $name, $price);

        $this->weight = $weight;
    }
    
use WithWeight;


}