<?php


class UserValidator extends Post{

    
    protected $data;
    protected $errors = [];
    protected static $fields = ['sku', 'name', 'price', 'productType', 'size', 'weight', 'height', 'length', 'width'];

    public function __construct($post_data) {
        
        $this->data = $post_data;
    }

    public function validateForm() {
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present");
                return;
            }
        }
        
        $this->validateSku();
        $this->validateName();
        $this->validatePrice();
        $this->validateProdType();
        $this->validateDvd();
        $this->validateBook();
        $this->validateFurniture();

        return $this->errors;
    }

    private function validateSku() {
        $val = trim($this->data['sku']);

        if(empty($val)) {
            $this->addError('sku', 'sku cannot be empty');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('sku', 'sku must be 6 to 12 chars alphanumeric');
            }
        }
    }

    private function validateName(){
        $val = trim($this->data['name']);

        if(empty($val)) {
            $this->addError('name', 'name cannot be empty');
        } else {
            if(!preg_match("/^([a-zA-Z' ]+)$/", $val)){
                $this->addError('name', 'name must be 6 to 12 chars alphanumeric');
            }
        }
    }

    private function validatePrice(){
        $val = trim($this->data['price']);

        if(empty($val)) {
            $this->addError('price', 'price cannot be empty');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $val)){
                $this->addError('price', 'price must be numeric');
            }
        }
    }

    private function validateProdType(){
        $val = trim($this->data['productType']);

        if(empty($val)) {
            $this->addError('productType', 'productType cannot be empty');
        } else {
            if(!preg_match(`(?:(?!\A)\G<\/option>(?=[^<]*(?:<(?!\/select)[^<]*)*<\/select>)|<select\b[^<]*?>)\s*<option\b[^<]*?>\K[^<]*`, $val)){
                $this->addError('productType', 'productType must be selected');
            }
        }
    }

    private function validateDvd(){
        $val = trim($this->data['size']);

        if(empty($val)) {
            $this->addError('size', 'size cannot be empty');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $val)){
                $this->addError('size', 'size must be numeric');
            }
        }
    }

    private function validateBook(){
        $val = trim($this->data['weight']);

        if(empty($val)) {
            $this->addError('weight', 'weight cannot be empty');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $val)){
                $this->addError('weight', 'weight must be numeric');
            }
        }
    }
    
    private function validateFurniture(){
        $val = trim($this->data['height']);
        $val = trim($this->data['length']);
        $val = trim($this->data['width']);

        if(empty($val)) {
            $this->addError('height', 'height cannot be empty');
            $this->addError('length', 'length cannot be empty');
            $this->addError('width', 'width cannot be empty');
        } else {
            if(!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $val)){
                $this->addError('height', 'height must be selected');
            }
        }
    }
    

    private function addError($key, $val) {
        $this->errors[$key] = $val;

    }
}