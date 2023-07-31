<?php

// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
require __DIR__ . '/PayPal-PHP-SDK/autoload.php';
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");
// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AQoCY8Fw7rCK1mFkwQuHqxNrwXlwWhq6sO9AeAnRcbxrwdRUAalPkeOO9gU6NXOfGHwG38BppjzOjcza',     // ClientID
        'ELlcCIb7fi_bBaolrbjZ7tBGsYVFV4-TmLCQAlgLHNCiNExawgSdlC0dZosMAHUI8S_sqfDzxnm5EKnJ'      // ClientSecret
    )
);

// Step 2.1 : Between Step 2 and Step 3
$apiContext->setConfig(
  array(
    'log.LogEnabled' => true,
    'log.FileName' => 'PayPal.log',
    'log.LogLevel' => 'DEBUG'
  )
);

// 3. Lets try to create a Payment
// https://developer.paypal.com/docs/api/payments/#payment_create
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal('1.00');
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$returnUrl = get_home_url() . '/thank-you/';

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl($returnUrl)
    ->setCancelUrl("https://example.com/your_cancel_url.html");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);

// 4. Make a Create Call and print the values
try {
    $payment->create($apiContext);
    echo $payment;
    $approvalLink = $payment->getApprovalLink();
    return json_encode(array('approvalLink' => $approvalLink));
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    return json_encode(array('error' => $ex->getData()));
}
