<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script type="text/javascript" src="https://checkout.epayco.co/checkout.js"> </script>
    <script type="text/javascript">
            var handler = ePayco.checkout.configure({
                key: 'f0d5cd55ce4173d87981c04616b99fa8', //llaves de integracion del comercio 
                test: false // si es prueba o no
            })
            var date = new Date().getTime();
            var data = {
                name: "Vestido Mujer Primavera",
                description: "Vestido Mujer Primavera",
                invoice: date + 126351321,
                currency: "cop",
                amount: "116000", //total  comision + procemiento $900
                tax_base: "93960", //neto
                tax: "22040", //iva
                country: "co",
                lang: "es",
                split_app_id: "497258", // id comercio que recibe el dinero
                split_merchant_id: "497258",// id comercio que recibe el dinero
                split_type: "01", //01 fijo, 02 porcentaje
                split_primary_receiver: "497258",// id comercio que recibe el dinero
                split_primary_receiver_fee: "0", //saludo a la bandera, este no hace nad apor el momento
                splitpayment: "true",
                split_rule: "multiple",
                split_receivers: [ //en la suma del array debe dar el total del monto (100000)
                    { "id": "69205",  /* id cuenta recibidora */ 
                        "total": "56000",/* total que recibe el split */ 
                        "iva": "10640", /* iva del total */ 
                        "base_iva": "45360", /* total sin iva */ 
                        "fee": "4500" /* porcentaje  o valor fijo le va a pasar a la cuenta principal en este caso id: 497258  */ 
                    },//receptores de dinero (deben tener cuenta epayco) --- 
                        //comision unicamente en caso de que devuelva un porcentaje a la cuenta ´principal

                    { "id": "497258", 
                        "total": "60000", 
                        "iva": "11400", 
                        "base_iva": "48600", 
                        "fee": "0" 
                    } //receptores de dinero (deben tener cuenta epayco)
                    //comision unicamente en caso de que devuelva un porcentaje a la cuenta ´principal
                ],
                // se cobra la comision  
                external: "false",
                extra1: "extra1",
                extra2: "extra2",
                extra3: "extra3",
                extra9: "test| pipe|revisar|",
                confirmation: "http://secure2.payco.co/prueba_curl.php",
                response: "http://secure2.payco.co/prueba_curl.php",
                //Atributos cliente
                name_billing: "Andres Perez",
                address_billing: "Carrera 19 numero 14 91",
                type_doc_billing: "cc",
                mobilephone_billing: "3050000000",
                number_doc_billing: "100000000"
            }

            handler.open(data)

 
    </script>

</body>