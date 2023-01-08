<?php
require 'vendor/autoload.php';


$epayco = new Epayco\Epayco(array(
    "apiKey" => "485d5b188e7e9796c74cc9d7f64931fb",
    "privateKey" => "9ec0313c812b85d64fa5b017c392cf7c",
    "lenguage" => "ES",
    "test" => false
));
$cash = $epayco->cash->create("efecty", array(
    "invoice" => "split-gana2",
    "description" => "pay test",
    "value" => "2",
    "tax" => "0",
    "tax_base" => "0",
    "currency" => "COP",
    "type_person" => "0",
    "doc_type" => "CC",
    "doc_number" => "1020480125",
    "name" => "testing",
    "last_name" => "PAYCO",
    "email" => "prueba@prueba.com",
    "cell_phone" => "3010000001",
    "end_date" => "06-12-2021", 
    "ip" => "190.000.000.000",  
    "url_response" => "http://TestAleja.dev-plugins.info/response.html",
    "url_confirmation" => "http://TestAleja.dev-plugins.info/confirmation.php",
    "method_confirmation" => "GET",
    
    "splitpayment" => "true",
    "split_app_id" => "76631",
    "split_merchant_id" => "76631",
    "split_type" => "02",
    "split_primary_receiver" => "76631",
    "split_primary_receiver_fee" => "0",
    "split_rule"=>'multiple',
    "split_receivers" => json_encode(array(array('id'=>'30085','fee'=>'0','total'=>'2','iva'=>'0','base_iva'=>'0')
    ))));

//$cash = $epayco->cash->transaction("34773344");// consulta
//var_dump(json_encode($cash));

//PSE
$pse = $epayco->bank->create(array(
    "bank" => "1507",
    "invoice" => "split 2455555555",
    "description" => "Pago pruebas",
    "value" => "2",
    "tax" => "0",
    "tax_base" => "0",
    "currency" => "COP",
    "type_person" => "0",
    "doc_type" => "CC",
    "doc_number" => "1020480143",
    "name" => "Alejandra",
    "last_name" => "Correa",
    "email" => "maria.correapay@gmail.com",
    "country" => "CO",
    "cell_phone" => "3010000001",
    "ip" => "190.000.000.000",  // This is the client's IP, it is required
    "url_response" => "http://TestAleja.dev-plugins.info/response.html",
    "url_confirmation" => "https://TestAleja.dev-plugins.info/confirmacion.php",
    "method_confirmation" => "GET",
    "splitpayment" => "true",
    "split_app_id" => "9898",
    "split_merchant_id" => "9898",
    "split_type" => "02",
    "split_primary_receiver" => "9898",
    "split_primary_receiver_fee" => "0",
    "split_rule"=>'multiple',
    "split_receivers" => json_encode(array(array('id'=>'515360','fee'=>'0','total'=>'2','iva'=>'0','base_iva'=>'0')
    ))));


var_dump(json_encode($pse));

//var_dump($pse);
//$pse = $epayco->bank->get("932171880");
//var_dump($pse);
/* $test = false; // opcional, tiene que ser true o false o no enviarse
$bancos = $epayco->bank->pseBank($test);
var_dump($bancos);
 */