<?php
session_start();
// Require MySQL Connection
require ('dataBase/DBController.php');

// Require Product class
require ('dataBase/Product.php');

// Require User class
require ('dataBase/User.php');

// Require Buyorder class
require('dataBase/Buyorder.php');

// Require Cart class
require ('dataBase/Cart.php');

// Require Cart class
require ('dataBase/transaction.php');

//DBobject
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

$User = new User($db);
$user = null;
if (isset($_SESSION['id'])){
    $user = $User->getUserById($_SESSION['id']);
}

$Buyorder = new Buyorder($db);
$buyorder = null;
if (isset($user)){
    $buyorder = $Buyorder->getBuyorder($user['user_id']);

    if (!isset($buyorder)){
        $Buyorder->addToBuyorder($user['user_id']);
    }
}

// Cart object
$Cart = new Cart($db);
$cart = null;
if (isset($buyorder)){
    $cart = $Cart->getCartByBuyorderId($buyorder['buyorder_id']);
    $in_cart = $Cart->getCartId($cart);
}

$Trans = new transaction($db);