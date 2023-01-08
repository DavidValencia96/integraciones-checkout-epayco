
    var epayco = require("epayco-sdk-node")({
    apiKey: "d42ae82ca25bd9b0f3877a574183c4d7", //public_key d42ae82ca25bd9b0f3877a574183c4d7
    privateKey: "7eba53ab76dbb2c39a7435a79d27b6f8", //private_key 7eba53ab76dbb2c39a7435a79d27b6f8
    lang: "ES",
    test: false,
    });

    var credit_info = {
        "card[number]": "4575623182290326",
        "card[exp_year]": "2025",
        "card[exp_month]": "12",
        "card[cvc]": "123",
    };

    epayco.token.create(credit_info).then(function (token) {
        console.log(token);

        var customer_info = {
            token_card: token.id,
            name: "juan",
            last_name: "ePayco",
            email: "david.valdcqia@hotmail.co", //El correo no se puede repetir
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


// -------------------------- >card <------------------------------

            var payment_info = {
                token_card: token.id,
                customer_id: customer.data.customerId,
                doc_type: "CC",
                doc_number: "1035851980",
                name: "david",
                last_name: "epayco",
                email: "example@email.com",
                city: "MEdellin",
                address: "Cr 4 # 55 36",
                phone: "3005236",
                cell_phone: "3010000001",
                bill: "OR-1234",
                description: "Test Payment",
                value: "50000",
                tax: "0",
                tax_base: "0",
                currency: "COP",
                dues: "12",
                ip: "190.000.000.000" /*This is the client's IP, it is required */,
                url_response: "http://localhost/test-david/response.php",
                url_confirmation: "http://localhost/test-david/confirmation.php",
                method_confirmation: "GET",
                //Extra params: These params are optional and can be used by the commerce
                use_default_card_customer: true, /*if the user wants to be charged with the card that the customer currently has as default = true*/
            
                extra1: "iva_envio:100, costo:1000",
            };

            epayco.charge.create(payment_info).then(function (charge) {
                console.log(charge);
            }).catch(function (err) {
                console.log("err: " + err);
            });
            
            console.log(payment_info);


// // -------------------------- >pse <------------------------------
            var pse_info = {
                bank: "1051",
                invoice: "1221",
                description: "pay test",
                value: "2",
                tax: "0",
                tax_base: "0",
                currency: "COP",
                type_person: "0",
                doc_type: "CC",
                doc_number: "1017237749",
                name: "juan david ",
                last_name: "valencia toro",
                email: "juanda.vid1996@hotmail.com",
                country: "CO",
                cell_phone: "3010000001",
                ip:"190.000.000.000", /*This is the client's IP, it is required */
                url_response: "https://ejemplo.com/respuesta.html",
                url_confirmation: "https://ejemplo.com/confirmacion",
                metodoconfirmacion : "GET",
            
                //Los parámetros extras deben ser enviados tipo string, si se envía tipo array generara error.
                    extra1: "",
                    extra2: "",
                    extra3: "",
                    extra4: "",
                    extra5: "",
                    extra6: ""
                
            }
            epayco.bank.create(pse_info)
                .then(function(bank) {
                    console.log(bank);
                })
                .catch(function(err) {
                    console.log("err: " + err);
                });



        });
    }).catch(function (err) {
        console.log("err: " + err);
    });


    // comando "node" + nombre archivo
