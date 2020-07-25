<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php

    /* include cart template */
    count($cart) ? include('Template/_cart-Template.php') : include('Template/notFound/_cart_notFound.php');
    /* include cart template */

    /* include new phones section */
    include('Template/_new-phones.php');
    /* include new phones section */

?>

<?php
    //include footer.php file
    include('footer.php');
?>

