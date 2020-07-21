$(document).ready(function(){
    // Banner Owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots:true,
        items:1
    });

    //  Top Sale Owl Carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    // Isotope filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        layoutMode : 'fitRows'
    });

    //Filter items on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    });

    //  New Phones Owl Carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    //  Blogs Owl Carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            }
        }
    });


    //Product Qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $('#deal-price');
    // let $input = $(".qty .qty_input");

    //Click on qty-up Button
    $qty_up.click(function(e){
        
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id = '${$(this).data("id")}']`);
        
        // change product price using ajax call
        $.ajax({ url: "Template/ajax.php", type: 'post', data: { itemid :$(this).data("id")}, success: function (result){
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];
            
            if($input.val() >= 1 && $input.val() <= 9){
                $input.val(function(i, oldval){
                    return ++oldval;
                });
                
                // increase price of the product
                $price.text(parseFloat(item_price * $input.val()).toFixed(2));

                // set subTotal price
                let subtotal = parseFloat($deal_price.text()) + parseFloat(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }
            
            }}); // closing ajax request

        
    });

    //Click on qty-down Button
    $qty_down.click(function(e){
        
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id = '${$(this).data("id")}']`);
        
        // change product price using ajax call
        $.ajax({ url: "Template/ajax.php", type: 'post', data: { itemid :$(this).data("id")}, success: function (result){
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];
            
            if($input.val() > 1){
                $input.val(function(i, oldval){
                    return --oldval;
                });
                
                // increase price of the product
                $price.text(parseFloat(item_price * $input.val()).toFixed(2));

                // set subTotal price
                let subtotal = parseFloat($deal_price.text()) - parseFloat(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }
            
            }}); // closing ajax request

        
        
    });


});