<?php
/*

Template Name: Calculated Cost

*/

get_header();
if (isset($_GET['order'])) {
   $order_id = absint($_GET['order']);
   $cityTo = get_post_meta($order_id, 'city_to', true);
   $cityFrom = get_post_meta($order_id, 'city_from', true);
   $email = get_post_meta($order_id, 'email', true);
   $transportType = get_post_meta($order_id, 'transportType', true);
   $year = get_post_meta($order_id, 'year', true);
   $vehicle = get_post_meta($order_id, 'vehicle', true);
   $vehicleModel = get_post_meta($order_id, 'vehicleModel', true);
   $operable = get_post_meta($order_id, 'operable', true);
   $shipping_date = get_post_meta($order_id, 'shippingDate', true);
   $telephone = get_post_meta($order_id, 'telephone', true);
}


?>

<main id="primary" class="site-main">

<div class="container calculated-cost-container">
    <?php
    

    ?>
    <form id="calculated-cost-form">
        <div class="wrapper">
            <div class="left first-step" id="cost-step-1">
                    <h1 class="title"><?php echo get_the_title(); ?></h1>
                    <div class="gray-container">
                        <div class="inner-wrapper">
                            <p>Your qoute has been e-mailed to you. </p>
                            <p>Ready to book? Hooray! NO PAYMENT REQUIRED to book your shipment.</p>
                        </div>
                    </div>
                    <div class="top-wrapper">
                        <div class="left">
                            <p class="grayed-text">Service type</p>
                            <p class="service" id="service_type">Door to door</p>
                            <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                        <div class="right">
                            <p class="grayed-text">Insurance</p>
                            <p class="service" id="insurance">Included</p>
                            <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                    </div>
                    <div class="two-big-radio">
                        <div class="single-radio">
                       
                            <input checked type="radio" class="big-radio-button" name="checkout" value="discount" id="discount-price">
                            <label for="discount-price">
                            <p class="radio-title">Discounted </br>cash price</p>
                            <p id="discounted-price" class="price">$249</p>
                            <img src="<?php echo get_template_directory_uri(). '/icons/approve.svg'; ?>" class="approved" alt="">
                            Once the order is assigned to a carrier, a partial payment will be charged, the balance will be due in cash on delivery.</label>
                        </div>
                        <div class="single-radio">
                    
                            <input type="radio" class="big-radio-button" name="checkout" value="regular" id="regular-price">
                            <label for="regular-price">
                            <p class="radio-title">Regular price</p>
                            <p id="regular-price" class="price">$249</p>
                            <img src="<?php echo get_template_directory_uri(). '/icons/approve.svg'; ?>" class="approved" alt="">
                            Once the order is assigned to a carrier, one-time payment in full by using your credit card or debit card will be charged.</label>
                        </div>
                    </div>
                    <div class="button-area">
                        <span id="to-step-2" class="primary-btn big-btn text-uppercase">Continue to booking details</span>
                    </div>
                    <div class="text-area">
                        <p>Don`t know the exact day? That`s ok! You can change at any time. </br>You will be still able to review your order.</p>
                    </div>
                    <div class="divider">
                        <div class="div"></div>
                        <p>OR</p>
                        <div class="div"></div>
                    </div>
                    <div class="text-area">
                        <p>Book with one of our friendly Customer Service Agents!</p>
                    </div>
                    <div class="phone-area">
                        <a href="tel:8889888865">(888) 988-8865</a>
                    </div>
            </div>
            <div class="left second-step hidden" id="cost-step-2">
                <div class="top" id="back-to-step-1">
                    <div class="icon-wrapper">
                        <img src="<?php echo get_template_directory_uri().'/icons/back.svg'; ?>" alt="">
                    </div>
                    <p class="text">Back</p>
                </div>
                <div class="main-step-area">
                    <p class="title">Transport</p>
                    <p class="subtitle">A couple more specifics, we want to get everything right!</p>
                </div>
                <div class="options">
                    <p class="title">You are</p>
                    <div class="single-radio">
                        <input type="radio" name="youare" value="An individual" id="individual">
                        <label for="individual">An individual</label>
                    </div>
                    <div class="single-radio">
                        <input type="radio" name="youare" value="Representing a business" id="business">
                        <label for="business">Representing a business</label>
                    </div>
                </div>
                <div class="inputs">
                    <div class="two-column">
                        <div class="left">
                            <p class="input-title">Your full name</p>
                            <input type="text" name="full-name" placeholder="e.g John Doe">
                        </div>
                        <div class="right">
                            <p class="input-title">Email</p>
                            <input type="text" name="e-mail" placeholder="Your email" value="<?php echo $email;?>">
                        </div>
                    </div>
                    <div class="two-column">
                        <div class="left">
                            <p class="input-title">Phone number</p>
                            <input type="text" name="phone" placeholder="(___)___-____" class="phone-field" <?php echo ($telephone) ? 'value="'. $telephone .'"': ''; ?>>

                            <div class="more">
                            <span class="blue additional-phone">+ add another number <span class="gray">(Optional)</span></span>
                            <div class="hidden" id="addPhone">
                                <input type="text" class="phone-field-add" name="phone2" placeholder="(___)___-____">
                            </div>
                            </div>
                        </div>
                        <div class="right"></div>
                    </div>
                </div>
                <div class="button-area">
                    <span id="to-step-3" class="primary-btn big-btn text-uppercase">Pickup info <img src="<?php echo get_template_directory_uri().'/icons/double.svg'; ?>" alt=""> </span>
                    <p class="error-msg"></p>
                    <div class="half-col">
                        <p class="text">By providing your information, you agree to our <a href="<?php echo get_privacy_policy_url(); ?>">Privacy Policy</a>, and SMS notifications. Up to 8msgs/mo. Msg&data rates may apply. Text STOP to unsubscribe.</p>
                    </div>
                </div>
            </div>
            <div class="left third-step hidden" id="cost-step-3">
                <div class="top" id="back-to-step-2">
                    <div class="icon-wrapper">
                        <img src="<?php echo get_template_directory_uri().'/icons/back.svg'; ?>" alt="">
                    </div>
                    <p class="text">Back</p>
                </div>
                <p class="title">Vehicle pickup details</p>
                <div class="pickup-address-area">
                    <p class="label">Pickup address</p>
                    <div class="single-input">
                        <input type="text" name="pickup-street-address" placeholder="Street address">
                    </div>
                    <div class="single-input">
                        <input type="text" name="pickup-optional" placeholder="Apt, Suite, etc. (Optional)">
                    </div>
                    <p class="current-pickup"><?php echo $cityFrom; ?></p>
                    <div class="options">
                        <p class="title">This is a</p>
                        <div class="single-radio">
                            <input type="radio" name="thisIsA" value="Residential address" id="residentialaddress">
                            <label for="residentialaddress">Residential address</label>
                        </div>
                        <div class="single-radio">
                            <input type="radio" name="thisIsA" value="Business address" id="businessaddress">
                            <label for="businessaddress">Business address</label>
                        </div>
                    </div>
                    <div class="options sec">
                        <p class="title">Who do we contact about pickup?</p>
                        <div class="single-radio">
                            <input type="radio" name="pickupContact" value="Contact me" id="contactme">
                            <label for="contactme">Contact me</label>
                        </div>
                        <div class="single-radio">
                            <input type="radio" name="pickupContact" value="Contact someone else" id="contactsomeoneelse">
                            <label for="contactsomeoneelse">Contact someone else</label>
                        </div>
                        <div class="hidden pickup-another-contact">
                            <div class="single-input">
                                <p class="label">Pickup contact's full name</p>
                                <input type="text" name="pickup-someone-name" placeholder="e.g John Doe">
                            </div>
                            <div class="single-input">
                                <p class="label">Phone number</p>
                                <input type="text" class="add-phone-field" name="pickup-someone-phone" placeholder="(___) ___-____">
                            </div>
                        </div>
                    </div>
                    <div class="button-area">
                        <span id="to-step-4" class="primary-btn big-btn text-uppercase">Delivery info <img alt="" data-src="http://cardelivery.local/wp-content/themes/top-car-delivery/icons/double.svg" class=" ls-is-cached lazyloaded" src="http://cardelivery.local/wp-content/themes/top-car-delivery/icons/double.svg"><noscript><img src="http://cardelivery.local/wp-content/themes/top-car-delivery/icons/double.svg" alt=""></noscript> </span>
                    <p class="error-msg2"></p>
                </div>
                </div>

            </div>
            <div class="left fourth-step hidden" id="cost-step-4">
                <div class="top" id="back-to-step-3">
                    <div class="icon-wrapper">
                        <img src="<?php echo get_template_directory_uri().'/icons/back.svg'; ?>" alt="">
                    </div>
                    <p class="text">Back</p>
                </div>
                <p class="title">Vehicle delivery details</p>
                <div class="delivery-address-area">
                    <p class="label">Delivery address</p>
                    <div class="single-input">
                        <input type="text" name="delivery-street-address" placeholder="Street address">
                    </div>
                    <div class="single-input">
                        <input type="text" name="delivery-optional" placeholder="Apt, Suite, etc. (Optional)">
                    </div>
                    <p class="current-delivery"><?php echo $cityTo; ?></p>
                    <div class="options">
                        <p class="title">This is a</p>
                        <div class="single-radio">
                            <input type="radio" name="thisIsA-delivery" value="Residential address" id="residentialaddress-delivery">
                            <label for="residentialaddress-delivery">Residential address</label>
                        </div>
                        <div class="single-radio">
                            <input type="radio" name="thisIsA-delivery" value="Business address" id="businessaddress-delivery">
                            <label for="businessaddress-delivery">Business address</label>
                        </div>
                    </div>
                    <div class="options sec">
                        <p class="title">Who do we contact about delivery?</p>
                        <div class="single-radio">
                            <input type="radio" name="deliveryContact" value="Contact me" id="contactme-delivery">
                            <label for="contactme-delivery">Contact me</label>
                        </div>
                        <div class="single-radio">
                            <input type="radio" name="deliveryContact" value="Contact someone else" id="contactsomeoneelse-delivery">
                            <label for="contactsomeoneelse-delivery">Contact someone else</label>
                        </div>
                        <div class="hidden delivery-another-contact">
                            <div class="single-input">
                                <p class="label">Delivery contact's full name</p>
                                <input type="text" name="delivery-someone-name" placeholder="e.g John Doe">
                            </div>
                            <div class="single-input">
                                <p class="label">Phone number</p>
                                <input type="text" class="phone-add-field" name="delivery-someone-phone" placeholder="(___) ___-____">
                            </div>
                        </div>
                    </div>
                    <div class="button-area">
                        <span id="to-step-5" class="primary-btn big-btn text-uppercase">Continue</span>
                    <p class="error-msg3"></p>
                </div>
                </div>
            </div>
            <div class="left fifth-step hidden" id="cost-step-5">
                <div class="top" id="back-to-step-4">
                    <div class="icon-wrapper">
                        <img src="<?php echo get_template_directory_uri().'/icons/back.svg'; ?>" alt="">
                    </div>
                    <p class="text">Back</p>
                </div>
                <p class="title">Last step!</p>
                
                <div class="attention-wrapper">
                    <div class="top">
                        <p class="blue" id="actual-price-last">$0</p> <span class="blue">Due now</span>
                    </div>
                    <div class="bottom">
                        <p>Your credit card will not be charged until the order is assigned to a carrier.</p>
                    </div>
                </div>

                <div class="tab-links">
                    <span class="tab-btn credit" id="credit-card-button">
                    <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="circle" d="M26.3658 1H3.63416C2.17935 1 1 2.18979 1 3.65746V18.4209C1 19.8886 2.17935 21.0784 3.63416 21.0784H26.3658C27.8206 21.0784 29 19.8886 29 18.4209V3.65746C29 2.18979 27.8206 1 26.3658 1Z" stroke="#9CA3AE" stroke-miterlimit="10"/>
                    <path d="M21.6597 15.028C21.6597 16.4328 20.532 17.5641 19.1501 17.5641C17.7683 17.5641 16.6406 16.4328 16.6406 15.028C16.6406 13.6231 17.7683 12.4918 19.1501 12.4918C20.532 12.4918 21.6597 13.6231 21.6597 15.028Z" fill="#F5F5F5" stroke="#9CA3AE"/>
                    <path class="circle" d="M25.5933 15.028C25.5933 16.4328 24.4656 17.5641 23.0837 17.5641C21.7019 17.5641 20.5742 16.4328 20.5742 15.028C20.5742 13.6231 21.7019 12.4918 23.0837 12.4918C24.4656 12.4918 25.5933 13.6231 25.5933 15.028Z" fill="#F5F5F5" stroke="#9CA3AE"/>
                    <path d="M3.91992 13.7554H12.3215" stroke="#9CA3AE" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3.91992 16.4988H8.74645" stroke="#9CA3AE" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="line" d="M29 5.26855H1V9.05535H29V5.26855Z" fill="#9CA3AE"/>
                    </svg>

                        Credit card
                    </span>
                    <span class="tab-btn paypal" id="paypal-button">
                        <svg class="colorful" width="77" height="20" viewBox="0 0 77 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect x="0.828125" y="-3.57141" width="75.567" height="31.4286" fill="url(#pattern0)"/>
                        <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_467_7152" transform="scale(0.00166667 0.004)"/>
                        </pattern>
                        <image id="image0_467_7152" width="600" height="250" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAD6CAYAAAB9LTkQAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAZdEVYdFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAADKGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMwMTQgNzkuMTU2Nzk3LCAyMDE0LzA4LzIwLTA5OjUzOjAyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNCAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1MTdFODkwM0FGMDIxMUU0QkUwRjhDM0U5RTBDNTBEQSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo1MTdFODkwNEFGMDIxMUU0QkUwRjhDM0U5RTBDNTBEQSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjUxN0U4OTAxQUYwMjExRTRCRTBGOEMzRTlFMEM1MERBIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjUxN0U4OTAyQUYwMjExRTRCRTBGOEMzRTlFMEM1MERBIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+FtIcLgAAACF0RVh0Q3JlYXRpb24gVGltZQAyMDE2OjA3OjI2IDE4OjI4OjMxUQ6BGAAAVPRJREFUeF7t3QmcHFWdOPDfq+o5MjnmyAUEAoEokMwMxACiKIegrq63EiCskGQSQg4S5FBxV2NwV0BdNZAEQi5AjRJ2vXbXVVEU/XsTkJmEO2EJZwiZmSSTzEx313v/36/6TZjp6Z6p7n6vq4/fl0+n69UM093VVa9+7wbGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4xlSOhn85o33QBSfhJf4lS9p7gJoQBkFJTTDQr2giNfBVAdAO4hEOopkM5OcMVeOLT/cXhuea/+vxhjjDFWhswHWM33TQAV/wX+5dP1nvKi1Gt4WF/DoOsvGIy1QcT5Czx25SP6p4wxxhgrA2YDrLPvHwGHD24HcE7Ue5hP7gIJvwfh/BKq3V/A367cp3/AGGOMsRJkNsBq3vQ1/PfGRIKlpKATA67/xkO/Bdpa/lfvZYwxxlgJMRdgUe3Voa69IMRIvYcNS7XhYy20zr9L72CMMcZYCTAXYDXfOwPAe1SnWCaU2oH//hu0tXw/sYMxxhhjxczRz7mT8el6i2VKiOn42ALTN/4PNG04We9ljDHGWJEyF2A5MEVvsWy54oOgxHYMshboPYwxxhgrQuYCLAVc82KCIyIgnLuheeMdeg9jjDHGioy5AAvEKXqDGSGWQtPmH+gEY4wxxoqImQBr6qoqAHmcTjFThLqEgyzGGGOs+JgJsEbXnAjCmaBTzCQKspo3flunGGOMMVYEzARYUXey3mJWiOUYZF2hE4wxxhgrcGYCLEc06y1mjbgXmjbyEkSMMcZYETATYAnveL3FbJLifr3FGGOMsQJmJsCSDo8gzAcXzoDGjXN1ijHGGGMFykyABTBVPzPbhPgmXLzV1SnGGGOMFaDcA6zT7pkEjjpKp5htAurg6UOLdYoxxhhjBSj3ACsefyve9at0iuWDkp/TW4wxxhgrQLkHWI7LHdzzTYhJ0LThQp1ijDHGWIExEGBBk95i+eSI2XqLMcYYYwUm9wDLA55kNAxK/KPeYowxxliByT3AAm+63mD5NRGa752htxljjDFWQHILsJrvGwkguA9WWFTsDL3FGGOMsQKSW4DlqlPBETU6xfLOOVlvMMYYY6yA5BZgxRSvjRcuDrAYY4yxApRbgCUkz+AeJqXG6C3GGGOMFZDcAiwlGvUWC4PjjNJbjDHGGCsgOdZgqeP0FguFrNAbjDHGGCsg2QdY562oxn+5BitMCmoAVuQWJDPGGGPMuOxvzh2TjvYXHmbhUaILYKXUKcYYY4wViOwDLC9SOLVXwsVPUqkfFQX66Ht/ye8zknj/2XwVApTeYowxxlgBEfo5c42blmJMcIdOhQSDEgpQvG4Q0UMAMqr3Fxo8zH4QRZu0je8bH8oPDPFBaQq2/N/RX4mSiQcMVUElfw+t88/VCZaNU+9+N1RUNoKUI/DQe3pvCJSD338PPneAwm0l9oMj3wBXHoB4zWvQdnmH/kXGytPqzqkg5NmYR07ADDO8a1Xgf9KT+G873oKwkBs5DF58L0TUfohX7YWlo17Tv8mKzdbtlfD60Z/Ee/IkPMdiem8GZAVIcQBU1YOwbMTzOQRYm9eAoxbrVAgoKMGApKcdRPfrGGTRsaDgJfHTgtNX1+S/P/qH3mvfg2qyKNiqwNtsJYCLaZeeq/BnGEAShfkJPfqT6uewveUDOsUy0Xz3FFCR+/BreJfeU8BUO54/L+DzS3i+/A2kux1c+Cs8Pudl/QuMlbY1HasxM1yiU4VLqUMg1Iv4vAev1UfwPT+JefufYNGYJ/RvsEJ1x6FjAHofAsfEBN4KAxJ3ln+7z0rjpl9hjHOhTuUfBSI9+0B0vZQIQihAKSo64vKf8B+/toqe8YmCLqqZowArUo1xwAjcpgem6RckBVp+zdZmaJ03jzZYBk7eMBoqnJ14/o7Xe4qPVHE8T/6M58PPIeL+Fzw2p1X/hLHSsqbje5gpztap4qTUE1iYewiv2Z/A4rpf6b2skKzt3IS317k6ZYBszzLAWuFA43FPYaT3Fr0jvyj4iHeDOICFekJNbKWmr4lQYUBFAZdbDVBRA6pyFD6PTgSU+/Z9Bl645tv6/2BBNW/6V/z3nxOJEqHkQ3iS3AVtcx/Qexgrfmv2nokZ3l91qlS04QX7XYi7m2H5mL16Hwvb6s6/YxB8mk4ZkV1kMuPko0ILrnz4tqNdGCDGE7VXpcjvl0W1WLojvOwF6N4H4uCL+NgN0P4ywLHjnta/zTLhwfv1VukQzntAqK0wfdPfoPGej+u9jBU3EfmQ3iolTfjBboNI/Gm8qX8etqpia34pPdT3CuTxOmWI2pNdgBU7bPiNZEqC8DDgoJqdITuBlxDqAE/BFgVehzv8QAsufPuX4f7u9+rfYEFMXVUFbgmvoenCGeDIH0Lj5gdgxpZj9F7GipQo4fVunXoQcAu83tkGt3e8R+9kYdg3eSreW81OOyXl09kFWEJgBB4SCjAkBlV+P6Ts3n5xw6BS4aNuHD5GnQWH5C/hm2+shXWPYPTFhlUzAgsHokGnSpejPgVedxtM31R6tXWsfCgVYktJnghxKrji17C684t6D8s3CW/VW+YI99ksAywZ4hI5FGBE8YDEcLMcAyzU0wMwFgOs0TUAcQw2qysWQeykv8O39hoY/VDiPNf8hVSwMJB04efQtGm+3sFY8Vj1TBUoKOEarCQCbk506Gf555k/z4R6JrsIRbnhTTJKQZVHUxbE9Y4yFMMAa9xEgFEVuE3HQgG47jSIRB6Ff3v1Av1bLBVHnKS3yoeA9dC84dM6xVhxcCccB0IU70jfrIjZsLbjBzrB8sdC5YSbZYAFYZYqqAYrhg+Jm9QHqwzh51YTMMBy+n1+ajaNuDVQW/0Q3LqnCOZ2Ck2Z1vI598Fp95ylE4wVg6n6ubwocQkGWV/VKZYP0kJTtBvbmXmAddaqMaBUuJ3cafSgP2FUGaLauxGjASZNwO2kY0BBlotfaU3Fg/CNfSE24xYwKUu/T0c6Mv5fepF2xoqALKPm/CRK3AS3t79bp5hNK5RjvGVDqQNQf+i5zAOsaP0UfDO1OhUCBcIr1CVx8qCXmgfHAUwYC9CdoplUYtAVcavBBZ7MbhAlwCnTUjERzgRoP361TjFW2IQo3wCLuOIBnsIhDxr2HYMn22SdMkTthEsmd2ceYMVliM2D+HapadCvwSrT5sGeboCjjwUYOxKD3TT90KhPVqX7Vvh2+9f0HkZmfP9oPG1CnmIkZAJaYMb68g0yWTEp7wALxETY2/kZnWC2RFzzrRoCnqWnzAMsIafrrfyjPlcUXPkTjGb+1ksCTU8x+QSAKvz8Hgab6fizv4sbYVVn+XXqTqe3GwsH/TuulamY+xW9xVjhkorzLqX+mafgsUwKCwGWyDrACq9vDwVVfgd3mqKhDO+TcQwsR9WCOuFYDBaG6eRPtVgUSzhxbhLq40D59r/qz4FL4fSNZTY6ixWVb3YdjfkbZnRljia/jJ94iU4xK6T5Gn2hnqGnzAMszwlvklEk/BosqrkpwwDr0CGASccDHDsBtwP0Q6MATLj/AN/az/NjEcEB1hGeM0tvMVZ4qnqnYP5VqVPlTQIv6G+TY6Gvn3CzrcEKsw8LBgwUYFE/rHLU2w3wFoyVaisSE4wOx6/Fwq/YiXE7vs/hQPMI+WG9wVjhERaabYrXubC2s15vM+OE2RospaLQ4+yizcwCLOoc68ijdSoEGDDQCMIyrLzyp2cYOQrUW6cAxPA4ZMJxLoUVvynRVbEzobhzdx8FZ/OUDaxwCS4M9XEcFzxxjk4xkzZ31GFAdIJOmSFgN1w7eg9tZhZgxcXx+L+EFN7QW8XAohxHENLH7ToIcNyJACccg9u9if1BCVEL9U3lPcP7yRtGg1AYnVomZWzwg6LjAkNTrXSceKpOMVZgDNcqpNTXoTf5UYBcNVNvMZN64US8P47UKVOe088ZBlgiEt6w2QEjCMutCgu/pp5uUNObE82D0Qzu133NhArep/eUp5oIBlditE6ZJ+X/4uOdMMKdPOjhVhwPIt4IrnMaxOLn4ndyMSixFL+Ue3B7u/4L+ac8DrBYobLXRKjUXvznk6AqJqd8CHEKCK8Js923gxQfBgkLwYt/A8D7Pf5/VMLPPyWn6S1mkrIRyEu/gzvJLFJp2ng7nnzX6FR+iQie3z0gDu6mkw3TmcWGRa2nFyASAXXtMoCJdQAHM67BAryx/x6Wjz1X7yk/0zd9Alz4T50yTLVBawtGv1mavv4ciDjz8GLPc2dWcRO0zr1VJxgrDOteroFYzauYb43Re8yR0sO/ewYsrf+73pOZb7dPhorIZQDxz2LJtUHvzQP1B1hSz0ugmba684sYBd2sU2YoeQ0sbfBH72cYpRhuq8yEX4NFNbheYrtcUCB5oB2g8XSAyWMBurKcxd4RjbB6zyidKj+u1TUI/0M/Z2fHgj/A4y0t4HnvAqle1XvzQE3UG4wVDjniLVaCKyKc7VkHV+Taht2wZMxt0N2N+Yn6b73XPgUNoFS5Nd3kg4UpGpwjNViZBVgCwptklCrb/BGE1MG7jM6zGAaV1SNBnfU2/PzUBy3rEZT10OOU87wy9pocpNqpt3JDgVaFegf+vcN6j2WqfANuVrik4XXh+hPyab2VmxsmvQFL6j+Mb/YhvccuAaPh7m08UMk4C4s8i6os+mBNux8jaDhGp0Lhz4HlB1hlwsHrqWNvovbq1MkAnT14ELIILvv6YY1wy7fGQlmdA8sfkmvEY/NfwO94gU7ZVnid7xlTNtcgFEdufkZUeR/D/PWQTtlUpnMTWUQj6wUYDubVHhi38yWdyKQGq2saCCfEYd14fpXbFA2xXoDKalDvOifxTQ21NM6Q6KDhoytanjVY562IYCZoqVSsesGpNFOD1adt3hZ8v2b/Zkrc5MAKkGNxDUKVWCPOmPnjD2Leuk6n7JGYgddX8/Vq0vgZJ+B3N0GnzFBY2J7VeKQfT/AAyzW92nQG/CVyMLjwB3BkEBMWM6q92vc6wIyzAE6fAtCBwVa2fc+ESjwUlOfyKO2TJ4OjjtIps6R4EVqvwC/KNPGA3rCI12VkBUh59qZoiDhmmgj7E56lwTP9OJh779jLtVgmKdO1V0jAkf5XJHi0IlTI/a9i+CijDu7dhwBGjgF10QX4uTE4MjGVklAVequ8KOrTYSuYkGZLxEeIR/WGTZ36mbHCsFW5eK1aqsFSsb4Zto2qcZ6w3kyoxAFYeUE4U0SUKiEtDHwSAwL44AGWcsJbuoBqsPw5sKjmrQwCLPq87XsBzr0Q4NSjcLsb9xn43FKUZwlIWOzTIRxbAZY/E7BVEvbpLcYKwxs9x+O5b6uv6JEZto2aW9+JtyW7o3+F16G3mDEW5sASb04ySjJob1Mn6o0QUA0WdXDH+KDUa7CoabCzHWDySaDefy7AAZqawlDH/kg5TR7WnyqePh19JJ3wljnyFb3FWGFQvfaaByVY7NdoeQJS4fC1apqNxf+lGnA/CHbDbb5vJN7kQ5z1WYGgJkJ8LmkU/9CCzrFeUB/7BMDYaoCDWY4c7I8OGz3iEv9YGZIW1yBUb87aa5ao1Bv2xOT/6S37Zmw5Bk6/7zRo3HgeTN9wwZuPzefDjHvPgOa73+ovZ8TKm5T2WkocS4Uhn7Db/cJTu/WWfevaa+H2A6fA6vZ3wZqOCwY87tr/DrjzwDT49sFSGJFu+L6gDkN1fEAQH+zOfdrd00FFwlvSw6kAcQgD+J52f7tkUYD1ym5Q7/8owJX/CLAXgy3qf5WrvgBtf9flcNOkLYlEGWnc9CxmrnaCrIgzFR6dY75k3LT5YhBqq05ZoCQIdzI8PudlvcMcWhQ+5pyN593p+Doz8XNMBimOAkfU6N9ITco3wFH7sDDwHN6vduD/+1eocP4G267M382FhWt1h8XVQuQyWNJwh06YQwsGHwKaXsXO5KiEluu5pu5unTLnjv1j8fo8E1z1TgziGjEiwHs94D5nrP6N1AR0gSdfx2uamkYfwx07wPX+AFePbUv8QoH7+sEJMCL+In5nJguybbCkbsCKHsECLOuZ/VAw6MAAQRx8EUvcXZgs0bnW6HO9jve6k04Fdd3VeG/BwOoQTUthsEnUURfAovrf6lR5mPm9cdDb/Qo4FiJzpV6Dht3HwcMrzTcPNG+6Af/9eiJhgYLnoW2euWZ/qp3yop/AE/Yf8Jw9S+/NnVRxzHt+B8rZCq64Hx6fm75j/tn3j4BDh2/G/+d8vSc7Ds0Pph6CyvgK2LaQqs6H1rxhBb6/D+BN0NV7MudQwIs3KuVugbY5v9N7w9W8/h8A3E9gcHw6nuu5ZUQOPALV7r/A364cut/fmo6f4zn0fp0yS8EHYGkd/n3D1hw4FU/UJ3TKEnk+BocP60Ru/KBKYikePobn3Ll4vGsTPzBAqSfxev0Zft/fgUUNj+u9qd3RMR/P+8vwe8ktMFXOk5i/3wJLxjyp9wxvzb534rn9B50yQ8kfwdIGzAPfFOyiad58Pf7f39Cp/BKYZ1EeewADLElTFWSfhxUsf0JRzHdG1IC6Ee+rx+D5tvcQ7jfYZcqfbFQ2weKx4dVEhmH6pnfibc/shdRHyj/C9vnn6JRZzZs24b9zEwkLaHHq7fM/qFPZozUeHSxdizwsJi7VPgze7oHKUV+BbbP2671vatr4G/x5bsFVf0GOUePmB/Am8SmdMkOpz0Fby9d0KhxNm27B7/TzOmWGUk/ByFFvgz9f0q33DLam41nM5O3UNsdhKiyvM1/bvObAx/Bk+ZFOmadUFKrE0bCgrl3vyQ4173kK8xQ1y2hQlY6AB/C1boHF9Y/pPW9a3b4MhLNKp3JHoziFPBWWjMVAIYC17Z/GwOw+nTJE3QpL6m/SCV+wO7j0mvRW/lENjr8GIVUSGAw4CgUFVwewUI4FWDV/AcBkPO9NB1f0t6QXhz3xN/Se8uFKe8tuOMJS/yuklLlaoFSEyH49NtK0aTY+HvMX0M5HcEUcgSVvuB6iB3dA4z0f13sTmjc0Gg2uiON8wP+76TRtONl4cEWEuM3vqxaWxo3/ZDy4IkKcAge7LtSpwajZRqopOmWYeh2qn7PT1Cy8M/SWHUI8nVNwdVfH22Bt51YMrv6IKbzJ5CG4IgouBiUehbUd/6r39PcZ/WyGECNBuXN0KgBhfooGOXAOLBLsLi7E8XorBBQc0AhCmgNL7yoVFFwdxIJ4dxeouXjez8DDvOcwZez6Fwyh9QtdZyesnPia3lNGbI4gFHY6zTbfPQWvOcvzzkX+ojcy03TPuRhY/R6vxe/h43S9N7+EmASO/CG+j+V6D3LTB0K5cCvSr15R6dnLkYT4gt7Kr6bv1eOJTbWndogh+njURKdi3meniYKGzy88Y/jm3qyof9Abdkj5N72VmVUHxsPqzg3giW1+sBMWJf4Z1nT8WKcAvvHyOPxCzC+7J2gOtcDM15KKwatvDH8nn7qqCg+QvZtUEB4FWNTZu4QiLD+46kwEVy2LAM7F++mebv05DaNawKg6sj5SWVERC5PJ9VF2arCUaz8zVNE/661gLt7qYkCzCoR8GC/Dd+m94RLwbWjecLW/rSyMFJVqP96c0vfr2LbwKXwTdiaEFfJ8f/R23vX8EIMcOyOJqM9izPu1Tg0mhL0RhNLwGoR9bu+eAsqZqVN2OIJqnjKztv1KiMSfxmukRe8Jmfgo3LHvv/3N6pF1+F1bGCXtZlArbzi/kNKDaOWgAvfwAdbokUfhb4W4yDNN0UATjFoIPMJCwdX+dszLDoOah/eH9zQDvI7BFc3WbrJTe3+OaNVb5cX4Yp79uBV2arCUWqK37FCwDbYvCD7hYtOmt8GTB1rxWC7TewqIc6c/kMFGyUTgTbn1iqFn6Fbyfr1lmFOJH+kinciPpo1X4Wc228zanxSfhKfnH9SpwWwW5B0wv0QOcXpoMIpdDqQPSpOte7kG1nR8D4O+e/B/rNd7C4Pj/qPfX82x1JHaGdxEl9L9u0fguWa6QPYCXDdq0GSzwwdY1DEwVJhv5mHOxbyh4Grfa5h5O6AWXwtwAQZXr2FwFbcUXNGfpHtPLFZ+AdbMdTVgbw6sLuiOml92o3HTUnAcu+t+Cu9/9dbwGjfNw3NoG76naXpP4Yn2Pog373/UKZOG7xAtPHtrRor4h/SWfafdMwnzH5uLFn8ddswbpibGQr+YPtJCbfM3u44GoRI1qPa0waL6YPPV0fxU8RE0ZcJsvafwKO8+LJSYnypDyU6IvhZsAEPHSLwnmO6HlrqGdPgASznhTTBKga6/RA4+in0Scnr/1Bfqld0AEyaBugELPm9/CwZXh+3WXPkRFnJjuXVqLkbRkSfhGW5nbhpaNX2o0ng2Zt6LgZX3bZ2yyElU1Q+nacNKPH4bdapwUV8wF96hUwbJ4Ws9Wq96Hjx4RKfMomkF8sWL25uGR8pnoXXeZ3UqPZu1zTBwCRMjqmI/xGvJ7o3JUW/2XRrKms73YZDxKP4P4XbnGY4Qo/Gf9+qUSc/B8rf26u2heRXmz7M0k9gOf3KE2sEdgwM/wCryNQip1qrrAMCeVwHOPg+Dq+UAJ00AeLULM1FFx1j/oiVK7oOa13boVPlQMZsZttnaK+pc3Ov9GhzX8jwk4kVobRm+g3vj5jVYKPiSTpUnEXDmbwe+q7fMos78b7vHbv8e0rRpMcYJ79Qp86q8j+it9DbsHQ3S0nJsNClm0gzbOaPO4yDO1il7vABN0HceoBG1v8CAvCqxowxRc35QwrPQ10+lLIwFqMGSdkbnBEGBx5ERhEUYYFGtFdVOvfoi9dcBdcUCUIsuBRhZgcEWBlf5+kwS/mJvBE0Bs7HWVB8aOm1K02bMqLsfxavRfnO88u7RW+k1b7wLS86Ldap8yYC1HpFqe82EccvNhFRrKmCNTlkgbkoMBhhGj4Pvw9JM6LQG4fzxZmqbadb2tZ0P4DHLR+fxHbB07NAFY+rTJOUPdap8iYD9r4inTtFb5qjUi/4HqN5UdvuDDIkCLIwLqGmNtotFX3Nm+16Azn0Abz83MYHoB88EOBDFfd145AMcehMSfX9/72+XG0eav5D6KBj+pjGcpo0nQvOG1SDUn/CcOUHvtUs66/VWak0bv4on8EKdKmMyClUjgtVgPTb7FcyjMh/pFYR0bfQte1OP9596yzwp/gatc2/VqaGJisJeg3Dz89Wwet8i6IIn8do3P/dZKkrepbdSo7UCbU5wWlQCNOcfYaVfbhZ9sJrvm5CXUvVQ/P5XervQUWBFAQ3Nyv76awAnngxq4TJQiy8DOKYO4JUugCh+nnwFV3Tg/AArFrxTcylRyl6mHan6pd4KjhYzpokrabRW0+atmFFjpuDYHTHYn5L/BTvmpZ/puHljCwgxYCbi8qWeh22XB5+Y13F/oLfMctSZ/kLZNjRu+hy4YG+SzMpeWo4lIM9e3yFPZr482LpHKmDNvuPgzs5ZsKbjLjhU+xwIdy044ij9G3YJ6IUxvZt1arA7O7BAJoKPLix1wg1W27xCOZjHGe46ovbAhNrndWKAoUMXGp5NI4jCQos8d70E0Lsft9PPTxc6CqyiUYAD7YmAZuo0UOecA3BWI8BIGjXYY2+U4FDo9bz4y3DN2GP1nvJB8zY92bUbCwgWbk5SgXK+iRs0BX+KE1NQqaAWfzYShBqBJfnR+P9Mwh/QRIrjEr8TAuG8HR6f81edGojWEpTx8hsIkY7y/gfaFgRvnjtz81HQqwYN0zZDzYfWFrODDd52z0kQl+Y7fvdR8ipomz90bWl/azppIeMFiYRp6id48v8Fnwf3UVLCwyC2CiTUY36JNxx89mhbnoQFoOPwerXcJzId73ZYMrbfRLpJVrc/g9ezvQJkMaFg1BOT4Jraode5JKvbj8fjFmxUZlBC/REW16dcMm3oO37jhsvxBLPTgXM4fm0QPh3EACtOS8eEdJ4PhfpXHcL31o2P0XUAJ2NgNXMmQDOe97UVAB0YdPXgI281Vkno2415a2H52PzVkhSKGRuOB8/whVTMPPgT7JiXuiPztBWV4E5+AW8w+SmdFwW1CoOaa3UimOmbfgsumF/iRsGPoG3egEVkc9a8sRUzCDtLoCn4Jb7fzBZsXr3vtyDc8JYHKjSH3Ylw4+jXdWqgOzrvw4Ljp3WKgXwGljQEm+JjbedFeH4+qFNmKLgPltZdqVMDDH3nFxDikE+MDpReg7BQOrhT7VQv9aHqSDQBdncDHHcCqI9cDGrpNaCung3wrmlUJQ3wGgZdeW0OTELHTOL79Tw7TReFLm5xVuhi5Lrpg2zn+Hs5uEqmMu9j5zp2Jh0V6iI4b0X6JXsy1bxhBf5RO8GVVIdhxMHMViLwm20cmyN+i4uSt6UNrtbu/wgHV8kyWBNW2VgiJ30H++Hu/naGzQbhBwgYoIQ1RQMFUzEM8A5joEQB1V4MqA7sB6iqBDgV86aPzAJ11SJQS+YDzHoPwFS8Px3E39+Dvx8rkFGPnnwFrptQnh3chbUJRouPhB9A65WDV7QnTRs/gLnApTqVP1K+gdfYY5jh/RgfG/GCWwdSfN+vaaOpJMKmslhaRdK8SFSqMU2Mho5jzcywPmP9qZjtf1mnzBPqMvjr8gM6Fcz4juPwsFETOqMJMyt2fVGnBqIZyEF9T6fyRym8Ccun8Dv6JSbuxcedmKd8B/f/Cq9jc6Ops5bBmrBKmp/MVqWeooEMHQU0bXwUA4UZOpVfDgYyvR0gul7B7b7mQcy7qC+TP6qQ5BDEKPwbFETRg5r6PAyO4vigpkkKjqjP16hRAGPqABrGARx1DKijJwIci4HUBNw3Cn8ex/+3C8+9KP7/hciL3QLLxoezaGzYmjd9C//NrImnFEnVDbJ7AjyxtEvvGahpwx485yfolF1KbcdL9qeg3F/AiP1/T3sjpv5zTx88Ay9ELLngDdtWbctQXHkCPDb/BZ0KbvrGX4JrYyJFuQZa5y/View1bXwa8zc7LRNKfQfaWq7QqeDWdFyA3/FDOlXepPgwXFObeiLgNZ3Upw1L9HmgFF6b4sfgqJ9CVP0Nrm3YrX8y2Nr9J+M9+RwslMzGwtqFem8+LYIldUOPuOyzpv1/8Ob+QZ0yQ6kZsLQ+Zf/V9BEKLfJcPfpFPGDj9Z78ogCr+3UQ+MBSLcCBzsT+mtGJWiQKjHIRwb9BczrSoxoLBhRMjcRHdQ2osWMBavF16sdgcFULMLoaXxcDKnrJHnwz3RiIUTNgoaJvlQrSMZgCnwm4zEKpadzwM3Cc/M2EXaik8wnYPif1UO6mjZ/Fm+1tOmUPzXTuiluhdW52UwI0bViQeJ8iP2urKfUytM07Dl8v80yGRmKC2KBT5ij5f9A2f4pOZYem4LA1SlTCXjh11NHwwKzMS5urOxdinhXsBlnS1BZYUn+5Tgy0qvMkiFiYjX4Q9Qaev9+Gw+76tM2UQ7l93zngOrfi38jfgvC0ZufS+mAjKte0P4nBhbnpe5Q6BBVqEixs2K/3DJA+wDrt7umgItt1Kv9oQffu10Dsodq/KoAz3gHqFCx41WLQMwIDniO1WFmg4Kwa/2YEgyuqsarA4KkGA65qSlPtFf4OPVPNVC++DtWaFXJAlYzeeyz6ICwf/z69p/w0r38Ko2d7a5sVh/XQOu8qvT3QtNWjwBmxBxxRo/eYJ1Ucg9zrMLDKfe0xmqrAO/wDvDjfrffYo9Rvoa3lAp3KDC08HaNSoZM+b82W65wGj83Jbk1R2yPCpToftrc8rFOZWd357/jertOpMqV2w+t1U2ClSH2jWd3+M7xX2S0wSrkJers/BzdMCj49STqr22/D9zv88ki5klJBRJwYaL3GO/aPxTLTS3iumevPqGA7LK1LW8Oevg9WPBLi0P7E2xJv7AEY3QBq0VJQCz4FcH4z3hgmAxw3HuCEidk/phwFMLEOoH4UQB3eX0ZgMEf9pvb3AnR0A+zDxxuHAQ5gurfAa6tSoeBTqn/VqfJz5r1j8RzKz8SdhUrB/0sbXJHIiOusBldK7YBI9DQjwRWhyTxb558LEvIw94/IflkVmjvLE7/SKbPi3of1VuYUWJztW63OOrjylXl/SSk9UOLCtMHVmgOnWg+uhLwCrmloMRJckaUNn8Nzzv6cegJehbF1wfpsVkSnGA2ufHLI/l/pAywX8t/voQ+NvDvYCVBdCWrJUoB3nAjQ3pMYmdeJz10Y+BzM8XEommjqo0dvPBFE5drsWAio3OzJv8NnJvwusaMMRdVJeCDKd10upZ6ChhfS9wOauQ5LFBb7pyn4A3R3zYS/L3pC7zGnKvYB/Hwv65QlOS6DJOA+vWXa8Gv6pUL9ER2wtKas3AWtLdfoRLbKfMSvuAiW1qVv/hPeCr1lnt+B3TsHFjd8R+8xZ2ndrZgX2LoWEoTaCbNEsGZpaWUh7CwDLGV1ZfOhUZxDAdYHscA2bSLA7i6K8vFgmq91Lyl0fKjvlfTST1BXDjyLs0IXOqWewcLRufDwSiyJpBF1ZuPJYqc/k4JWaJv3LnhuOZZiLNi2MIZ5wSU6ZYmXW4AVo4ktlfnPL8RZGc/qPn09TYBoMZiu/pjeys76zgb8YLn1LStq4iNwTX36meZXHRgPStg73x3nPFgy1s4yT2RJ7Rw8SfbolAVu8GtVWQiwxNBTRAwVYIVXqqCJO487DtTppwC8EdI0DcUoMSLyt2Vde0VEyMs7hUWpv4LXPRP+3rJX70nDsbOQs5I9oDz7/f52LPgD5k+/0SnzBOzSW9l5ev5B/C4yX0opCK87s6Yi4dhbiBrUl6Dtn9p0IjtxvFaNN9sUA9WN58hFGID8l96RWsSbq7fMc+SVsLj2zzplhxAKr9XU004YoYJP0SAsBFgeFmiHkD7AciC8DsKHuwGmngjQgNcdNeFxfDU8qr2iAEu48/Se8mWjpFLoaA6ptt3vSDsdQ58Z6/GGJs7SKbNU5ErYvsBiabUfqWipIvOk2g8VXm4BFlFgZ9JRJYIv/ty06U5wxNE6ZRbNYdba8hWdyp4Kca7F0EgagDMz0Mg3BSlnCM+ZgAdgUYPd5rs+e/++Gc+XgzplluNmMgeW2XON+s5VVA2ZV6QOsKgaWsqJOhWOsbX47tLHfywJNat68a/CsvqUi06WFZuLPBcaGqkHYhlsnzsbYOXwozHi7iy9ZRaNvNs+Z6tO2ad2/xLPeT13i0GOsxO2LTysU9lzKn+M303ufyeZggv9pY2G03TPuXgTvVqnzHMcM0v3KGVuyHxRkPdAzf4ZsGTMk3pHencemIaFoWk6ZY6CHqiMteiUfSsviGOk8TOdMkvEgk1dsfl5qiU13O1JvARX17yiEymljmDih0/FC4g6wuYfBoX+PFejR+D7GP5+wRDVXvX2PAXLx/+z3lO+zr5/BLiqPErFtCCx403PaKSektmPRBtKRNppdkzniZVRvDmbb95QQ3daDaz1ikN4XaaeMDIXDoyByLHv0anUzlsRASHtBbsKlsDjc83Mr2ej2aYgqZ345X0cljTMhblT0veP7M+T2Q1qGN5XYf54OzVK6ShloduK2g810WC1zd0Nx+PJZnihfbULr3Gq2kgrTRWRe5zeyD8azUdzVNWOAohxgDUsv2M7HicFdm6cxab3wAl4UBp0qjTRxJ0efBLaFnwIWq8Kvg5X830TwLHQPKjkQ/DYguFL5KY5YH6ZDhE3E2ARIewEOWqYmajbj9uM/9ppgaBpMtrmrdWp3ClZ2msQKrkP//kcjH95GiwZ82O9NxgFF+ktc/xRg720ykV+CSd4PhWUEM/DFUcf0qmhybj580wMn/+kDrCEatZb+UeTevqzqmOQxTVYQ+sLrnpiLXD9xDzM8lsEoiW8aCw1wykxC3bMOxMfWcxr5L2bcjqdMEdF1umtPBMW+ntlsHDscGpqfga0VJF56QOs5vX/gF/xP+mUWVLGQI4018S86hnM5Eu1OZ/6WTmfB+WeDEvqvwazGmm0VnDrXq7B+/DZOmWOAz+CpROH7qdpg5KZzwo/vOD3PCdiYwThsIWx1JmtEpbmTAkgGgMYPRKDLAqwhqx9K2/U8Z8OT1zeDjdM2OTvYzTbdWnN3i7lE3iZfg1c90x/dvG2udmPClNypt4yx1/rsMtO/4phCfM3CpVBp9nh/PkSDK6czGotghDipMSizUmoeVy539cp85TzaXjiknadyl3lUVgYcvKz/FFeKAwiaDFk8SFY0nAqLBlzG1xTu0//MDPeqGb8nvFGaJrIbrmqXDmu+YIGTUkTlJQWAnkn2wDLC6/jIdXI0HI4lW5imw1GwRUNAOjt/U+4dmx5z3k1iI0LKY+U2gkezaMkboCIcwZsnz8dWud8Dh678hH9G9mTcJreMkfAX4YduWiNNHxzllEQbu4jCPsT3g/0llnxyIf01psOHd6M30edTpklxX/AjnlmR0aqYp/BXb0B0vsdCHULFnY/AFXxqbCkfg4sqf0f/QvZk/EZesscGvXWE/l/OpVfKoo3dcNEBgEWgIW+fmLYGrTBAdZZq8aAgyWkMNVh4I7xlV9DwwajVp6e3l/AdRM+pfewPnkbQaja8bVoRnFqphr+QVXkUr2KRdOn8f/bjo/f+jctgG/j40ZMfxBEvBHaWqbCjpaPQevcf4dH5xhcO04JvNot1O45uQd+2VLiKL1lhnR2Q+sVZpsyug/9AgPbAzpljkhaNqfp3o/iDcfShJR4rsv/S70IcS6s1CqkIKAXP8NL+MBrMfCDaqN24pt8Co/rHzGQwqBJ3Yl/jWZVvxRE7AyIYIB4zdjzYHH9F2Bp3c+NdhwXjvnRgzQp5nWjMA8KQ+UEvWGOymAOLOPLMckOqNk37Ih9qgsZ6LR7zsKbwV90Kr9oHqeDWBj+xPsBzjweoN3OZNBFi/pc0TfWG/0PuHb8xYmdbIDGTf+HgYS9Jm4PHgZH3QZQ/WfwnjkEkZOCjbaNHxAwZryXaDYKQeP6iRgMvYSFp4jeY4aCBdA2b4NO5VfTxt/gNXG+TuVOqp/D9hbza741bt6C58xlOmWG9Dxwqo7xA0LbC3d78j2wY775iV3XdK7Hf+cnEjZQDRPcBJ76JYzYhYHF0RUwIuAi3Afw98Loq9Tnjn3/DY4bfM6zQNRPYEl9bjPvZ2vt/mvx/m6wc72Kw+HIJLhx9PAFom92HQ1Vsd148zSY96m/4rF8u06kNfhka9o0G/d+T6fyKx7H941B1qWYx00Zh8FWZv0CSxo1CdKxicfXwLKxS/Ve1l/Td44FEX0BT+vUTd+5UvBjDCY+rlPF5W33zIS4NF/b5Mn3483XzqzlQ5m6qgqqR1FQUav3GKBWQWuL+WVlGtd/EG+WuTcbJZPOJf7cY02bfoR5tp0bp4K78JxfpFNmrWnHoM0xFyD3p9Re/OdMWNqA+UERWt3Zht9po04ZotZgUBDOvWNNx3cxXzZYC6qew88SrAb09vZ3g+uYnSZCiO/D4trZOpVWqhvRCfo5/7BQBiOwEEZzYPEUDW+i4IpGVx7uWcbB1RBU9CRrwRU1k7TNNTO5Yhhinvkqep8KNkzatBG1bzcbXBFnp94w69TaX2CgYmFS1FiTv9agreAK4CVrwZVP2JuvznHmF21wtVVRB2Tznf9tTHwblIQL9ZYZMoPlrGx0eVIyUP+vFDcjEd4UDbE4wJhRADU8RYOPmgT94Cr2FER73wE3TAw+oWQ5ciyuQSjgx/hP8fYKVMrO3GBOBfWWDIH8pN4wx8txked0Hpjl4aljfjShdBZhecJe7WHEsdectOqNY/F6mqxThqk9sLj2pzpRfF49SAtgm+8UHhaqQXIM95d0IIMO7hZWCxDZBljKC2+S0SgFWKMxwIpQ04PeWaaoqwA1CfZE/x0mNjTC9UfZXZSzFCjH3uhXCbktahs2K0O+kYKxeiuPVjgYsHxaJ8xxhh8VlD1pfm1CR4zFh51+VwD/ZnaQRZKIa6+Du1RP6K3i5MZrsEBnfgFs1zE8k3lAEWeZ3jJHqqf01vCEY77grWSgDvYDA6yZ6/CLtTB6ISiqsaEZ3CMUXOh95YR6xNExILHogxCLnQWfGXcDzBJeYicbks1RSVLYaT7KFwGWziGZ/6VOmicvxQ9ktglFqdegMv6iTpl3cu2DGKTv1anCRqNcW+f9i07ZoSzWNjtOcU+67EkPlIU8X6nBc6fZduehSfhdWxjtntF3bDaPolGplRWB7gcDAyzpHIP/s515VIKgWps6DLDKjd8UqIPKeOxPEI19FJaNfx9cO/5viV9ggQiLUzRUesWdaSuVojuAAUq9Q2/lx8VbqUnyy4mESRhAb1sY0wnz/GZCoGk5isFH9bM90rMYmGdQu1GIXAfPcQvXq4ImuO9VOzXZ6cjoGr1llgw4i/vqPaPwupuiU2ZItQsW1AWacHfglxh18x/h9qFFnisrAGpr6OCVvr6gip49L45B1RbojV0Iy8a9Ez4zvnj7D4Rl5tZaPJhmL6QjVAdUjTGzuG1oLMx6Tlx4D0xbUalT9j3VtQ4/i/kOwEraD6ClzH4W/rwRy6Ctxexkq6k4rr0AS7nFXdus3C4MCsxP50LdBA6OfK9O2bem8334ohaCdbUH2h8LNoDBrTgJA0uztTYCAp9fAwMsB+yN6hgOjZIbicF1LT6iJRhhUSDV9yA0S31v7I/QHf0sdIm3wPJxl8N14x9K/JBlTHa/BQPWETpllid2hjZ/lTmWmqfEaHBPWKATdjVv/iRmbi06ZZbj2q/12NHy24JuJpTqd9A6Nz8DaWi5H1tcMLfcURiWjmnH88T85LRExj6jt+za3FGH16qlZXnkM7DygrhODE0JC/2vgq9XOjDAEiEuM+IHWDUAo6oT28XIr5HS2y4e2iNBFaYpoPJiOyEW+z5EY4uhN/oWuHbcOXD9+K/DTfVFXjtSADxpcwRhcTcPEsezN4OzkDfrpjt7pm18F+Zs9prYVPBSafaEwnPJ3lqBuaCFnKuqzY/MTGVtZz0ecDu1zUp2QvS1Iu8vieeJQ/N4WeC458LtHe/RKTtoEe/D4nfGa476CDd4fqyE+ZpSBYFHGw8MsDzH8MRmGaApGmpHA1TTCEK9L0x9wREFTRQspXr01Ub1ocCQ+lFJ9Rp0R58B5W3F51UQ8y7BoGomXDNuKiwfNxs+M/5OuH5i8d+0C4rFztZC2Rm+n0+RupdA2ZqzSjTAk13f1Qnzpm8+HyLwsE7Z4bqZrGuWPccJZxLn4QhnDmy7/A2dsix2Ir6gndGPtBzM8reWwBIgzrDLsGTNxSB/8/PmRykS6vNUMe4PuNWU2GGBzGiKBvPLgznBl+jBKKEPrVWmjtWJ/KPghObAqsa3FOYizxQzUVBF00TEvZ/BgcPfhn0HvwIdXbf0e9yK+76OgRONtFmER/GfwFMfh/bDF2FAdTJMfPl4+My4k2FJwyVw/fhrYfnYrXDdhEf9v8/skBYupD4ZrXlVoLbN2o8nt73P4cCl0LThZp0yp2n9leCq31AEoPeYR4Fnd9R+vyPy+Jy/4r8vJRIFghYXb5u3RafyoMJmS0l+vkfbhM2O+mICHK77Laz4jdlls9Z2zABRsQ2UM1PvscN1MinwGm7ZoOAkeH/NN6tgTrtnEigapkzRRQg6DwJ88FyA804Jbw1CqpGiuadisV9irnMjXHtUq/4JK3SNG/4EjnO2TpklnLfrG2Nxa1p/Lwj3Cp2yRK6B1pZr6A6hd2Rn5r2TIRr/Kl6T5hcZTibhcdg+73Sdsq9p0yrMec3PDZQN6usjD0+CJ5bmb9291Z1fxM9vPhgnQt0Mi+tpQebidueBj+O9/Ic6ZYeQ28BzZ8M1tbnV3iol4M79N4GCf9N7LJOnwZKG4e/NNCP+3s6X8YNO1HsMUC/BkvrAc4W+WSqUCv+nkIIrCmpoQui6kXTBhysW+wVcO/79HFwVEVqXzrHQ1u6TUYiNKJHmXIeq7i1zlmAA0QrNmy/VOzIzY/1U/P+/gdfhs3kJrojI8xxnhdRMKNSleQ2uiGN4XqL+pCzuKRr6eM6f9JY9VNPkyB2wtvMLsL4z85Ue1rXXYrC8ENZ2PJG34EqpgzC6N9j1+kbP8WaDK6IyCkb7Vbt79tpMh0OLPI+oAhiDAVY8t4Jv1qj2Kh7bD8fs+Yjew4pFzQi6kOwsBaPELnjikkBznhS8iPqF3rJLiEY8cN+Hpo1P4uOrMG3Te/yFuKkbQjKqOW/afDYGZNfD9I2/xBI1BlZwPWZN+Zv6AWR++9hRbagCe31sAlMboK3lf3Uif5SyF2C5RT5FQ5+lo14DZWFx9kFExA+OovI5WNO5Hh+XYNA0NWUfLRoZeOeBabC6Yx4GZd+BuHgOr9W78Fq1t4JGMgcLQ1ccHawvqddroSk6s9Ue3gywhAhvkWd/BOEogFG0yHOIPdxj8F2Y1RjVKVYsPItz6mR4QRW0x+a/gJmpveVPkglxCj5uggj8GlT0eWjc/Aw+/gqNGx/2n5s2Pg0qvguEwtK6+ga4In9z9Azg5KeDe3/hTzr6ErS25Gd6jf62bqfA2c50QAp68FH8/SX7OM6P9FYeODS33Hx8/ADPzWfhcN2zGEQ9BnfsexjWdvwBA6/tcEg9B1LuwGt6Ix7nf8KTOIyld4J/v3ZmRcioMPZmgKVEeJOMUoA1eiQGWXjthVWDRc2UVZHf6RQrJg7Y6zRLmU0pUXCP3sovB0vKtBi3o87E7XP9Z0HNuvmsqUojHst/rYfrbtVb4RBOfqZkSLbnOCzI27oxq+dhcV2HThS/qLQ3MndY4ljMK073p3VQ4p24YzqeMyGsO5okowFHFrqNyMwKY/2aCC0uMzIcaiKsG4MBjosfIIQAi5oH6XV7u3k+qqJkq/8VkpmVWAqeK76L53qwSfrKgfQ8PCb5r8F67MpH8AYWVjPh10MbtOGCvQlGM6ndKAbXNuzG/OfXOsWIyKAPlLBQ8I6IjEapJgKss1aNwYs9cM944yi4GVNDq24napLyjV5TwAGIVJRGB8lyo2zWYKnS6NPR5/G5nVigWK9TzBEvwPYFe3Qqv4QKYdJR72lonfdZncg/ZbGDeyk15/dxVJ5G5hWJTGqwlDIczMsOqN6XRYDVU3cSZjS1/na+UXBVGQGoHYPbIQ0hdPAweLGXYfk4O8sTMItWOCCkvVJxZST/tRu2VUS/oreYsjg32HBc9369lT/KxtpwGVAWJwTOYIbtorGk/jcYiPOi/0SpKMQqgxV4Vx0YjwVJs6sF0GoPc6f06FQgiQBLyuP95zAoD6CqAqCuJtz+V677hE6xYnLalKPxQpqsU6a9BNuueFFvl45Hr34VSxT/qlPlLcw+do/NacW8N5+vfyO0zQ87CLFYg5XZEPqioRR1PmcCXoRrRwerba5SU/F/MDuRKq0SkKFEgOXIZv85DDRqsGYUwGhagzDEAEuq0qteLgfRKC27kTiPTVN0TuQ4YWahal3wRTzn7a1PWCykCDfgECI/M6hL+UdonfcNnQoR3fgskFKBp0pjFvdkNKmmknfpVPmSGawXqjzz3UayWJO278YUXv8rWoPQH0GIAVZYUzRQJ/eYLK2+NuWiwuIUDaWwyPOQVDgjybJmYQRM2MP6hZeHAEtJqKi5WCfCs7rrKMxr7SzHJuAVWF5ferXNffbWL8HvsbCWWMo3J4M1CKWwEGBlXkOqmwhVeIs8U78rfw3CCEWo4aD3UO3u0ClWTJSwUyImKoT5kfJp+3yaLfoLiUQBo5F+Uv4v5XB6jzkVIa9d13rVM9ZHiimnBR6b/YpOhShqvtnmCPUcBm+lWdtMVgoJQn5Apwqb8h7GfywEg07wAq8QFtamdTIujOkmQsdsZ7BM0BxYdaMxoxP4nYQQYfkLO3sK2rtLt/RT0ixO0RDGBJT51jrvFrzwwpkbKyjHOQeEuxm/a9NNwXvg7y+EX3Mt1Gt6yzzl/Q+0zS2M71dZqFXoI9zSv1YXj92O58qndKpAqZUAVZdigFOnd5ijVPDmfCnNFrwF9EI88yW1HDh9E570coJO5xf1faIRfLUjE89hlD+o1cFxnocvHssBVjGyM1tvgghhAsowtLbMxcJNiJMapqEw8JDqfHx/f8EL1fzoN0ndAlaGVW+e0Lj5Y3gzsrPmolKHICou06nwCWWhVkETmUxAWcQW1/8nXhPzdKrAOJ+HJfVfBhFvxnv5KL3TpGA1WKv3jMJryuxqAUq+ANfU7tOpwByIySn4NHiNsHzwm+YqE2sQhtX/igK7Xo+Dq2J02mYsJRkeittHqsNQM7p8+uW1zf80/vutRKIAKPgRVFY3wfaWh/We0/SzOUKEux6gf/5Ki32w1Gx4ev5BnQifAnsBFjilN0VDOtfUb07UZBXKhMFqJ3jqQlgy5rZEUr7HfzZKdsCEl3brxNAiEbwnGJ52Solgr53EAdfSulBBeBRgVQPUhjxFQ3Vku06xYiKBFhm1UVKiC+px+PMl3TpVHlrnXeeXjpXMaK4Xo2hkoxJzoW3eJ2Db5W/4+5rvG4k3Z/MDcYT7B70VDun9J5ZtR+iUWRIDt7b5P9WpwiBgut6yIF6aIwjToZosIWfgI39ri6b2LajpbIRl9Q/pNFVa2IgpHg+8TrB0zZ9nDvxRb2XEwTfTpLfzLx57cwRhPISaeqq3owCrN14AK9uzjFWIvXrLPEd+UW+Vl+0tmyGimkCKPC9GrDrwWrwFarpOGdRnqKIbM1Ya6muQhL1Q0XuvTuVf8+ZrQDgWSvqIPluVN0enCodw7ATuSh2Eca+Wfh+sZNQna3HDGXgAVvp9hPJKbQFXzYQlddcNmnxTqcN6yxwPvqS3hqeU2ZUZ6NjG3NU6lREHhLI1SePwon1TNNAizyEEWFRpRvm265ZP9XIpeXTOTvwOzc4PQyPWQCzD0n/5rgH22ILnYPvci0HJi8BTP9F77ZB+v4ovQHzUVGhr+QL8dfng1RS2LYxhqfjzOpU7mtyzKnYu/l3zN4Igmu9+K2Y+t+uUecr7uH/MCo64SW+YJdwrAtdulCLq9xSVb8XA4g582FuNhAJZkPeAGzsTX/NyuLr+Uf2TgZT8Ov5jpvZfSg/ziIWwrOH3es/waPZ7UL/Qqdwo+TI44jxYPiarwryAxg0vYOYVTpDVgefCO98G8OEzAfbT9ZHnZkIKruh+2hs/GW6YUH4loFLRuGkhlqbOAumMxkwg8858QrhY0OjCq/kFfNwHrVdxjWZ/M9edgiW4S7Ak8hG8RvGCzZEEzHPgISyV/gh2zP1v/AKCXfiN93wcHPkBzCZq8ZFZiUzQxa468MUfBe/Fe+GJleHdkJs2Ponvh5q3zVPiG9A290adKjy3t78bv/vZeNOqx+8wuwxfUNuDI7EwtAci3vfg6vGP6J+wb7w8DqpHfhIvqY/h0T0Hz7PR+idZknjNiD/g3/opdEd+AjeOfl3/YGh37n8LSLUIX/8o/BtORt815ceePIhxyS7wqrbAshHZ5cdrOq7Df5vx79Vkdl9QDr6JDnz/bVAnvwOfzn4JPQFNG7pBONU6nV/t+wE+eB7ABdNwO4RuH9S3PxbvhN7osXDj0Yf0XsZYOhRsRSsoyHo7ZkDH4zU0BUt5x2AmNgIfIxO/hKSK48968GfUj2oX/mw3Zlx/wbDocdje8mfMevJcmioQTZu+gbnu9TplFtXMbZ9vcdoSVlRoPb6IOhsvtbdhgEEB/Qn4fBwGLrUYwIzAZ9f/PZoF33UOgYeFTAeoM/cuDNSfwOsXA1f1Z1hch0EWy4aA5g1YEgxhFCH1feo6DPCp9wHMmAzQkecm5CPkX2BJw9k6wRjL1LTVo2Dk6CqIR+tBuQLcmAs9FYfAqeqChmcOwsMrC2S0U8imbz4fXPUbnTLP6Z0Of1/Ea6qy9FY9UwUVE2ow6KoF5VSBBwoLQx5UQDuMPdADl0wur4E9lgmYvumP4MI7dDp/qIM7zRt42QcAjq0HOBRClwGaouHQ4a1ww1GX6D2MMWbe1FVVUD2K+nOM1XvMUupfoK3l33SKMVYAHKiOzcMINv9RK83gPmIEwKgQF3mmebhqqtt0ijHG7KgetdVecAXbOLhirPAkmgZpNve4/GeMt84BoWhf5h2FM+E6AC+/puAtJ1ZDy4eO9ycZpTmx8snv84qB3aHeK+GzE+/TexljzKymzXMwX92sU+apiuOg7dPlvRAwYwUo/32v+vvaax+HhlE/hN6Qumj4QVb0LFgy/m96D2OMmdP0nWNBxOytFKHkVdA2f71OMcYKiKOfw3HUmOmhBVf+CMKoBz3d5bMcCmMsv2TsR3rLPE89yMEVY4Ur3ADrjS6ao0In8oy6fTnOs3DdcTwElTFmXvPGL4ILZ+iUWbScUfXoi3WKMVaAwg2wIpHw1kGk/lcKnsUAL6Qe9oyxktW06W0A4madMk86l8O2Wft1ijFWgMILsL7+6kiQ6tTQeoHRFA1xyc2DjDHDVmDmouwttCzhB7Bj3g91ijFWoMILsGpGTobKSA0GWXpHntEUDZHIdp1ijDEzmibfB0JM0inDVDvIF67UCcZYAQsvwDrcNd1vpgujD1bfFA1dUXujexhj5afp3o9i/nK5Tpmn1KxQ11FkjAUWYg3WiMQC0xTo5Jvf/0p5UOXu0HsYYyw3Td+rB4j9QKfMk2IttM3/tU4xxgpceAFWT7zZ7wcVhkT/q9fhurGv6D2MMZajnh/aWzhf7oLtc5foBGOsCIQXYFU6U/x+UGGgGqyI8wTwCELGmAlNG6/F/OR8nTLPjXxcbzHGikQ4ARat6A3wFn+yz7BE4zyCkDGWO1pqTIhv6ZQFagU8NqdVJxhjRSKcAKunbjIocbQ/2WdYhOAMizGWm2krKsGzOiXD49DaYm8+LcaYNeEEWGMqJkHETUyVkG9Uaxb38Nn9L72HMcay454wGwtrp+iUeUJ9Qm8xxopMOAFWr/OyH1zlu5O7Pz0DPse8O+Daht2JnYwxli3P4moUYhm0tezSCcZYkQknwLq29lmIe/f7s7jnax4sCuaoc3s09mO4fvwyvZcxxrIXqbDTPKjEA9A69w6dYowVoRB7maNvvbEGIs5l4ArHen8sTz4HvfFNcOPEtXoPY4zlrmnTbPz3X7EA15DYkQMBr2JpcBO0zf263sMYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYy5rQz8yCy66++XN4gG/VSXNExUlb7rxpl075Zi+6ZSao2CM6maDUbVvWrfi8TmVs9lVffgQcZ6ZOpv17l121cqdwxIk6mRGpVIcQ4jba/v5dX/Kfg7h04coHHSEu0snsKHhACdgmhLdty50rf6X3BpLP73Yo+L2fqFTsYvxuTsTjeJXefYSSahc44m4hoGPLnV+6W+/OSRivmavZi26+SimoxxPuqlTnqgLwz+tMzsE+ly1cuW7AcRCwMJfPPfvqm/HtvGnLXV9Km08XynnYn81jTTI5PkNJdewwP/rVD9ateK9OBjb7qpUXK/ysQsqLB+SZmlLqbhBilxAVD2R7XAflecJ7b6b5Vh+6hvF+sVMnfemOY/LxNinb410sHP3MihxetNv6Mq4jhPgcXfg6lZHZC1feOiCjkHJbLsFaOphh1FMmRw+6kP3XzRcBF/sZrHIfpGDSz3SKBAXUlOFSJukfvxSBDqEbXOIzwjo6vnRT0T/KWBivmQt8v/X02v4NAt+L/55T3PCJ/zN8hPl+i1mxHWt6XXoPOunL5mZPfweviXbMyLb6fy9FcEXoWvF/jteOn9dkmS+z4sIBVgmhEiFlEjrpkwJvchkGDv7Fj8GZTlLG0wFu1SydtMsPCv1gp17vyQ/MGKWM0uumzCALiX9TUrFHsqnB829sWQSTYbxmLugcxu/TDwT1rsDCeL/FrNiOtYngavaiFRf5Nff4d6iQqHcHQ0EYBmRUWOFzrLRxgFViHKdyoR8QaXTxY+a3TieHRRc8BWU66XMUNXlkV62dFcqAZCzwezaFjpXyolt1siBR80s2N7IB8Pji56TMPdCNIYzXzEWi9lVszfjG118RBdxhKrZjbSa4uvkqqvVOV0MXFB6zi/gcK214rjFbBl3MObSZZ8KvgcJMTyd91HwYpM8DlSb9AEejvgPfX7dioU6mNKgPVgafkzIXJaNXpWxuGuLv5NofIVFLBzP719T1CXKswvhuKTihmoLkm1lf/45U79k/vip2Ed5FBvWHCfLdhvGauUh1AyVU6MBz7DYh1a4td694QO/29b1ffG+fG/Q58feFW3kGFjCOFFqSFVQfrDzlMSSMY00yOT79pXq/2QVXAwugfdJdE3QN4We+Cn9+0YA8S6PjhQVj/N5u2qZ3pZRrntcfvqfAfbCCSP579F1+/+4VJ+lk2eIarBJEmZp/sfdDGQtlbjqZUnK/Kz/DcyqN97vqjzIV/4aLmYXe9SbppuzjYwIdI79Pmag4gzI4vdvnd1QtQJRJ978p+e8b3z8dv3QBoX988Wd+ZqfUgN+hoGC4cyKM18wWBc2pbvgUMONNtIHeU/INn/S9X/qdQe8XA0QsAAz6m+Wu2I61meAKz9tUwZWCB2hQQLprAj9zh/7M76Vrh/qz6h/56PqimnP8+wMCTlb8OMAqURQY+aO5+hnqIk7U6AyszcHS5CzKHHTSKr8klpThSlAZ9/fJFGX4jiMH9i/DIBOPU8H1jUgO/Oh90/vXyWH5ASXdDPqT0SGDyTBeMxt0XuPNPfkGmggGU9z00qH3S0GCTvp0UFhw50NYiu1YmwiufF7v4OBKqllb1n2JrolAXSjo2tly95fPGFQA5kC+JHGAVaLwQu6gAEknfX5zjYwOahKjDC253xVlfJncSI1wKgfciKlkl48bGwV3/g1igJ6Cu6FK0a+5jUZ1ZtM84FQMrJFUQwexYbxmNqimLbk5UvcdzPgcpiCBbsA6mSCj1mpTi00xHetU/QezCa78psF+tfs+Cq5S1NIF4dfaJxU8OJAvPRxglTDK8JJLiFRL5ddW9ef1Duykihd+JiVRU1Jn0PkJdISCpADLLcmMDo/xrv5NFAMCKEvy8ppSDbgpUw1Btjc/4jgyqTYVOMDqUyTHOlV/KXqvGddcEU8a/cw+p2LAgCSiUhSAWfHiAKvE+YFSUpu/nrrBD6hS9buiC18nC0B1XpoolYCkplMvf6MmA3JUvybfHJoxqYmCOrTSA282DXp3SmG8ZqbwPc1MrlERTmVOBQSqqaPCiV9AERUnmX7PxapYjnW64MqvOcoQfeb+eSTJ9TMTLHgcmWS5Dx4D483nLDwcYJUDt2pW/5KS36lSRm+luVzC7HeVzM/IBrMe6FBmPKAGz1ddcAGWcpyBJWavl/rUma8N6ieM18yUohGL/flNmblPK0KFE3qY+FulohiOtcngitj6zESIigF9sfxuEcktDKxocYBVBigzoD4SOumj9n4pnUFTOeDvZtyPwhQM+gZWw0u1C9+P1WCPgkwp1cDOpQYzUJMoMx7QpEClahXbSdME+DcVC8J4zUwJBQMDcyGyGrrOhlfox9p0cEVsfmY/f0tqYaAld/QmK3JCPzML0s0Tk4uc5ipZePNW/MZTl44oqLj7y2foVEZymQerT8pjpdKvpZjrnDD0evj3U66lF2Qeo7C+W7/WUbkP6uQgiSZe4b93Co5MBKhhvGYmkuduy3UeqkwNmgfLsKHOi3yfh2Efa5JuHqxUwRUVDhzHn1sr6wKT7c/sd9Po15KQLiDkebCKD9dglROnYqF/M0zi11DkaymcfvCi9Ncvo4wj5U3CqQyeidF6gpjxBn3Q66W8KSp4IN83jEz4GaqoOCPV90go0PU/Gx1PFWunz0oBAB1nOt761zISxmtmQkFy827h9Z8rFYV6rFMFV8Rv+vd6c1qdYfCgDLOfWQkxoECC0SPXYJUIDrDKCNUsCHdgp0qCN8asV3hPKWCwQzdjuikPKJVpurkyv5k3VdUXVAf/1PC4bKPSIR2jdEFPfxRI9gU/FMz6NVIZCuM1GQvC77OUIrg6wnFm+rVEWfKDtAHM9s8UInkEMysVHGCVEapNUJ4aNAyYboaF1LHSryKn0Y955Ad0NNItz81bufA7BlM1vKjwAx/8EMMOG/eDWQqAqbk4C2G8JmNDSl4WDPMP6l6gkwmppqdhzDIsZDJbBvWPyKHN3ISh+mDl0ldhUB+sLCXeg/h8kCa6Qf0RsuBnxGnW0xtOoX23/fmBtIr5zZ8D3mMyqrFzq/B9m+inlf/X7GOiD2AuBvXBKuG1CMM+1iT5+PTXv/9Sct8pncedlOm5N+j1RAXlk8YGAyV/h/g+U06Eyn2wig/XYJUJuoj7B1d0Afh9rzSqBpcymr6a3RLKTPyaEKlm0fw3Wd+YKLPBDCLVg/528kgdqnkRTmXea8rygW4gfk0TPvqOQeIYJx0DvPmYWp4jjNfso0TyVB6lOUlsISjkYz2oc7hbNaC5n/I4kLGM87hBTeJe1OhnFkoNaILEKMdoEyQLDwdYZQBLFzMHlHIRpj9PtUU66aPSkR+I5WqIYCf5QSU1/6ac66zIQ6C/7Y+Q7N9sQMGmij1SKFMN2JY4xngMKNjsx28etjSvVb5eEzOxgUGcVBxgWVKox3pQcIWolskP8vvD6z7TPA7P1wGf2fw0Ckl/T4iUAZYDAzvDmwxug/SrZJnjAKvE4Y3MX6ldJxNopBwFHVRblNSHhgIxCsh0sqT4i8tSs2B/ima1L+wgi77DvoEB9KCmAv2jjNH3nnzTUSo2qNk4jNfMmkq66Rta65BuxPS56blcAvFhFeCxpnMr3TxXFOTnmscpMfAzJy+Angu6zvzCXj8iTbCjoN98dLmzPrqXcYBV+mRsXf8+E35Jpf9IuVTrYWFA5l/4JYgyYmqW1MkECrIKuANsij4jOQXAQlQMrC1Ug2shwnjNrLmVA79PGjVmoJCAwfhFVKvr1/7SOZLDSLSSUYDH2g+ihuJUfD6XPA7PXSufOWFgQYPeZ9ra/OSarZxqD2MD3v/gpl9mAgdYJcyvCk8uHSUthUPbg2Z5p4CshBcddZzKWclV4np9RnM3fdP69WWiviR5mfYgjNfMAp3DyUFz8qoAmaJzgW74OpngyIE32jJUjMca3/PglSz8PC5Yfyz8/7clf2ZpoB8hBXjJo7oxwEwdXKFB0znkUnuYFJzh63KAZQEHWCWKSlh+abAfqkqnzEInj/BLTGU0rJluEnhskvuf5TwhoVVJy3NI6eQQAA9cWw2PRXJtVUIYr5klxxEDm4FynHokecAHBeSFMko0bMV4rP1m6uTuARn0x0r+zBQQBv1/00pqXSBDLyJdMTDvTtSkZVUolAADg+I0/b5YbjjAKkGJktHgfldDVaX7S9Ikjfgq+FqdHKQMKjHDyjnTtCVpVvtsM/hUpWY8NwYF3b4wXjNL1J8wTa1kxk05NO1Cco1Kqgl6y1WxHmsMXgZNkkuF0CDv2++vmpQ/0v+bbX5Bn5sCPJ30UQBItW06OYiuSRtYMJGxjGvS6D3jMR84cjG5CZ8ZwQFWKUoqGfkXZZAZylMMaw5j6oZ88Tu9p85wCy6opIw3uQTuv9eFN1NfkkDv17+ReL0PDjo3kvvVaGG8Zi7wvQ2ulVSxR4LeBPG91tNnoxoZvSsBb6xZTx9SoorxWPs1127loCXBAvfHSrGcWDbXA83Plfy5KR+iAFAn08L/b2DwiUEavb5ODYu+H3rPOumj5s+hAjuWPQ6wSoyfwSWVjKj/AWUuOpkW/s6gYc1UugyaaRajVBluoTYVUvPBoBIsfdcqtrNv7T+9dwDa72fCeAOkWjq920cZ9lDnRhivma2UtZKIbiiXLlzZ7r+nFP3IaNSa36laxdqTr51EMDiw4MGK91inyuOC9sfC/3cXvsnB+cUw1wMFb7TfH4mb4nogyX1j06HF1FNdjzTSN/0xv8WvmfcDu6TgijgBAjuWHTzezBY6qVOd0LnCCyzlTL90IfkXcH+YCfrNfxnwb4xJmd9QsxeHMbszZVYU/OlkTq/pZ/j9VrMn/tDvIZpU8/3d9vEzUOVmPWXCADRdx7ovDb5hJAnjNXMx6NzIRYDzim6sA2okwpzJ3ZDhzsM++T7WJJPjk07yLO9kuGu+j9/fLGl5nmxRsOQ4EoOr4HmXydcP+pmH49fg8Uzug3ANVomgUtKgfldU3Z5hcOXLcVhzsSmupkLMiPFGlPx+M5ZBoBPGa+bCDwxS1K5kwv+sfqEi+I2vHBXtsXarZiXncUGveb/2Dt9vcp+sTFEQm1ieLLPP7b9+qpq0DJkKrlh6HGCVilT9rlL0GQiCqsLLbeqGYmoqpAzZLx1mc2OjmwJmzpkGOmG8Zi78ggXeBOkmpncFh5+RPmu6Gls2UDEeaz+PS1rJwhfwmqf3669SIGBhxgUPfT1QcErvQ+/NiA7y8HocfrH1ZP73hN8XB1f2cYBVAqiZILlJT/e7yrrGIWUfi9KeumHboM9byKMKEd3Y/OYRyuSpX0maEjVlqP7PqZYAbwr+d5ulMF4zW/Sd+jUsoqKB3ov/ftLo+zl9Nj9gYBkpxmPtN+MmByh4zWcyySn9Db/gQTW8+JnSBZk0WMQ/JhgUmboeKH/3Cy36mA/Kv/rDz6lf/wwd2HHhgTHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDHGGGOMMcYYY4wxxhhjjDFLAP4/Tdp0RgKI4yUAAAAASUVORK5CYII="/>
                        </defs>
                        </svg>
                        
                    </span>
                </div>
                <div id="creit-card" class="tabcontent credit">
                    <div class="tab-inner-wrapper">
                        <div class="top">
                            <div class="left">
                                <img src="<?php echo get_template_directory_uri(). '/icons/lock.svg'; ?>" alt="">
                            </div>
                            <div class="right">
                                <p class="gray-text">This is a secure payment.</p>
                            </div>
                        </div>
                        <div class="cc-form">
                            <div class="cc-number">
                                <div class="top">
                                    <p class="input-title">Card number</p>
                                    <img src="<?php echo get_template_directory_uri(). '/icons/cards.svg'; ?>" alt="">
                                </div>
                                <div class="single-text-input">
                                
                                    <input type="text" name="cc-nr" class="cc-nr-field" placeholder="Card number">
                                    <div class="lock-icon">
                                        <img src="<?php echo get_template_directory_uri(). '/icons/gray-lock.svg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="triple-text-input">
                                    <div class="single-text-input">
                                        <p class="input-title">Full name on card</p>
                                        <input type="text" name="cc-name" placeholder="e.g. John doe">
                                    </div>
                                    <div class="single-text-input">
                                        <p class="input-title">Expiration date</p>
                                        <input type="text" name="cc-year" class="cc-year-field" placeholder="MM/YY">
                                    </div>
                                    <div class="single-text-input">
                                        <p class="input-title">Security code</p>
                                        <div class="input-wrapper">
                                            <input type="phone" name="cc-cvv" class="cc-cvv-field" placeholder="CVV">
                                            <div class="info-icon">
                                                <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pay-pal" class="tabcontent paypal">
                        <div class="tab-inner-wrapper">
                            <p class="paypal-title">Your PayPal account will be charged $<span id="actual-price">109</span>, which is applied to the total amount due.</p>
                            <form id="paypal-form">
                                <input type="hidden" id="actual-price" value="100">
                                <button type="submit" id="pay-with-paypal"><img src="<?php echo get_template_directory_uri(). '/icons/white-paypal.svg'; ?>" alt=""></button>
                                <p class="gray">The safer, easier way to pay</p>
                            </form>
                        </div>
                </div>                
            
                
               

            </div>





            <div class="right">
                <p class="title">Details</p>
                <div class="table-area">
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Distance</p>
                        </div>
                        <div class="info-tooltip empty"></div>
                        <div class="right-info">
                            <p id="cost-miles">25mi</p>
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">First avail. date</p>
                        </div>
                        <div class="info-tooltip">
                        <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                        <div class="right-info">
                            <input type="text" readonly class="available-date" placeholder="05/02/2023">
                        </div>
                        <div class="edit-icon">
                            <img src="<?php echo get_template_directory_uri(). '/icons/edit-icon.svg'; ?>" alt="">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Vehicle</p>
                        </div>
                        <div class="info-tooltip empty"></div>
                        <div class="right-info">
                            <p id="vehicle-name"><?php echo $year . ' ' . $vehicle . ' ' . $vehicleModel ?></p>
                        </div>
                        <div class="edit-icon">
                            <img src="<?php echo get_template_directory_uri(). '/icons/edit-icon.svg'; ?>" alt="">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Ship from</p>
                        </div>
                        <div class="info-tooltip empty"></div>
                        <div class="right-info">
                            <p id="ship-from"><?php echo $cityFrom; ?></p>
                        </div>
                        <div class="edit-icon">
                            <img src="<?php echo get_template_directory_uri(). '/icons/edit-icon.svg'; ?>" alt="">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Ship to</p>
                        </div>
                        <div class="info-tooltip empty"></div>
                        <div class="right-info">
                            <p id="ship-to"><?php echo $cityTo; ?></p>
                        </div>
                        <div class="edit-icon">
                            <img src="<?php echo get_template_directory_uri(). '/icons/edit-icon.svg'; ?>" alt="">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Vehicle condition</p>
                        </div>
                        <div class="info-tooltip">
                            <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                        <div class="right-info">
                            <div class="radio-input">
                                <input type="radio" name="vehicle-condition" value="running" id="vehicle-running" <?php echo ($operable == "running") ? "checked" : ""; ?>>
                                <label for="vehicle-running">Running</label>
                            </div>
                            <div class="radio-input">
                                <input type="radio" name="vehicle-condition" value="non-running" id="vehicle-non-running" <?php echo ($operable == "nonrunning") ? "checked" : ""; ?>>
                                <label for="vehicle-non-running">Non-running</label>
                            </div>
                        </div>
                        <div class="edit-icon empty">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Transport type</p>
                        </div>
                        <div class="info-tooltip">
                            <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                        <div class="right-info">
                            <div class="radio-input">
                                <input type="radio" name="transport-type" value="open" id="transport-open" <?php echo ($transportType == "open") ? "checked" : ""; ?>>
                                <label for="transport-open">Open</label>
                            </div>
                            <div class="radio-input">
                                <input type="radio" name="transport-type" value="non-running" id="transport-enclosed" <?php echo ($transportType == "enclosed") ? "checked" : ""; ?>>
                                <label for="transport-enclosed">Enclosed (+$150)</label>
                            </div>
                        </div>
                        <div class="edit-icon empty">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Service type</p>
                        </div>
                        <div class="info-tooltip">
                            <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                        <div class="right-info">
                            <p id="service_type">Door to door</p>
                        </div>
                        <div class="edit-icon empty">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Service type</p>
                        </div>
                        <div class="info-tooltip">
                            <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                        <div class="right-info">
                            <p id="service-type">Door to door</p>
                        </div>
                        <div class="edit-icon empty">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Insurance</p>
                        </div>
                        <div class="info-tooltip">
                            <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                        <div class="right-info">
                            <p id="insurance">Included</p>
                        </div>
                        <div class="edit-icon empty">
                        </div>
                   </div>
                   <div class="table-cell-white">
                        <div class="left-title">
                            <p class="info-title">Transit time</p>
                        </div>
                        <div class="info-tooltip">
                            <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                        </div>
                        <div class="right-info">
                            <p id="Insurance">1-2 days</p>
                        </div>
                        <div class="edit-icon empty">
                        </div>
                   </div>
                   <div class="table-cell-gray">
                        <div class="gray-cell">
                            <div class="left-title">
                                <p class="info-title blue">Due now</p>
                            </div>
                            <div class="info-tooltip">
                                <img src="<?php echo get_template_directory_uri(). '/icons/info-icon.svg'; ?>" alt="">
                            </div>
                            <div class="price-area">
                                <p id="price-due-now" class="price blue">$0</p>
                            </div>
                            <div class="additional-info">
                                <p class="info">Dont`t worry - you won`t pay until your pickup is scheduled.</p>
                            </div>
                        </div>

                        <div class="gray-cell">
                            <div class="left-title">
                                <p class="info-title grayed">Price option</p>
                            </div>
                            <div class="info-tooltip empty"></div>
                            <div class="price-area">
                                <p id="price-option" class="price">$249</p>
                            </div>
                            <div class="additional-info">
                                <p class="info biginfo">Discounted cash price</p>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php get_template_part('template-parts/review-carousel'); ?>
</main>
<?php get_footer();