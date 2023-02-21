<?php

class DVD extends Product {

    use CommonTrait;

    protected $size;

    public function __construct($id, $sku, $name, $price, $productType, $size = null)
    {
            $this->size = $size;
            $this->additionalProperties[] = $this->size;
            parent::__construct($id, $sku, $name, $price, $productType, $this->additionalProperties);
    
    }
    
    public function setSize($size)
    {
        $this->size = $size;
        $this->additionalProperties[] = $this->size;
    }

    
    public function getSize()
    {
        return $this->size;
    }
    
}
