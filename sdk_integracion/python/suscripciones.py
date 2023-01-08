import epaycosdk.epayco as epayco


apiKey = "d42ae82ca25bd9b0f3877a574183c4d7" # public_key d42ae82ca25bd9b0f3877a574183c4d7
privateKey = "7eba53ab76dbb2c39a7435a79d27b6f8" # private_key 7eba53ab76dbb2c39a7435a79d27b6f8
lenguage = "ES"
test = False
options = {"apiKey": apiKey, "privateKey": privateKey,
            "test": test, "lenguage": lenguage}

objepayco = epayco.Epayco(options)

credit_info = {
    "card[number]": "4575623182290326",
    "card[exp_year]": "2025",
    "card[exp_month]": "12",
    "card[cvc]": "123"
}

token = objepayco.token.create(credit_info)
tokenCardID = (token['id'])
print("Este es el Token_card: ",tokenCardID)

customer_info = {
    "token_card": tokenCardID,
    "name": "David ",
    "last_name": "Valencia",  # This parameter is optional
    "email": "david.valencia@paycoc.co",
    "phone": "3005234321",
    "default": True
}

customer = objepayco.customer.create(customer_info)
#print(customer)
custo_Data = customer['data']
custom = (custo_Data['customerId'])
print("Este es el customerId: ", custom)


subscription_info = {
"id_plan": "prueba_plan_1",
"customer": custom,
"token_card": tokenCardID,
"doc_type": "CC",
"doc_number": "123112",
#Optional parameter: if these parameter it's not send, system get ePayco dashboard's url_confirmation
"url_confirmation": "https://tudominio.com/confirmacion.php",
"method_confirmation": "POST"
}

sub=objepayco.subscriptions.create(subscription_info)
print (sub)


subscription_info = {
  "id_plan": "prueba_plan_1",
  "customer": custom,
  "token_card": tokenCardID,
  "doc_type": "CC",
  "doc_number": "13121232",
  "ip":"190.000.000.000"  #This is the client's IP, it is required

}

sub = objepayco.subscriptions.charge(subscription_info)
print (sub)