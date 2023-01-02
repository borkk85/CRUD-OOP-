<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

ini_set('display_errors', 'On');
error_reporting(E_ALL);
class UserValidator {

    
    protected $data;
    protected $errors = [];
    protected static $fields = ['sku', 'name', 'price', 'productType', 'size', 'weight', 'height', 'length', 'width'];

    public function __construct($post_data) {
  
        $this->data = $post_data;
    }

    public function validateForm() {
     
        if (empty($_POST)) {
            return false;
        }

        $this->validateSku();
        $this->validateName();
        $this->validatePrice();
        $this->validateProdType();
        // $this->validateDvd();
        // $this->validateBook();
        // $this->validateFurniture();

        return $this->errors;
      }

    public function getErrors() {
        return $this->errors;
        
      }

    private function validateSku() {
        $val = trim($this->data->sku);

        if(empty($val)) {
            $this->addError('sku', 'sku cannot be empty');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('sku', 'sku must be 6 to 12 chars alphanumeric');
            }
        }
    }

    private function validateName(){
        $val = trim($this->data->name);

        if(empty($val)) {
            $this->addError('name', 'name cannot be empty');
        } else {
            if(!preg_match("/^([a-zA-Z' ]+)$/", $val)){
                $this->addError('name', 'name must be 6 to 12 chars alphanumeric');
            }
        }
    }

    private function validatePrice(){
        $val = trim($this->data->price);

        if(empty($val)) {
            $this->addError('price', 'price cannot be empty and must be numeric');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $val)){
                $this->addError('price', 'price must be numeric');
            }
        }
    }

    private function validateProdType() {
        $val = trim($this->data->productType);
        $size = trim($this->data->size);
        $weight = trim($this->data->weight);
        $height = trim($this->data->height);  
        $width = trim($this->data->width);          
        $length = trim($this->data->length);     


        
        if (empty($val)) {
            $this->addError('productType', 'Please, Select one of the provided options');
            return;
        }
        switch(strtolower($val)) {
            case "dvd":
                $this->validateDvd($size);
                break;
            case "book":
                $this->validateBook($weight);
                break;
            case "furniture":
                $this->validateFurniture($height, $width, $length);
                break;
        }
        
    }    

    // private function validateProdType() {
    //     $productType = strtolower($this->data['productType']);
    //     if ($productType !== "dvd" && $productType !== "book" && $productType !== "furniture") {
    //         $this->addError('productType', 'Please select a valid product type');
    //     }
    // }

    private function validateDvd($size){
        
        // $size = trim($this->data['size']);

        if(empty($size)) {
            $this->addError('size', 'Please provide the appropriate value (MB)');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $size)){
                $this->addError('size', 'size must be numeric');
            }
        }
    }

    private function validateBook($weight){
       
        // $weight = trim($this->data['weight']);

        if(empty($weight)) {
            $this->addError('weight', 'Please provide the weight (KB)');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $weight)){
                $this->addError('weight', 'weight must be numeric');
            }
        }
    }
    
    private function validateFurniture($height, $width, $length){
            //  $height = trim($this->data['height']);

        if(empty($height)) {
            $this->addError('height', 'Please provide the dimension (CM)');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $height)){
                $this->addError('height', 'height must be selected');
            }
        }
    
        // $length = trim($this->data['length']);
        if(empty($length)) {
            $this->addError('length', 'Please provide the dimension (CM)');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $length)){
                $this->addError('length', 'length must be selected');
            }
        }
    
        
        // $width = trim($this->data['width']);
        if(empty($width)) {
            $this->addError('width', 'Please provide the dimension (CM)');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $width)){
                $this->addError('width', 'width must be selected');
            }
        }
    }
    

    private function addError($key, $val) {
        $this->errors[$key] = $val;

        }



}