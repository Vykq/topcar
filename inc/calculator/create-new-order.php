<?php

function theme_post_types(){
    register_post_type('orders', array(
        'rewrite' => array('slug' => _x('orders', 'slug', 'topcardelivery')),
        'has_archive' => false,
        'public' => true,
        'labels' => array(
            'name' => 'Orders',
            'add_new_item' => 'Add Order',
            'edit_item' => 'Edit order',
            'all_items' => 'All Orders',
            'singular_name' => 'Order'
        ),
        'supports' => array(
            'title',

        ),
        'menu_icon' => 'dashicons-hammer'
    ));
}
add_action('init', 'theme_post_types');


add_action('admin_post_create_new_order', 'handle_create_new_order');
add_action('admin_post_nopriv_create_new_order', 'handle_create_new_order');

function handle_create_new_order() {
    if (!isset($_POST['create_new_order_nonce']) || !wp_verify_nonce($_POST['create_new_order_nonce'], 'create_new_order_action')) {
        return;
    }

    // Check if the form is submitted
    if (isset($_POST['createNewOrder']) && $_POST['createNewOrder'] === 'calculator') {
        // Process the form data and create the order
        $data = array(
            'cityFrom' => $_POST['city_from'],
            'cityTo' => $_POST['city_to'],
            'transportType' => $_POST['transport_type'],
            'year' => $_POST['vehicle-year'],
            'vehicle' => $_POST['vehicle'],
            'vehicleModel' => $_POST['vehicle_model'],
            'operable' => $_POST['operable'],
            'email' => $_POST['email_address'],
            'shippingDate' => $_POST['shipping_date'],
            'telephone' => $_POST['telephone']
        );

        $order_id = create_new_order($data);

        wp_safe_redirect( add_query_arg( array( 'order' => $order_id ), '/calculated-costs/' ) );
        
        exit;
    }
}


function create_new_order($data){
    $order_data = array(
        'post_title'    => 'Order: ' . $data['email'],
        'post_type'     => 'orders',
        'post_status'   => 'publish',
        'post_author'   => 1, 
    );

    // Insert the order into the database
    $order_id = wp_insert_post( $order_data );

    // Check if the order was successfully created
    if ( ! is_wp_error( $order_id ) ) {
        // Order created successfully
        echo 'New order created with ID: ' . $order_id;
        if (isset($data['cityTo'])) {
            update_post_meta($order_id, 'city_to', sanitize_text_field($data['cityTo']));
        }
        if (isset($data['cityFrom'])) {
            update_post_meta($order_id, 'city_from', sanitize_text_field($data['cityFrom']));
        }
        if (isset($data['email'])) {
            update_post_meta($order_id, 'email', sanitize_text_field($data['email']));
        }
        if (isset($data['transportType'])) {
            update_post_meta($order_id, 'transportType', sanitize_text_field($data['transportType']));
        }
        if (isset($data['year'])) {
            update_post_meta($order_id, 'year', sanitize_text_field($data['year']));
        }
        if (isset($data['vehicle'])) {
            update_post_meta($order_id, 'vehicle', sanitize_text_field($data['vehicle']));
        }
        if (isset($data['vehicleModel'])) {
            update_post_meta($order_id, 'vehicleModel', sanitize_text_field($data['vehicleModel']));
        }
        if (isset($data['operable'])) {
            update_post_meta($order_id, 'operable', sanitize_text_field($data['operable']));
        }
        if (isset($data['email'])) {
            update_post_meta($order_id, 'email', sanitize_text_field($data['email']));
        }
        if (isset($data['shippingDate'])) {
            update_post_meta($order_id, 'shippingDate', sanitize_text_field($data['shippingDate']));
        }
        if (isset($data['telephone'])) {
            update_post_meta($order_id, 'telephone', sanitize_text_field($data['telephone']));
        }
    } else {
        // Error occurred while creating the order
        echo 'Error creating the order: ' . $order_id->get_error_message();
    }

    return $order_id;
}

function add_order_custom_fields() {
    add_meta_box(
        'top_car_delivery_order_info', // Unique ID
        'Order Information', // Meta box title
        'display_order_custom_fields', // Callback function to display the fields
        'orders', // Post type to add the meta box to
        'normal', // Context (normal, side, advanced)
        'high' // Priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_order_custom_fields');

function display_order_custom_fields() {
    // Retrieve the existing values from the database
    $cityFrom = get_post_meta(get_the_ID(), 'city_from', true);
    $cityTo = get_post_meta(get_the_ID(), 'city_to', true);
    $email = get_post_meta(get_the_ID(), 'email', true);
    $transportType = get_post_meta(get_the_ID(), 'transportType', true);
    $year = get_post_meta(get_the_ID(), 'year', true);
    $vehicle = get_post_meta(get_the_ID(), 'vehicle', true);
    $vehicleModel = get_post_meta(get_the_ID(), 'vehicleModel', true);
    $operable = get_post_meta(get_the_ID(), 'operable', true);
    $shippingDate = get_post_meta(get_the_ID(), 'shippingDate', true);
    $telephone = get_post_meta(get_the_ID(), 'telephone', true);
    // Add more fields here for other custom fields

    // Output the fields
    ?>
    <label for="city_from">City From:</label>
    <input readonly type="text" id="city_from" name="city_from" value="<?php echo esc_attr($cityFrom); ?>"><br>

    <label for="city_to">City To:</label>
    <input readonly type="text" id="city_to" name="city_to" value="<?php echo esc_attr($cityTo); ?>"><br>
    
    <label for="email">Email:</label>
    <input readonly type="text" id="email" name="email" value="<?php echo esc_attr($email); ?>"><br>

    <label for="phone">Phone:</label>
    <input readonly type="text" id="phone" name="phone" value="<?php echo esc_attr($telephone); ?>"><br>

    <label for="transportType">Transport Type:</label>
    <input readonly type="text" id="transportType" name="transportType" value="<?php echo esc_attr($transportType); ?>"><br>

    <label for="year">Year:</label>
    <input readonly type="text" id="year" name="year" value="<?php echo esc_attr($year); ?>"><br>

    <label for="vehicle">Vehicle:</label>
    <input readonly type="text" id="vehicle" name="vehicle" value="<?php echo esc_attr($vehicle); ?>"><br>

    <label for="vehicleModel">Vehicle Model:</label>
    <input readonly type="text" id="vehicleModel" name="vehicleModel" value="<?php echo esc_attr($vehicleModel); ?>"><br>

    <label for="operable">Operable:</label>
    <input readonly type="text" id="operable" name="operable" value="<?php echo esc_attr($operable); ?>"><br>

    <label for="shippingDate">Shipping Date:</label>
    <input readonly type="text" id="shippingDate" name="shippingDate" value="<?php echo esc_attr($shippingDate); ?>"><br>
    <!-- Add more fields here for other custom fields -->
    <?php
}

// Save the custom field data when the post is saved or updated
function save_order_custom_fields($post_id) {
    if (array_key_exists('city_from', $_POST)) {
        update_post_meta($post_id, 'city_from', sanitize_text_field($_POST['city_from']));
    }

    if (array_key_exists('city_to', $_POST)) {
        update_post_meta($post_id, 'city_to', sanitize_text_field($_POST['city_to']));
    }

    if (array_key_exists('email', $_POST)) {
        update_post_meta($post_id, 'email', sanitize_text_field($_POST['email']));
    }
    // Add more update_post_meta() calls here for other custom fields
}
add_action('save_post', 'save_order_custom_fields');