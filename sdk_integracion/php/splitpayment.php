<?php
require 'vendor/autoload.php';

//usage
$epayco = new Epayco\Epayco(array(
    "apiKey" => "502a7cf6776c4080941e24e28b515028", //public_key d42ae82ca25bd9b0f3877a574183c4d7
    "privateKey" => "bed0b84f9042511a1e87d30316369ae9", //private_key 7eba53ab76dbb2c39a7435a79d27b6f8
    "lenguage" => "ES",
    "test" => false
));

//Create Token
#PRUEBA GENERAL
$token = $epayco->token->create(array(
    "card[number]" => '4575623182290326',
    "card[exp_year]" => "2025",
    "card[exp_month]" => "12",
    "card[cvc]" => "123"
));

//Customer
$customer = $epayco->customer->create(array(
    "token_card" => $token->id,
    "name" => "David",
    "last_name" => "Epayco", //This parameter is optional
    "email" => "david.valencisfa@payco.co",
    "default" => true,
    //Optional parameters: These parameters are important when validating the credit card transaction
    "city" => "Medellin",
    "address" => "Cr 4 # 55 36",
    "phone" => "0000000",
    "cell_phone" => "3010000001",
));


$pay = $epayco->charge->create(array(
    "token_card" => $token->id,
    "customer_id" => $customer->data->customerId,
    "doc_type" => "CC",
    "doc_number" => "1194418306",
    "name" => "David",
    "last_name" => "Epayco",
    "email" => "david.valencisfa@payco.co",
    "bill" => strval(rand(500000, 300000)),
    "description" => "SDK PHP Pruebas ePayco Split TC",
    "value" => "116000",
    "tax" => "22040",
    "tax_base" => "93960",
    "currency" => "COP",
    "dues" => "1",
    "address" => "Cl 104 # 74a - 4",
    "phone" => "5502712",
    "cell_phone" => "3042462218",
    "ip" => "181.134.247.50", 
    "url_response" => "http://localhost/test-david/response.php",
    "url_confirmation" => "http://localhost/test-david/confirmation.php",
    "method_confirmation" => "POST",
    
    "use_default_card_customer" => false,
    "extras" => array(
        "extra1" => "",
        "extra2" => "",
        "extra3" => "",
        "extra4" => "",
        "extra5" => "",
        "extra6" => "",
        "extra7" => "",
        "extra8" => "",
        "extra9" => "",
        "extra10" =>"",
    )
));

var_dump("Generación de pay", $pay);
die();
