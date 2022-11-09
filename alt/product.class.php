<?php


abstract class Product
{

    private $conn;
    protected $table;
    protected $primaryKeys = [];
    protected $uniqueKeys = [];
    protected $attributes = [];
    private $data = [];


    protected function getTable() {
        return $this->table;
    }

    protected function getPrimaryKeys() {
        return $this->primaryKeys;
    }

    protected function setAttributes(array $attributes) {
        $this->attributes = $attributes;
    }

    public function getAttributes() {
        return array_merge($this->primaryKeys, $this->attributes);
    }

    public function setDatabaseConnection($conn) {
        $this->conn = $conn;
    }

    protected function getDatabaseConnection() {
        if (!$this->conn) {
            throw new \Exception('Database Connection Uninitialized');
        }
        return $this->getDatabaseConnection;
    }

}


