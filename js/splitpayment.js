// Split 

document.getElementById("epayco_split").onclick = btn_split;

function btn_split() {
  var handler = ePayco.checkout.configure({
    key: "485d5b188e7e9796c74cc9d7f64931fb",
    test: false,
  });

  var data = {
    name: "Prueba split payment",
    description: "Pago split 2022 ",
    // invoice: "Pago split 2022",
    currency: "cop",
    amount: "20", //total a pagar
    tax_base: "15", //
    tax: "5", //
    country: "co",
    lang: "es",

    split_app_id: "9898", // ID marketplace principal juan   == 10
    split_merchant_id: "9898", // ID marketplace principal
    split_primary_receiver: "9898", // ID marketplace principal
    split_type: "01", //01 :: fijo ---- 02:: porcentual
    split_primary_receiver_fee: "0",
    splitpayment: true,
    split_rule: "multiple",
    
    split_receivers: [
      { id: "515360", total: "10", iva: "2",  base_iva: "8", fee: "5.99" }, //pedro "el fee por fija   es la comisión para el marketplace"
      { id: "515360", total: "5",  iva: "1",  base_iva: "4", fee: "5" }, //pedro "el fee es por porcentaje comisión para el marketplace"
      { id: "9898",   total: "5",  iva: "2",  base_iva: "3", fee: "2" }, // ana
    ],

    external: "false",
    extra1: "extra1",
    extra2: "extra2",
    extra3: "extra3",
    extra9: "split",
    confirmation: "http://localhost/test-epayco/pages/confirmation.php",
    response: "http://localhost/test-epayco/pages/response.php",
    //Atributos cliente
    name_billing: "Juan david",
    address_billing: "Carrera 19 numero 14 91",
    type_doc_billing: "cc",
    mobilephone_billing: "3050000000",
    number_doc_billing: "100000000",
  };
//   console.log(data.extra1);
  handler.open(data);
}
