<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");
require __DIR__ . '/vendor/autoload.php';
use Braintree\Gateway;
//From BrainTree API
$gateway = new Gateway([
    'environment' => 'sandbox',
    'merchantId' => '78gbxbwmqpbhq6t3',
    'publicKey' => 'gnv3hqxgkzzmrs96',
    'privateKey' => '1ae134883929526cb6d6bbcd2c55af30'
]);

$paymentMethodNonce = $_POST['paymentMethodNonce'];
$price = $_POST['price'];
// Create a transaction using the payment method nonce
$result = $gateway->transaction()->sale([
    'amount' => $price,
    'paymentMethodNonce' => $paymentMethodNonce,
    'options' => [
        'submitForSettlement' => true
    ]
]);

if ($result->success) {
    // Payment was successful
    echo json_encode(['success' => true]);

} else {
    // Payment failed
    echo json_encode(['success' => false, 'error' => $result->message]);

}
?>