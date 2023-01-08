var request = require('request');
var Buffer = require('buffer/').Buffer //lo utilizamos para codificar de una manera más facil

'use strict';

let user = 'd42ae82ca25bd9b0f3877a574183c4d7:7eba53ab76dbb2c39a7435a79d27b6f8';
let buff = new Buffer(user);
let keys_epayco = buff.toString('base64');
// console.log(keys_epayco);


// ------------------------ solicitar token jwt ------------------------
var tokenJWT = {
    'method': 'POST',
    'url': 'https://apify.epayco.co/login',
    'headers': {
        'Content-Type': 'application/json',
        'Authorization': 'Basic '+keys_epayco
    }
};

request(tokenJWT, function (error, response) {
    if (error) throw new Error(error);
    // console.log(response.body);

    // retorno del token y lo paseo a un JSON
    const token = JSON.parse(response.body);

    console.log('---------------------------------- TOKEN JTW --------------------------------------')
    console.log('Este es el token: ', token.token);
    console.log('------------------------------ END TOKEN JTW --------------------------------------')
    console.log('')



    // ------------------------ Consultar detalle de transacción ------------------------
    var detail_transation = {
        'method': 'GET',
        'url': 'https://apify.epayco.co/transaction/detail',
        'headers': {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer '+token.token
        },
        body: JSON.stringify({
            "filter": {
                "referencePayco": 74222013
            }
        })

    };

    request(detail_transation, function (error, response) {
        if (error) throw new Error(error);
        // console.log(response.body);
        var detail_tx = JSON.parse(response.body);

        console.log('---------------------------------- Detalle de transaccion --------------------------------------')
        console.log('Este es la ref_payco: ', detail_tx.data.referencePayco);
        // console.log('Este es el detalle de la tx: ', detail_tx.data.log);
        console.log('---------------------------------- END Detalle de transaccion --------------------------------------')
        console.log('')
    });



    // ------------------------ tokenizar tarjeta de credito ------------------------

    var token_card = {
        'method': 'POST',
        'url': 'https://apify.epayco.co/token/card',
        'headers': {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer '+token.token
        },
        body: JSON.stringify({
            "cardNumber": "4575623182290326",
            "cardExpYear": "2019",
            "cardExpMonth": "12",
            "cardCvc": "123"
        })

    };

    request(token_card, function (error, response) {
        if (error) throw new Error(error);
        // console.log(response.body);
        var token_card = JSON.parse(response.body);

        console.log('---------------------------------- tokenización de tarjeta TDC --------------------------------------')
        console.log('Respuesta server', token_card.titleResponse);
        console.log('Estado: ', token_card.data.data.status);
        console.log('token_card', token_card.data.id);
        // console.log('Info_TDC ', token_card.data.card);
        console.log('---------------------------------- END tokenización de tarjeta TDC --------------------------------------')
        console.log('')


// ------------------------ Pagar con tarjeta de credito ------------------------
        var payment_credit_card = {
            'method': 'POST',
            'url': 'https://apify.epayco.co/payment/process',
            'headers': {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+token.token
            },
            body: JSON.stringify({
                "value": "1000",
                "currency": "USD",
                "description": "Pago apify node.js",
                "docType": "CC",
                "docNumber": "80755975",
                "name": "Juan",
                "lastName": "valencia",
                "email": "valencia@epayco.com",
                "cellPhone": "312548545",
                "phone": "2000000",
                "cardNumber": "4575623182290326",
                "cardExpYear": "2019",
                "cardExpMonth": "12",
                "cardCvc": "123",
                "dues": "1",
                "_cardTokenId": token_card.data.id,
                "urlResponse": "https://pruebaepayco.000webhostapp.com/response.html",
                "urlConfirmation": "https://pruebaepayco.000webhostapp.com/insert.php",
                "testMode" : false
            })
    
        };
    
        request(payment_credit_card, function (error, response) {
            if (error) throw new Error(error);
            console.log(response.body);
    
            var payment_card = JSON.parse(response.body);
    
            console.log('---------------------------------- Pago con tarjeta TDC --------------------------------------')
            console.log('Respuesta server: ', payment_card.titleResponse);
            console.log('ref_payco: ', payment_card.data.transaction.data.ref_payco);
            console.log('factura: ', payment_card.data.transaction.data.factura);
            console.log('valor: ', payment_card.data.transaction.data.valor);
            console.log('estado: ', payment_card.data.transaction.data.estado);
            console.log('respuesta: ', payment_card.data.transaction.data.respuesta);
            console.log('nombres: ', payment_card.data.transaction.data.nombres);
            console.log('apellidos: ', payment_card.data.transaction.data.apellidos);
            console.log('request: ', payment_credit_card.body);
            console.log('Response: ', payment_card.data.transaction);
            console.log('---------------------------------- END Pago con tarjeta TDC --------------------------------------')
            console.log('')
        });

    });

});




