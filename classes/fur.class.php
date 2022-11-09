<?php 

class Fur extends Product implements HaveFurniture {

    protected $height;
    protected $length;
    protected $width;

    public function __construct($sku, $name, $price, $height, $length, $width) {

        parent::__construct($sku, $name, $price);

        $this->height = $height;
        $this->length = $length;
        $this->width = $width;
    }
    
 use WithFurniture;
   
}