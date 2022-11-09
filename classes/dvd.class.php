<?php

class DVD extends Product implements HaveSize {

    protected $size;

    public function __construct($sku, $name, $price, $size) {

        parent::__construct($sku, $name, $price);

        $this->size = $size;
    }
    
    use Withsize;


}