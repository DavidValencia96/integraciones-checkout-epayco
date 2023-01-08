document.getElementById("epayco").onclick = pagar;



// id_cliente = '497258';

function pagar() {

    var handler = ePayco.checkout.configure({
        key: "99f4947310c0f958b63d8a29963020d7", //public_key d42ae82ca25bd9b0f3877a574183c4d7
        test: false,
    });
    
    var data = {
        //Parametros compra (obligatorio)
        name: "test payment epayco",
        description: "test payment epayco",
        // invoice: "01-002",
        currency: "cop",
        amount: "1", //aqui se suma el tax base:: "valor del producto " + el tax :: "el IVA" y dal un total:: "amount" 20000
        tax_base: "0", //valor del producto
        tax: "0", //iva del producto
        country: "co",
        lang: "en",
        //Onpage="false" - Standard="true"
        external: "false",

        //Atributos opcionales
        extra1: "extra1",
        extra2: "extra1",
        extra3: "extra1",
        // confirmation: "https://plugins.epayco.io/testing/wp57/?wc-api=WC_ePayco&order_id=523&confirmation=1",
        // response: "https://plugins.epayco.io/testing/wp57/?wc-api=WC_ePayco&order_id=523",
        confirmation: "https://pruebaepayco.000webhostapp.com/insert.php",
        response: "https://pruebaepayco.000webhostapp.com/response.html",
        method: "POST",

 

        //Atributos cliente
        name_billing: "juan david valencia",
        address_billing: "calle 10 # 10- 10 ",
        type_doc_billing: "CC",
        mobilephone_billing: "3215845480",
        number_doc_billing: "1017237749",
        // methodsDisable: ["TDC", "PSE","CASH","DP"]

        //atributo deshabilitación metodo de pago
        // methodsDisable: ["SP","CASH","DP"]
        // methodsDisable: [], //habilito los otros metodos de pago

    };

    // console.log(data);
    handler.open(data);
    console.log("🚀 ~ file: epayco.js ~ line 56 ~ pagar ~ data", data)

}
