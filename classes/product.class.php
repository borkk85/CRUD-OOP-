<?php

abstract class Product
{

  protected $sku;
  protected $name;
  protected $price;
  protected $productType;
  

  public function __construct($sku, $name, $price)
  {
    
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    
   
  }

  public function setSku($sku)
  {
      $this->sku = $sku;
  }

  public function getSku()
  {
    return  $this->sku;
  }

  public function setName($name)
  {
      $this->name = $name;
  }

  public function getName()
  {
    return  $this->name;
  }

  public function setPrice($price)
  {
      $this->price = $price;
  }

  public function getPrice()
  {
    return  "$this->price $";
  }
  
  public function getproductType(){
    
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  
  public function setLength($length)
  {
    $this->length = $length;
  }
  
  public function setWidth($width)
  {
    $this->width = $width;
  }


}

interface HaveSize {

  
    public function getSize();

}

trait Withsize {



    public function getSize()
    {
        $this->size;
    }

    public function getproductType() {
        return "$this->size MB";
      }
}

interface HaveWeight {

    public function getWeight();

    
}

trait WithWeight {
  

    public function getWeight()
    {
      $this->weight;
    }

    public  function getproductType() {
        return "$this->weight KG";
      }

}

interface HaveFurniture {

    public function getHeight();
    public function getLength();
    public function getWidth();

    
}

trait WithFurniture {



    public function getHeight()
    {
      $this->height;
    }
    
    public function getLength()
    {
      $this->length;
    }
    
    public function getWidth()
    {
      $this->width;
    }

    public function getproductType() {
        return "$this->height CM x $this->length CM x $this->width CM";
      }

}