<?php

class ProductShow extends Post

{

    public function showAllProducts()
    {

        $allProducts = [];

        $stmt = $this->read();
        foreach ($stmt as $result) {
            $book = new Book($result['sku'], $result['name'], $result['price'], $result['productType'], $result['weight']);
            $allProducts[] = $book;
        }

        $stmt = $this->read();
        foreach ($stmt as $result) {
            $dvd = new DVD($result['sku'], $result['name'], $result['price'], $result['productType'], $result['size']);
            $allProducts[] = $dvd;
        }

        $stmt = $this->read();
        foreach ($stmt as $result) {
            $furniture = new Fur($result['sku'], $result['name'], $result['price'], $result['productType'],
                $result['height'], $result['width'], $result['length']);
            $allProducts[] = $furniture;
        }



            foreach (($allProducts ?? array()) as $product) {
                // $product=array_values(array_filter($product));

                echo "<table>";
                    echo   "<tbody>";
                    echo   "<tr class='content'>";
                    echo   "<th> <input type='checkbox' name='checkbox[]' > </th>";
                    echo "<td>{$product->getSku()}</td>";
                    echo "<td>{$product->getName()}</td>";
                    echo "<td>{$product->getPrice()}</td>";
                    echo "<td>{$product->getproductType()}</td>";
                    echo  "</tr>";
                    echo  "</tbody>";
                    echo  "</table>";
            }
        }

}