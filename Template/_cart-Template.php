<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // delete
        if (isset($_POST['delete-cart-submit'])){
            $deletedRecord = $Cart->deleteCart($_POST['item_id'], $_POST['buyorder_id']);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // delete
        if (isset($_POST['proceed-buy-submit'])){
            foreach ($cart as $item):
                $pro = $product->getProduct($item['item_id']);
                $Total[] = array_map(function ($pro) use ($item, $buyorder){
                    return $item['cart_price'];
                },$pro); // closing array map function
            endforeach;
            $Buyorder->editBuyorderPrice($buyorder['buyorder_id'], isset($Total)? $Buyorder->getSum($Total):0);
            header("Location: proceedToBuy.php");
        }
    }
?>

<!-- Shopping cart section -->
<section id="cart" class="py-3">
    <div class="container container-fluid">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!-- Shopping Cart Items-->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($cart as $item):
                        $pro = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($pro) use ($item, $buyorder){
                ?>
                <!-- Cart Item-->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $pro['item_image']; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>

                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $pro['item_name']; ?></h5>
                        <div class="d-flex text-warning font-size-16">
                            <small>by <?php echo $pro['item_brand']; ?></small>
                        </div>
                        <h6>Type : <span class="color-second"><?php echo $pro['item_type']; ?></span></h6>

                        <!--Product Qty-->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $pro['item_id'];?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" class="qty_input border px-2 w-100 bg-light" data-id="<?php echo $pro['item_id'];?>" disabled  value="<?php echo $item['cart_amount'];?>" placeholder="1">
                                <input type="text" class="qty_cart border px-2 w-100 bg-light" data-id="<?php echo $pro['item_id'];?>" hidden  value="<?php echo $item['cart_id'];?>" placeholder="1">
                                <button class="qty-down border bg-light" data-id="<?php echo $pro['item_id'];?>"><i class="fas fa-angle-down"></i></button>
                            </div>

                            <form method="post">
                                <input type="hidden" value="<?php echo isset($pro)? $pro['item_id']: 0;?>" name="item_id">
                                <input type="hidden" value="<?php echo $buyorder['buyorder_id'];?>" name="buyorder_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>
                        </div>
                        <!--!Product Qty-->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $pro['item_id'];?>"><?php echo $item['cart_price']; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !Cart Item-->
                <?php
                            return $item['cart_price'];
                        },$pro); // closing array map function
                    endforeach;
                ?>

            </div>

            <!--SubTotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery</h6>
                    <div class="border-top py-4">
                        <div class="font-baloo font-size-20">Subtotal (<?php echo isset($subTotal)? count($subTotal):0;?> item)&nbsp;<span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Buyorder->getSum($subTotal) : 0 ?></span></span></div>
                        <form method="post">
                            <button type="submit" name="proceed-buy-submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--!SubTotal section-->

        </div>
        <!-- Shopping Cart Items-->
    </div>
</section>
<!-- !Shopping cart section -->
