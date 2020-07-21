<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedRecord = $Cart->deleteCart($_POST['item_id']);
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
                    foreach ($product->getData("cart") as $item):
                        $cart = $product->getProduct($item["item_id"]);
                        $subTotal[] = array_map(function ($item){
                ?>
                <!-- Cart Item-->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image']; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>

                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name']; ?></h5>
                        <small><?php echo $item['item_brand']; ?></small>
                        <!--Product rating-->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale fnt-size-14">20, 534 ratings</a>
                        </div>
                        <!-- !Product rating-->

                        <!--Product Qty-->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'];?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" class="qty_input border px-2 w-100 bg-light" data-id="<?php echo $item['item_id'];?>" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'];?>"><i class="fas fa-angle-down"></i></button>
                            </div>

                            <form method="post">
                                <input type="hidden" value="<?php echo isset($item)? $item['item_id']: 0;?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                            <button class="btn font-baloo text-danger">Save For Latter</button>
                        </div>
                        <!--!Product Qty-->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $item['item_id'];?>"><?php echo $item['item_price']; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !Cart Item-->
                <?php
                            return $item['item_price'];
                        },$cart); // closing array map function
                    endforeach;
                ?>

            </div>

            <!--SubTotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery</h6>
                    <div class="border-top py-4">
                        <div class="font-baloo font-size-20">Subtotal (<?php echo isset($subTotal)? count($subTotal):0;?> item)&nbsp;<span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0 ?></span></span></div>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!--!SubTotal section-->

        </div>
        <!-- Shopping Cart Items-->
    </div>
</section>
<!-- !Shopping cart section -->
