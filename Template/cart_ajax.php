<?php
// Require MySQL Connection
require ('../functions.php');

if (isset($_POST['cartid']) && isset($_POST['amount']) && isset($_POST['price'])){
    $result = $Cart->editCart($_POST['cartid'],$_POST['amount'],$_POST['price']);
    echo json_encode($result);
}