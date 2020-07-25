
<!-- Shopping cart section -->
<section id="cart" class="py-3">
    <div class="container container-fluid">
        <h5 class="font-baloo font-size-20">Payment Process</h5>

        <!-- Shopping Cart Items-->
        <div class="row">
            <div class="container border-top py-3 mt-3 d-flex justify-content-center">
                <form action="success.php" method="post" id="payment-form">
                    <div class="form-row">
                        <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
                        <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
                        <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
                        <div id="card-element" class="form-control">
                            <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button>Submit Payment</button>
                </form>
            </div>
        </div>
        <!-- Shopping Cart Items-->
    </div>
</section>
<!-- !Shopping cart section -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="charge.js"></script>