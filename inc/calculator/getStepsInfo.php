<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'getSecondStepInfo') {
    $youAre = $_POST['youAre'];
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $companyName = $_POST['companyName'];
    $additionalPhone = $_POST['additionalPhone'];
    $orderID = $_POST['orderID'];
  
    // Call the getSecondStepInfo function with the data
    TopCargetSecondStepInfo($youAre, $fullName, $phoneNumber, $companyName, $additionalPhone, $orderID);
  
    // Send a success response
    echo json_encode(['status' => 'success']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'getThirdStepInfo') {
    $pickupStreetAdress = $_POST['pickupStreetAdress'];
    $pickupSuite = $_POST['pickupSuite'];
    $thisIsA = $_POST['thisIsA'];
    $businessName = $_POST['businessName'];
    $pickupIs = $_POST['pickupIs'];
    $pickupSomeoneName = $_POST['pickupSomeoneName'];
    $pickupSomeonePhone = $_POST['pickupSomeonePhone'];
    $orderID = $_POST['orderID'];
  
    // Call the getSecondStepInfo function with the data
    TopCargetThirdStepInfo($pickupStreetAdress, $pickupSuite, $thisIsA, $businessName, $pickupIs,$pickupSomeoneName, $pickupSomeonePhone, $orderID);
  
    // Send a success response
    echo json_encode(['status' => 'success']);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'getFourthStepInfo') {
    $deliveryStreetAdress = $_POST['deliveryStreetAdress'];
    $deliverySuite = $_POST['deliverySuite'];
    $thisIsA = $_POST['thisIsA'];
    $businessName = $_POST['businessName'];
    $deliveryIs = $_POST['deliveryIs'];
    $deliverySomeoneName = $_POST['deliverySomeoneName'];
    $deliverySomeonePhone = $_POST['deliverySomeonePhone'];
    $orderID = $_POST['orderID'];
  
    // Call the getSecondStepInfo function with the data
    TopCargetFourthStepInfo($deliveryStreetAdress, $deliverySuite, $thisIsA, $businessName, $deliveryIs,$deliverySomeoneName, $deliverySomeonePhone, $orderID);
  
    // Send a success response
    echo json_encode(['status' => 'success']);
}





function TopCargetSecondStepInfo($youAre, $fullName, $phoneNumber, $companyName, $additionalPhone, $orderID) {
    update_field('you_are_field_value', $youAre, $orderID);
    update_field('full_name', $fullName, $orderID);

    if($phoneNumber != ''){
        if(get_field('phone',$orderID) != $phoneNumber){
            update_field('phone', $phoneNumber, $orderID);
        }
    }
    
    update_field('business_name',$companyName, $orderID);
    update_field('add_phone', $additionalPhone, $orderID);
}


function TopCargetThirdStepInfo($pickupStreetAdress, $pickupSuite, $thisIsA, $businessName, $pickupIs, $pickupSomeoneName, $pickupSomeonePhone, $orderID) {
    update_field('pickup_street_address', $pickupStreetAdress, $orderID);
    update_field('pickup_apartments', $pickupSuite, $orderID);
    update_field('pickup_is', $thisIsA, $orderID);
    update_field('pickup_business_name', $businessName, $orderID);
    update_field('pickup_contact', $pickupIs, $orderID);
    update_field('pickup_someone_else_name', $pickupSomeoneName, $orderID);
    update_field('pickup_someone_else_phone', $pickupSomeonePhone, $orderID);
}

function TopCargetFourthStepInfo($deliveryStreetAdress, $deliverySuite, $thisIsA, $businessName, $deliveryIs,$deliverySomeoneName, $deliverySomeonePhone, $orderID) {
    update_field('delivery_street', $deliveryStreetAdress, $orderID);
    update_field('delivery_apartments', $deliverySuite, $orderID);
    update_field('delivery_is', $thisIsA, $orderID);
    update_field('delivery_business_name', $businessName, $orderID);
    update_field('delivery_contact', $deliveryIs, $orderID);
    update_field('delivery_someone_else_name', $deliverySomeoneName, $orderID);
    update_field('delivery_someone_else_phone', $deliverySomeonePhone, $orderID);
}
?>