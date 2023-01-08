<?php
//require_once (APPPATH . 'third_party/epayco/src/Epayco.php');
require 'vendor/autoload.php';

function initEpayco  () {
	return new Epayco\Epayco(array(
		"apiKey" => "8f6ed80d3ff38de2b1e49cdc8659b53e",
		"privateKey" => "5a058ec9e7e22ba52a0843ba504a95c9",
		"lenguage" => "ES",
		"test" => true
	));
}


function epaycoTC() {
	$epayco = initEpayco();
    
    $token = $epayco->token->create(array(
        "card[number]" => "4575623182290326",//"4575623182290326",
        "card[exp_year]" => "2025",
        "card[exp_month]" => "12",
        "card[cvc]" => "123",
    ));

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

    $pay = $epayco->charge->create(array(
		"token_card" => $token->id,
		"customer_id" => $customer->data->customerId,
		"doc_type" => "CC",
		"doc_number" => "1035851980",
		"name" => "John",
		"last_name" => "Doe",
		"email" => "example@email.com",
		"bill" => "OR-1234",
		"description" => "Test Payment",
		"value" =>"116000",
		"tax" => "0",
		"tax_base" => "0",
		"currency" => "COP",
		"dues" => "12",
		"ip" => "190.000.000.000",  // This is the client's IP, it is required
		"url_response" => "https://lavelopues.com",
		"url_confirmation" => "https://lavelopues.co/lavelo-pues-backend-nuevo2/public/confirmationTC",
		"method_confirmation" => "POST",
	));
	return $pay;

    // var_dump($pay);
}

var_dump(epaycoTC());
die();

?>
