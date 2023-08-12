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
        update_field('status_order', 'begin', $order_id);
        // Order created successfully
        echo 'New order created with ID: ' . $order_id;
        if (isset($data['cityTo'])) {
            update_field('city_to', $data['cityTo'], $order_id);
        }
        if (isset($data['cityFrom'])) {
            update_field('city_from', $data['cityFrom'], $order_id);
        }
        if (isset($data['email'])) {
            update_field('email', $data['email'], $order_id);
        }
        if (isset($data['transportType'])) {
            update_field('transport_type', $data['transportType'], $order_id);
        }
        if (isset($data['year'])) {
            update_field('year', $data['year'], $order_id);
        }
        if (isset($data['vehicle'])) {
            update_field('vehicle', $data['vehicle'], $order_id);
        }
        if (isset($data['vehicleModel'])) {
            update_field('model', $data['vehicleModel'], $order_id);
        }
        if (isset($data['operable'])) {
            update_field('operable', sanitize_text_field($data['operable']), $order_id);
        }
        if (isset($data['shippingDate'])) {
            update_field('shipping_date', sanitize_text_field($data['shippingDate']), $order_id);
        }
        if (isset($data['telephone'])) {
            update_field('phone', sanitize_text_field($data['telephone']), $order_id);
        }
    } else {
        // Error occurred while creating the order
        echo 'Error creating the order: ' . $order_id->get_error_message();
    }

    return $order_id;
}




add_filter( 'manage_orders_posts_columns' , 'by_manage_posts_columns' );
add_filter( 'manage_orders_posts_custom_column', 'by_manage_post_posts_custom_column', 10, 2 );

function by_manage_posts_columns( $post_columns) {
	$post_type = get_post_type();
	if (  $post_type == 'orders' ) {
	$post_columns = array_slice( $post_columns, 0, 2 , true ) + array ( 'status' => 'Status' ) + array_slice( $post_columns, 1, count( $post_columns ), true);
	return $post_columns;
	}

	
	return $post_columns;

}

function by_manage_post_posts_custom_column( $column_name, $post_id ) {
	if( $column_name == 'status' ) {
        if(get_field('status_order') == 'begin'){
            echo '<span class="order begin">Begin</span>';
        } else if (get_field('status_order') == 'paid'){
            echo '<span class="order paid">Paid</span>';
        } else {
            echo '<span class="order unpaid">Unpaid</span>';
        }

	}
	
	return $column_name;
}
