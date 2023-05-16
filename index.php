<?php

$access_token = "TEST-384795573456031-032615-f5c4423be1199f62e7da86b1e1ae8058-421062713";
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
