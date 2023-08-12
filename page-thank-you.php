<?php
/*

Template Name: Thank you

*/
get_header();
?>
<main id="primary" class="site-main">
<div class="top-step-wrapper">
    <div class="ts-container">
        <div class="tsgrid">
        <div class="stepIndicator si-first completed">
            <div class="number">
                <p>1</p>
                <div class="check-area">
                    <img src="<?php echo get_template_directory_uri(). '/icons/check.svg'; ?>" class="hidden" alt="">
                </div>
            </div>
            <p class="si-title completed">Transport</p>

        </div>
        <div class="stepDivider">
            <img src="<?php echo get_template_directory_uri(). '/icons/line.svg'; ?>" alt="">
        </div>
        <div class="stepIndicator si-second completed">
            <div class="number">
                <p>2</p>
                <div class="check-area">
                    <img src="<?php echo get_template_directory_uri(). '/icons/check.svg'; ?>" class="hidden" alt="">
                </div>
            </div>
            <p class="si-title">Pickup</p>
        </div>
        <div class="stepDivider">
            <img src="<?php echo get_template_directory_uri(). '/icons/line.svg'; ?>" alt="">
        </div>
        <div class="stepIndicator si-third completed">
            <div class="number">
                <p>3</p>
                <div class="check-area">
                    <img src="<?php echo get_template_directory_uri(). '/icons/check.svg'; ?>" class="hidden" alt="">
                </div>
            </div>
            <p class="si-title">Delivery</p>
        </div>
        <div class="stepDivider">
            <img src="<?php echo get_template_directory_uri(). '/icons/line.svg'; ?>" alt="">
        </div>
        <div class="stepIndicator si-fourth completed">
            <div class="number">
                <p>4</p>
                <div class="check-area">
                    <img src="<?php echo get_template_directory_uri(). '/icons/check.svg'; ?>" class="hidden" alt="">
                </div>
            </div>
            <p class="si-title">Book shipment</p>
        </div>
        <div class="stepDivider">
            <img src="<?php echo get_template_directory_uri(). '/icons/line.svg'; ?>" alt="">
        </div>
        <div class="stepIndicator si-fifth active">
            <div class="number">
                <p>5</p>
                <div class="check-area">
                    <img src="<?php echo get_template_directory_uri(). '/icons/check.svg'; ?>" class="hidden" alt="">
                </div>
            </div>
            <p class="si-title active">Thank you</p>
        </div>
    </div>
    </div>
</div>
<div class="thank-you">
    <div class="container">
        <h1 class="ty-text">Thank you!</h1>
        <p class="subtitle">We will contact you soon.</p>
        <div class="cursive">
            <p>Once the order is assigned to a carrier, one-time payment in full by using your credit card or debit card will be charged.</p>
            <p>Your booking details has been e-mailed to you.</p>
            <a href="<?php echo get_home_url(); ?>">Continue to homepage</a>
        </div>
    </div>
    <div class="top-right">
        <img src="<?php echo get_template_directory_uri(). '/icons/top-right.svg'; ?>" alt="">
    </div>
    <div class="bottom-left">
        <img src="<?php echo get_template_directory_uri(). '/icons/bottom-left.svg'; ?>" alt="">
    </div>
</div>
<?php
if(isset($_GET['method']) && isset($_GET['order'])) {
    $paymentMethod = $_GET['method'];
    $orderID = $_GET['order'];
    $price = isset($_GET['price']) ? $_GET['price'] : null;
    $address = isset($_GET['address']) ? $_GET['address'] : null;
    
    if($paymentMethod == "credit-card") {
        update_field('payment_type', 'card', $orderID );
    } else {
        update_field('payment_type', 'paypal', $orderID );
    }
    
    if($price !== null){
        update_field('price', $price, $orderID);
    }
    
    if($address !== null){
        update_field('billing_address', $address, $orderID);
    }
    
    if($price !== null){
        update_field('status_order', 'paid', $orderID);
    }
}
?>
</main>
<?php
get_footer();