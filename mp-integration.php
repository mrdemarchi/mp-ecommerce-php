<?php
require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder

MercadoPago\SDK::setAccessToken("TEST-6130437869845619-051019-eabe799ac58155883bb32d8d1f5dc0c0-18786685"); // Either Production or SandBox AccessToken

$preference = new MercadoPago\Preference();

$item = [
    "title" => $_POST['title'],
    "currency_id" => "ARS",
    "quantity" => (int) $_POST['unit'],
    "unit_price" => (float) $_POST['price'],
    "picture_url" => "https://mrdemarchi-mp-ecommerce-php.herokuapp.com/" . str_replace('./', '', $_POST['img'])
];

$preference->items = [$item];

if ($preference->save())

    header("Location: " . $preference->init_point);
else
    print_r($preference->error);