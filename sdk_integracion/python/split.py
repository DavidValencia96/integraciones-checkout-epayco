import epaycosdk.epayco as epayco


# public_key d42ae82ca25bd9b0f3877a574183c4d7
apiKey = "f0d5cd55ce4173d87981c04616b99fa8"
# private_key 7eba53ab76dbb2c39a7435a79d27b6f8
privateKey = "5dbb946dda694ce958655077e1a26e66"
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
print("Este es el Token_card: ", tokenCardID)

customer_info = {
    "token_card": tokenCardID,
    "name": "David ",
    "last_name": "Valencia",  # This parameter is optional
    "email": "david.valencia@payco.co",
    "phone": "3005234321",
    "default": True
}

customer = objepayco.customer.create(customer_info)
# print(customer)
custo_Data = customer['data']
custom = (custo_Data['customerId'])
print("Este es el customerId: ", custom)


payment_info = {
    "token_card": tokenCardID,
    "customer_id": custom,
    "doc_type": "CC",
    "doc_number": "100000022",
    "name": "David ",
    "last_name": "valencia",
    "email": "david.valencia@payco.co",
    "ip": "192.198.2.114",
    "bill": "OR-1234",
    "description": "Test Payment -- Python",
    "value": "116000",
    "tax": "16000",
    "tax_base": "100000",
    "currency": "COP",
    "dues": "12",
    "ip": "190.000.000.000",  # This is the client's IP, it is required
    "url_response": "http://localhost/test-david/response.php",
    "url_confirmation": "http://localhost/test-david/confirmation.php",
    "method_confirmation": "GET",
    "splitpayment": "true",
    "split_app_id": "9898",
    "split_merchant_id": "9898",
    "split_type": "01",
    "split_primary_receiver": "9898",
    "split_primary_receiver_fee": "0",
    "split_receivers": [
        {"id": "515360", "total": "58000", "iva": "8000", "base_iva": "50000", "fee": "5000"},
        {"id": "93006", "total": "58000", "iva": "8000", "base_iva": "50000", "fee": "5000"}
    ],
    # Extra params: These params are optional and can be used by the commerce
    # "use_default_card_customer":True # if the user wants to be charged with the card that the customer currently has as default = true
}

pay = objepayco.charge.create(payment_info)

print(pay)









###############################################################

# PSE #
pse_info = {
    "bank": "1007",
    "invoice": "14728768",
    "description": "pay test Python",
    "value": "116000",
    "tax": "0",
    "tax_base": "0",
    "currency": "COP",
    "type_person": "0",
    "doc_type": "CC",
    "doc_number": "1000670",
    "name": "testing",
    "last_name": "PAYCO",
    "email": "no-responder@payco.co",
    "country": "CO",
    "cell_phone": "3010000001",
    "ip": "190.000.000.000",  # This is the client's IP, it is required,
    "url_response": "http://localhost/test-david/response.php",
    "url_confirmation": "http://localhost/test-david/confirmation.php",
    "method_confirmation": "GET",
    # Extra params: These params are optional and can be used by the commerce
}

pse = objepayco.bank.create(pse_info)
# pse1 = objepayco.bank.pseTransaction("transactionID")
print(pse)
