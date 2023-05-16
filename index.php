<?php

$access_token = "YOUR_ACCESS_TOKEN";
require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken($access_token);

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = 'test';
$item->quantity = 1;
$item->unit_price = (double) 75.00;
$preference->items = array($item);

$preference->back_urls = array(
    "success" => 'https://yourdomain.com/success',
    "failure" => 'https://yourdomain.com/failure',
    "pending" => 'https://yourdomain.com/pending',
);

$preference->save();

$Link = $preference->init_point;

header("Location: $Link");
exit();
?>
