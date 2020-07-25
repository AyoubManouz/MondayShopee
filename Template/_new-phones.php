<!-- New Phones -->
<?php
    shuffle($product_shuffle);

    //  Request method POST
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['new_phones_submit'])){
            // Call method addToCart
            $pro = $product->getProduct($_POST['item_id']);
            $Cart->addToCart($_POST['buyorder_id'], $_POST['item_id'], 1, $pro[0]['item_price']);
        }
    }
?>

<section id="new-phones">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">New Products</h4>
        <hr>
        <!--Owl-carousel-->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) {?>
                <div class="item py-2 bg-light">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s','product.php', $item['item_id'])?>"><img src="<?php echo $item['item_image'] ?>" alt="product<?php echo $item['item_id'] ?>" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'];?></h6>
                            <div class="text-warning font-size-14">
                                <span><?php echo $item['item_brand']; ?></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price']; ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                <input type="hidden" name="buyorder_id" value="<?php echo $buyorder['buyorder_id']; ?>">
                                <?php
                                    if (in_array($item['item_id'], isset($in_cart)? $in_cart : [])){
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                    }else {
                                        echo '<button type="submit" name="new_phones_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach function?>
        </div>
    </div>
</section>
