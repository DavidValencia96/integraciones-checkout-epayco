<?php
//LOGIN

$curl = curl_init();
$username = "0c8746d594279ed393324f16eaa40524";
$password = "bfd136693c861476710f47db734e9d9f";
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apify.epayco.co/login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Basic " . base64_encode("$username:$password")
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// var_dump($response);
// $token = $response;
$data = json_decode($response, true); //Funcion json_decode para extraer los datos que devuelve $response en JSON
// echo("The data is: \n");
// echo $data['token']; //Acceder directamente al array $data que devuelve la funcion json_decode

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apify.epayco.co/collection/link/create',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "quantity": 1,
  "onePayment":true,
  "reference": "12a-36br",
  "amount": "45000",
  "tax": "0",
  "icoTax": "5000",
  "currency": "COP",
  "id": 0,
  "base": "0",
  "description": "Link de test",
  "title": "Link de cobro de prueba",
  "typeSell": "1",
  "email": "jhondoe@yopmail.com"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'authorization: Bearer ' . $data['token'], //Pasar el token que esta almacenado en el array $data
      // "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhcGlmeWVQYXljb0pXVCIsInN1YiI6NDg5NjEyLCJpYXQiOjE2Mjc2Nzk4MDAsImV4cCI6MTYyNzY4MzQwMCwicmFuZCI6ImFjN2E0ZmNhNTUyN2FjYjE4YjM5OWYxYjc2MGY0NDBlNzc0MyJ9.ra3rh3VOrq219ekgaAoEqQ2dylLFQM0hk0wk3jiubDs"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;