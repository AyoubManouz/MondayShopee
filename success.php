<?php
ob_start();

//include header.php file
include('header.php');

if ($buyorder['buyorder_price'] != 0){
    require('./charge.php');

    // the message
    $msg = "Hello Dear ".$_POST['first_name']."\nThank you for purchasing";
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    // send email
    mail($_SESSION['email'],"Purchasing on Monday Shopee",$msg);

    header("location:success.php");
}

?>

    <div class="container border-top py-5 mt-3">
        <h2 class="font-baloo font-size-20 d-flex justify-content-center">Thank you for purchasing</h2>
        <h3 class="font-baloo font-size-20 d-flex justify-content-center">An Conformation mail had sent to &nbsp;<span class="font-weight-bold font-italic"><?php echo $_SESSION['email']; ?></span></h3>
        <img src="./assets/tick.png" alt="success" class="img-fluid img-thumbnai w-25 rounded mx-auto d-block"">
    </div>

<?php
//include footer.php file
include('footer.php');
?>