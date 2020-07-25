<!-- Special Price -->
<?php
    $type = array_map(function ($pro){ return $pro['item_type'];}, $product_shuffle);
    $unique = array_unique($type);
    sort($unique);
    shuffle($product_shuffle);

    //  Request method POST
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['special_price_submit'])){
            // Call method addToCart
            $pro = $product->getProduct($_POST['item_id']);
            $Cart->addToCart($_POST['buyorder_id'], $_POST['item_id'], 1, $pro[0]['item_price']);
        }
    }

?>

<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Products</h4>
        <hr>
        <!--Owl-carousel-->
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Types</button>
            <?php array_map(function ($type){
                printf('<button class="btn" data-filter=".%s">%s</button>', $type, $type);
            }, $unique); ?>
        </div>
        <div class="grid">
            <?php array_map(function ($item) use($in_cart, $buyorder) { ?>
                <div class="grid-item border <?php echo $item['item_type']; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="item py-2">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?item_id=%s','product.php', $item['item_id'])?>"><img src="<?php echo $item['item_image']; ?>" alt="product1" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name']; ?></h6>
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
                                            echo '<button type="submit" name="special_price_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                        }
                                    ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle)?>
        </div>
    </div>
</section>