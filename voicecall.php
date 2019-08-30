<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$account_sid = '';
$auth_token = '';

$twilio_number = "";


$to_number = "";

$client = new Client($account_sid, $auth_token);
$client->account->calls->create(  
    $to_number,
    $twilio_number,
    array(
        "url" => 
        "http://twimlets.com/echo?Twiml="
    )
);