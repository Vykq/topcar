<?php
// capture-paypal-order.php

// Assuming you have already installed the PayPal PHP SDK via composer
require '../vendor/autoload.php';

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

// Set up PayPal API credentials
$clientID = 'AQoCY8Fw7rCK1mFkwQuHqxNrwXlwWhq6sO9AeAnRcbxrwdRUAalPkeOO9gU6NXOfGHwG38BppjzOjcza';
$clientSecret = 'ELlcCIb7fi_bBaolrbjZ7tBGsYVFV4-TmLCQAlgLHNCiNExawgSdlC0dZosMAHUI8S_sqfDzxnm5EKnJ';
$isSandboxMode = true; // Change to false for live mode

// Fetch the order ID from the request
$orderID = $_GET['orderID']; // Assuming you are passing the orderID as a query parameter

// Create a PayPal client using sandbox or live credentials
$environment = $isSandboxMode ? new SandboxEnvironment($clientID, $clientSecret) : new ProductionEnvironment($clientID, $clientSecret);
$client = new PayPalHttpClient($environment);

try {
    // Create a request to capture the payment
    $request = new OrdersCaptureRequest($orderID);
    $request->prefer('return=representation');

    // Execute the request and get the response
    $response = $client->execute($request);

    // Get the status of the captured payment
    $status = $response->result->status;

    // Handle the payment capture response as needed
    if ($status === 'COMPLETED') {
        // Payment was successfully captured
        // You can perform additional actions here, such as updating the order status in your database
        // Respond with a success message or any other relevant data
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
    } else {
        // The payment capture was not successful
        // Handle the error and respond accordingly
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Payment capture failed']);
    }
} catch (HttpException $ex) {
    // Handle any exceptions that may occur during the capture process
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'An error occurred']);
}