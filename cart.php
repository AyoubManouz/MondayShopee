<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php

    /* include cart template */
    include('Template/_cart-Template.php');
    /* include cart template */

    /* include new phones section */
    include('Template/_new-phones.php');
    /* include new phones section */

?>

<?php
    //include footer.php file
    include('footer.php');
?>

