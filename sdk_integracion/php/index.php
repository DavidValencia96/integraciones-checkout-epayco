<?php
require 'vendor/autoload.php';

//usage
$epayco = new Epayco\Epayco(array(
    "apiKey" => "c4aa5131fe7db17993e7f976a67743e7", //public_key d42ae82ca25bd9b0f3877a574183c4d7
    "privateKey" => "daa17d9a21c6693fbe2d0e3ac0ed7e28", //private_key 7eba53ab76dbb2c39a7435a79d27b6f8
    "lenguage" => "ES",
    "test" => false
));

//Create Token
#PRUEBA GENERAL
// $token = $epayco->token->create(array(
//     "card[number]" => '4575623182290326',
//     "card[exp_year]" => "2025",
//     "card[exp_month]" => "12",
//     "card[cvc]" => "123"
// ));

#TARJETA VISA
// $token = $epayco->token->create(array(
//     "card[number]" =>'4575623182290326', 
//     "card[exp_year]" => "2025",
//     "card[exp_month]" => "03",
//     "card[cvc]" => "536"
// ));

// #MASTERCARD
// $token = $epayco->token->create(array(
//     "card[number]" => '5240521774621852', #5240521774621852 AND 5306959260142184
//     "card[exp_year]" => "2024",
//     "card[exp_month]" => "06",
//     "card[cvc]" => "123"
// ));

#AMERICAN EXPREXX
$token = $epayco->token->create(array(
    "card[number]" => '374992871551962',
    "card[exp_year]" => "2025",
    "card[exp_month]" => "12",
    "card[cvc]" => "672"
));

#DINNERS CLUB
// $token = $epayco->token->create(array(
//     "card[number]" => '36310983352106',
//     "card[exp_year]" => "2025",
//     "card[exp_month]" => "11",
//     "card[cvc]" => "636"
// ));


//Customer
$customer = $epayco->customer->create(array(
    "token_card" => $token->id,
    "name" => "David",
    "last_name" => "Epayco", //This parameter is optional
    "email" => "david.valencia@payco.co",
    "default" => true,
    //Optional parameters: These parameters are important when validating the credit card transaction
    "city" => "Medellin",
    "address" => "Cr 4 # 55 36",
    "phone" => "3005234321",
    "cell_phone" => "3010000001",
));


############## Payment  #################
//Create
$invoice = new \DateTime('now');

$pay = $epayco->charge->create(array(
    "token_card" => $token->id,
    "customer_id" => $customer->data->customerId,
    "doc_type" => "CC",
    "doc_number" => "123456789",
    "name" => "David",
    "last_name" => "ePayco",
    "email" => "david.valencia@payco.co",
    "bill" => $invoice->format('Y-m-d H:i:s'),
    "description" => "Test Payment PHP",
    "value" => "120",
    "tax" => "0",
    "tax_base" => "0",
    "currency" => "COP",
    "dues" => "12",
    "address" => "cr 44 55 66",
    "phone" => "2550102",
    "cell_phone" => "3010000001",
    "ip" => "190.000.000.000",  // This is the client's IP, it is required
    "url_response" => "http://localhost/test-david/response.php",
    "url_confirmation" => "http://localhost/test-david/confirmation.php",
    //Extra params: These params are optional and can be used by the commerce
    "use_default_card_customer" => true,
    "extras" => array(
        "extra1" => "data 1",
        "extra2" => "data 2",
        "extra3" => "data 3",
    )
));

// var_dump("Generación de token", $token, "Generación de customer", $customer, "Generación de pay", $pay);
var_dump("Generación de pay", $pay);
die();

// //PSE
//     $pse = $epayco->bank->create(array(
//         "bank" => "1022",
//         "invoice" => "1472050778",
//         "description" => "Test Payment PHP",
//         "value" => "10000",
//         "tax" => "0",
//         "tax_base" => "0",
//         "currency" => "COP",
//         "type_person" => "0",
//         "doc_type" => "CC",
//         "doc_number" => "numero_documento_cliente",
//         "name" => "PRUEBAS",
//         "last_name" => "PAYCO",
//         "email" => "no-responder@payco.co",
//         "country" => "CO",
//         "cell_phone" => "3010000001",
//         "ip" => "190.000.000.000",  // This is the client's IP, it is required
//         "url_response" => "https://ejemplo.com/respuesta.html",
//         "url_confirmation" => "https://ejemplo.com/confirmacion",
//         "method_confirmation" => "GET",

//         //Extra params: These params are optional and can be used by the commerce
//         "extra1" => "",
//         "extra2" => "",
//         "extra3" => "",
//         "extra4" => "",
//         "extra5" => "",
//         "extra6" => "",
//         "extra7" => "",
//     ));


// //Retrieve
//     $pse = $epayco->bank->get("transactionID");

?>