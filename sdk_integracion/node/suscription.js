document.getElementById("epayco").onclick = pagar;

function pagar() {
    
    var epayco = require("epayco-sdk-node")({
    apiKey: "d42ae82ca25bd9b0f3877a574183c4d7", //public_key d42ae82ca25bd9b0f3877a574183c4d7
    privateKey: "7eba53ab76dbb2c39a7435a79d27b6f8", //private_key 7eba53ab76dbb2c39a7435a79d27b6f8
    lang: "ES",
    test: true,
});

var credit_info = {
    "card[number]": "4575623182290327",
    "card[exp_year]": "2025",
    "card[exp_month]": "12",
    "card[cvc]": "123",
};

epayco.token.create(credit_info)
    .then(function(token) {
        console.log(token);
    })
    .catch(function(err) {
        console.log("err: " + err);
    });

epayco.token.create(credit_info).then(function (token) {

    var customer_info = {
        token_card: token.id,
        name: "juan",
        last_name: "ePayco",
        email: "david.valdcia@hotmail.co", //El correo no se puede repetir
        default: true,
        //Optional parameters: These parameters are important when validating the credit card transaction
        city: "Medellin",
        address: "Cr 4 # 55 36",
        phone: "3005234321",
        cell_phone: "3010000001",
    };

    epayco.customers.create(customer_info).then(function (customer) {
        console.log(customer_info);
        console.log(customer);

        var subscription_info = {
            id_plan: "Suscripcion_mensual_plan_1_modo_prueba",
            customer: customer.data.customerId,
            token_card: token.id,
            doc_type: "CC",
            doc_number: "52231267",
            //Optional parameter: if these parameter it's not send, system get ePayco dashboard's url_confirmation
            url_response: "https://www.google.com",
            url_confirmation: "https://ejemplo.com/confirmacion",
            method_confirmation: "POST",
            ip: "192.168.0.103" //require("dns").lookup(require("os").hostname(),function (err, add, fam) {console.log("addr: " + add);}),
        };

        epayco.subscriptions.create(subscription_info).then(function (subscription) {
            console.log(subscription);
        }).catch(function (err) {console.log("err: " + err);});

        var subscription_info = {
            id_plan: "Suscripcion_mensual_plan_1_modo_prueba",
            customer: customer.data.customerId,
            token_card: token.id,
            doc_type: "CC",
            doc_number: "52231267",
        };

        epayco.subscriptions.charge(subscription_info).then(function (subscription) {
            console.log(subscription);
        }).catch(function (err) {console.log("err: " + err);});

        console.log(subscription_info);

    });
}).catch(function (err) {
    console.log("err: " + err);
});

}
// comando "node" + nombre archivo
