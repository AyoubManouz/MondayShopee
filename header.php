<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">

    <?php
        // Require functions.php file
        require ('functions.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            if (isset($_POST['login'])){
                header("Location: http://localhost/MondayShopee/login.php");
            }
            if (isset($_POST['disconnect'])){
                $_SESSION["id"] = null;
                header("Location: http://localhost/MondayShopee/index.php");
            }
        }
    ?>

</head>
<body>

<!-- Create header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-12 text-black-50 m-0">Welcome <?php echo $_SESSION['name']?></p>
        <div class="font-rale font-size-14">
            <?php
                if(!isset($user)){
                    echo '<a href="login.php" name="login" class="px-3 border-right border-left text-dark">Login</a>';
                }else{
                    echo '<a href="login.php" name="disconnect" class="px-3 border-right border-left text-dark">Disconnect</a>';
                }
            ?>
        </div>
    </div>

    <!-- Primary navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="index.php">Monday Electronics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse d-flex justify-content-end navbar-collapse" id="navbarNav">
            <form action="#" class="font-size-14 font-rale">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo isset($cart)? count($cart) : 0;?></span>
                </a>
            </form>
        </div>
    </nav>

</header>

<!-- Create main -->
<main id="main-site log">