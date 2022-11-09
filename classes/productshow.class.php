<?php

class ProductShow extends Post

{
    public function showAllProducts(){

        $allProducts = array();

        $stmt = $this->read();
        foreach($stmt as $result){
            $book = new Book($result['sku'], $result['name'], $result['price'], $result['weight']);
            array_push($allProducts, $book);
        }

        $stmt = $this->read();
        foreach($stmt as $result){
            $dvd = new Dvd($result['sku'], $result['name'], $result['price'], $result['size']);
            array_push($allProducts, $dvd);
        }
 
        $stmt = $this->read();
        foreach($stmt as $result){
            $furniture = new Fur($result['sku'], $result['name'], $result['price'], 
            $result['height'], $result['width'], $result['length']);
            array_push($allProducts, $furniture);
        }

        foreach($allProducts as $product){
            echo "<table>
                    <tbody>
                    <tr class='content'>
                    <th> <input type='checkbox' name='checkbox[]' > </th>
                    <td>" .$product->getSku(). "</td>
                    <td>" .$product->getName(). "</td>
                    <td>" .$product->getPrice(). "</td>
                    <td>" .$product->getproductType(). "</td>
                    </tr>
                    </tbody>
                    </table>";
        }
    }
}