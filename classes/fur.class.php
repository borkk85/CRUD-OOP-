<?php

class Fur extends Product   {

    use CommonTrait;

    protected $height;
    protected $length;
    protected $width;
    
    public function __construct($id, $sku, $name, $price, $productType, $height, $length, $width)
    {
        $this->height = $height;
        $this->length = $length;
        $this->width = $width;
        $this->additionalProperties[] = $this->height;
        $this->additionalProperties[] = $this->length;
        $this->additionalProperties[] = $this->width;
    
        parent::__construct($id, $sku, $name, $price, $productType, $this->additionalProperties);
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
        $this->additionalProperties[] = $this->height;
    }
    
    public function getHeight()
    {
        return $this->height;
    }
    
    public function setLength($length)
    {
        $this->length = $length;
        $this->additionalProperties[] = $this->length;
    }
    
    public function getLength()
    {
        return $this->length;
    }
    
    public function setWidth($width)
    {
        $this->width = $width;
        $this->additionalProperties[] = $this->width;
    }
    
    public function getWidth()
    {
        return $this->width;
    }
    
}
