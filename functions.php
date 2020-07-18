<?php
// Require MySQL Connection
require ('dataBase/DBController.php');

// Require Product class
require ('dataBase/Product.php');

// Require Cart class
require ('dataBase/Cart.php');

//DBobject
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Cart = new Cart($db);