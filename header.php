<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>

    <!--  Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--  Owl-carousel  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!--  font awsome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!--  Custom Css file -->
    <link rel="stylesheet" href="style.css">

    <?php
        // Require functions.php file
        require ('functions.php');
    ?>

</head>
<body>

<!-- Create header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-12 text-black-50 m-0">Something</p>
        <div class="font-rale font-size-14">
            <a href="#" class="px-3 border-right border-left text-dark">Login</a>
            <a href="#" class="px-3 border-right text-dark">Wishlist (0)</a>
        </div>
    </div>

    <!-- Primary navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="#">Monday Electronics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">

                <li class="nav-item active">
                    <a class="nav-link" href="#">On Sale</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Products <i class="fas fa-chevron-down"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Comming Soon</a>
                </li>

            </ul>
            <form action="#" class="font-size-14 font-rale">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart'));?></span>
                </a>
            </form>
        </div>
    </nav>

</header>

<!-- Create main -->
<main id="main-site">