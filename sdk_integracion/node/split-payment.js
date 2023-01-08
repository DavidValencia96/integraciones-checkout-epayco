var epayco = require("epayco-sdk-node")({
  apiKey: "485d5b188e7e9796c74cc9d7f64931fb",
  privateKey: "9ec0313c812b85d64fa5b017c392cf7c",
  lang: "ES",
  test: false,
});

// var credit_info = {
//     "card[number]": "4093550009494687",
//     "card[exp_year]": "2027",
//     "card[exp_month]": "10",
//     "card[cvc]": "040",
// };

var credit_info = {
  "card[number]": "4575623182290326",
  "card[exp_year]": "2025",
  "card[exp_month]": "12",
  "card[cvc]": "123",
};

epayco.token.create(credit_info).then(function (token) {
    // console.log(token);
    console.log("Token card: ", token.id);

    var customer_info = {
        token_card: token.id,
        name: "Juan David ",
        last_name: "Valencia toro",
        email: "juanda.vid1996@hotmail.com", //El correo no se puede repetir
        default: true,
        //Optional parameters: These parameters are important when validating the credit card transaction
        city: "Medellin",
        address: "cl 49 # 2 ab- 53 int 135",
        phone: "0000000",
        cell_phone: "3215845480",
    };

    epayco.customers.create(customer_info).then(function (customer) {
        console.log(customer);
    }).catch(function (err) {
        console.log("err: " + err);
    });


    var payment_info = {
        token_card: token.id,
        customer_id: customer.data.customerId,
        doc_type: "CC",
        doc_number: "10358519",
        name: "Juan David",
        last_name: "Valencia toro",
        email: "juanda.vid1996@hotmail.com",
        city: "Medellín",
        address: "cl 49 # 2 ab- 53 int 135",
        phone: "0000000",
        cell_phone: "3215845480",
        bill: "split-sdk-node1",
        description: "Test Payment split",
        value: "50",
        tax: "0",
        tax_base: "0",
        currency: "COP",
        dues: "1",
        ip: "190.000.000.000" /*This is the client's IP, it is required */,
        url_response: "https://ejemplo.com/respuesta.html",
        url_confirmation: "https://ejemplo.com/confirmacion",
        method_confirmation: "GET",
        splitpayment: "true",
        split_app_id: "9898",
        split_merchant_id: "9898",
        split_type: "01",
        split_primary_receiver: "9898",
        split_primary_receiver_fee: "0",
        split_rule: "multiple", // si se envía este campo el campo split_receivers sería obligatorio
        split_receivers: [
            { id: "515360", total: "50", iva: "", base_iva: "", fee: "10" },
        ], // Campo obligatorio sí se envía el campo split_rule

        use_default_card_customer: false /*if the user wants to be charged with the card that the customer currently has as default = true*/,
        extras: {
            extra1: "",
            extra2: "",
            extra3: "",
            extra4: "",
            extra5: "",
            extra6: "",
        },
    };
        epayco.charge.create(payment_info).then(function (charge) {
            console.log(charge);
        }).catch(function (err) {
            console.log("err: " + err);
        });
    }).catch(function (err) {
        console.log("err: " + err);
    });
