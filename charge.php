<?php
require_once('./vendor/stripe/stripe-php/init.php');
//require_once('functions.php');

$stripe = array(
    "secret_key"      => "sk_test_51H8VBxCPoDORY7YSkh05OkvtFzuxTtPoircCJeMdglOo5oLGRAA0ovYMqp6IlJpHcdliu6vBVzr5Cn3DDTRbU0LE009Zs1SfEu" /*  Actual secret key redacted */,
    "publishable_key" => "pk_test_51H8VBxCPoDORY7YSGsOck6ik078uPixrfQJ0ts5GWzxzsI0tCql7Eq94ovO12WNQXjtxKCWu1PNdcmyHMWOG0HvN004a8QitAz" /* Actual publishable_key redacted */
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

// Sanitize POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
    "amount" => $buyorder['buyorder_price'],
    "currency" => "usd",
    "description" => "Intro To React Course",
    "customer" => $customer->id
));

// Transaction Data
$transactionData =array(
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status,
);

// Add Transaction To DB
$Trans->addTransaction($transactionData,"transactions");

//redirect to success
//header("location:success.php?email=".$email);

$_SESSION['email'] = $email;

$Buyorder->endBuyorder($buyorder['buyorder_id']);





