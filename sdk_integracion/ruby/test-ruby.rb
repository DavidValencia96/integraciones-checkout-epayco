require 'epayco-sdk-ruby'

Epayco.apiKey = 'd42ae82ca25bd9b0f3877a574183c4d7' #public_key d42ae82ca25bd9b0f3877a574183c4d7
Epayco.privateKey = '7eba53ab76dbb2c39a7435a79d27b6f8' #private_key 7eba53ab76dbb2c39a7435a79d27b6f8
Epayco.lang = 'ES'
Epayco.test = true



# Create Token
credit_info = {
    "card[number]" => "4575623182290326",
    "card[exp_year]" => "2025",
    "card[exp_month]" => "12",
    "card[cvc]" => "123"
}

begin
    token = Epayco::Token.create credit_info
    # puts token
rescue Epayco::Error => e
    puts e
end

#Customers

customer_info = {
    token_card: token[:id],
    name: "David",
    last_name: "ePayco", #This parameter is optional
    email: "david.valencia12@payco.co", #Necesario cambiar correo para crear un token
    phone: "3005234321",
    default: true
}

begin
    customer = Epayco::Customers.create customer_info
    # puts Epayco::Customers.create customer_info
    customer_data = customer[:data]
    custom = customer_data[:customerId]
    puts custom

rescue Epayco::Error => e
    puts e
end


begin
  sub = Epayco::Subscriptions.create subscription_info
#   assert(sub)
puts subscription_info
rescue Epayco::Error => e
  puts e
end

subscription_info = {
    id_plan: "prueba_plan_1",
    customer: custom,
    token_card: token[:id],
    url_response: "http://localhost/test-david/response.php",
    url_confirmation: "http://localhost/test-david/confirmation.php",
    doc_type: "CC",
    doc_number: "513234567",
    ip: "190.000.000.000"  #This is the client's IP, it is required
  }
  
  begin
    sub = Epayco::Subscriptions.charge subscription_info
    puts subscription_info

  rescue Epayco::Error => e
    puts e
  end

  
# payment_info = {
#     token_card:token[:id],
#     customer_id:custom,
#     doc_type: "CC",
#     doc_number: "103585190",
#     name: "David",
#     last_name: "ePayco",
#     email: "david.valencia@pay2020.com",
#     bill: "OR-1239",
#     description: "Test Payment -- Ruby",
#     value: "150000",
#     tax: "0",
#     tax_base: "0",
#     ip: "190.000.000.000",  #This is the client's IP, it is required
#     url_response: "http://localhost/test-david/response.php",
#     url_confirmation: "http://localhost/test-david/confirmation.php",
#     use_default_card_customer: true, # if the user wants to be charged with the card that the customer currently has as default = true
#     currency: "COP",
#     dues: "12",
    #Extra params: These params are optional and can be used by the commerce
    # splitpayment: 'true',
    #     split_app_id: '75470',
    #     split_merchant_id: '75470',
    #     split_type: '02',
    #     split_primary_receiver: '75470',
    #     split_primary_receiver_fee: '0',
    #     split_rule: "multiple",
    #     split_receivers: ([
    #         { id:'30085', fee:'15', total:'150000', iva:'0', base_iva:'0'}
    #     ])
}

begin
    pay = Epayco::Charge.create payment_info
    # puts payment_info
    puts pay

rescue Epayco::Error => e
    puts e
end

# listar clientes
# begin
#     customer = Epayco::Customers.get "customer_Id"
#     puts customer
# rescue Epayco::Error => e
#     puts e
# end


# Eliminar token
# delete_customer_info = {
#     franchise: "visa",
#     mask: "457562******0326",
#     customerId: "hcoPiHabDPzve6ivf" //cambiar la variable

#   }

#   begin
#     customer = Epayco::Customers.delatetetoken delete_customer_info
#     puts customer
#   rescue Epayco::Error => e
#     puts e
#   end




# pse_info = {
#     bank: "1051",
#     invoice: "1472050778",
#     description: "pay test",
#     value: "10000",
#     tax: "0",
#     tax_base: "0",
#     currency: "COP",
#     type_person: "0",
#     doc_type: "CC",
#     doc_number: "10358519",
#     name: "testing",
#     last_name: "PAYCO",
#     email: "no-responder@payco.co",
#     country: "CO",
#     cell_phone: "3010000001",
#     ip: "190.000.000.000",  #client's IP, it is required
#     url_response: "http://localhost/test-david/response.php",
#     url_confirmation: "http://localhost/test-david/confirmation.php",
#     method_confirmation: "GET",
#     #Extra params: These params are optional and can be used by the commerce
# }

# begin
#     pse = Epayco::Bank.create pse_info
#     puts pse
# rescue Epayco::Error => e
#     puts e
# end


# puts token[:id], custom, pay

#comando "ruby" + nombre archivo