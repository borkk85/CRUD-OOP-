<?php

include('includes/app.php');


// $products = new Post;


if (isset($_POST['submit'])) {

    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();


    $products->setSku($_POST['sku']);
    $products->setName($_POST['name']);
    $products->setPrice($_POST['price']);
    $products->setSize($_POST['size']);
    $products->setWeight($_POST['weight']);
    $products->setHeight( $_POST['height']);
    $products->setLength( $_POST['length']);
    $products->setWidth($_POST['width']);
    $products->insertData();

}
