<?php
// Require MySQL Connection
require ('../dataBase/DBController.php');

// Require Product class
require ('../dataBase/Product.php');

//DBobject
$db = new DBController();

// Product object
$product = new Product($db);

if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}