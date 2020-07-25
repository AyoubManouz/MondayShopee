<!-- Product -->
<?php

    $item_id = $_GET['item_id'] ?? 1;

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['cart_submit'])){
            // Call method addToCart
            $pro = $product->getProduct($item_id);
            $Cart->addToCart($_POST['buyorder_id'], $item_id, 1, $pro[0]['item_price']);
            header("Location:".$_SERVER['PHP_SELF']."?item_id=".$item_id);
        }
    }

    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'];?>" alt="product" class="img-fluid">

                <div class="form-row pt-4 font-size-16 font-baloo">

                        <!-- Cart Button -->
                        <div class="col">
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                <input type="hidden" name="buyorder_id" value="<?php echo $buyorder['buyorder_id']; ?>">
                                <?php
                                    if (in_array($item['item_id'], isset($in_cart)? $in_cart : [])){
                                        echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                                    }else {
                                        echo '<button type="submit" name="cart_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                                    }
                                ?>
                            </form>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-6 py-5">
                <h3 class="font-baloo font-size-25"><?php echo $item['item_name']; ?></h3>
                <div class="d-flex text-warning font-size-16">
                    <small>by <?php echo $item['item_brand']; ?></small>
                </div>
                <h6>Type : <?php echo $item['item_type']; ?></h6>
                <hr class="m-0">

                <!--Product price-->
                <table class="my-3">

                    <tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>$<?php echo floatval($item['item_price']) + 49.99; ?></strike></td>
                    </tr>

                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger">$<span><?php echo intval($item['item_price'])?$item['item_price'].".00" : $item['item_price']; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>

                </table>
                <hr>

                <!--Policy-->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5 color-second">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <p class="font-rale font-size-12">10 Days<br>Replacement</p>
                        </div>

                        <div class="return text-center mr-5 color-second">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <p class="font-rale font-size-12">Daily Tuition<br>Deliverd</p>
                        </div>

                        <div class="return text-center mr-5 color-second">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <p class="font-rale font-size-12">1 Year<br>Warranty</p>
                        </div>
                    </div>
                </div>
                <hr>

            </div>

            <div class="col-12 py-5">
                <h6 class="font-rubik font-size-20">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14"><?php echo $item['item_desc']; ?></p>
            </div>
        </div>
    </div>
</section>

<?php
    endif;
    endforeach;
?>
