require "uri"
require "json"
require "net/http"
require "base64"

#doc :: http://diario-ruby-facil.blogspot.com/2007/09/rubyiv-avanzando.html

# Encriptación de llaves y url apify
auth = Base64::encode64("d42ae82ca25bd9b0f3877a574183c4d7:7eba53ab76dbb2c39a7435a79d27b6f8").delete("\n")
url_apify = ("https://apify.epayco.co")  #personalización de variable url

# ------------------------------ Solicitud Token JWT-------------------------------------------
login = URI(url_apify + "/login") #personalización de variable url  para despues llamar al endpoint unicamente

https = Net::HTTP.new(login.host, login.port)
https.use_ssl = true

request = Net::HTTP::Post.new(login)
request["Content-Type"] = "application/json"
request["Authorization"] = "Basic " + auth

response_token_jwt = https.request(request)
# puts response_token_jwt.read_body

tokenJTW = JSON.parse(response_token_jwt.read_body)

puts "************************** TOKEN JWT *******************************************************"
puts "TOKEN JWT: " + tokenJTW["token"]
puts "************************** END TOKEN JWT ***************************************************"
puts " "

# ------------------------------ Consultar transacción -------------------------------------------

detail = URI(url_apify + "/transaction/detail")

https = Net::HTTP.new(detail.host, detail.port)
https.use_ssl = true

request = Net::HTTP::Get.new(detail)
request["Content-Type"] = "application/json"
request["Authorization"] = "Bearer " + tokenJTW["token"]

request.body = JSON.dump({
  "filter": {
    "referencePayco": 79398247,
  },
})

response_detail_tx = https.request(request)
# puts response_detail_tx.read_body

detail_tx = JSON.parse(response_detail_tx.read_body) #almaceno los datos en un JSON

data = detail_tx["data"]["log"]
ref_payco = detail_tx["data"]["log"]["x_ref_payco"]
valor = detail_tx["data"]["log"]["x_amount"]
email_comprador = detail_tx["data"]["log"]["x_customer_email"]

puts "************************** Detalle de transaccion *******************************************"
puts "Ref payco: #{ref_payco}\n" # una forma diferente de anexar la variable dentro de un comentario u texto
print "Valor: " + valor.to_s + "\n"  # el ".to_s" es para convertir el int que guarda el JSON en un STRING
puts "Email comprador: " + email_comprador
# puts "Datos TX: ", data
puts "************************** END Detalle de transaccion ***************************************"
puts " "

# ------------------------------ Token CARD -------------------------------------------

token_card = URI(url_apify + "/token/card")

https = Net::HTTP.new(token_card.host, token_card.port)
https.use_ssl = true

request = Net::HTTP::Post.new(token_card)
request["Content-Type"] = "application/json"
request["Authorization"] = "Bearer " + tokenJTW["token"]

request.body = JSON.dump({
  "cardNumber": "4575623182290326",
  "cardExpYear": "2019",
  "cardExpMonth": "12",
  "cardCvc": "123",
})

response_token_card = https.request(request)
# puts response_token_card.read_body

detail_token_card = JSON.parse(response_token_card.read_body) #almaceno los datos en un JSON

data_info_token = detail_token_card["textResponse"]
token_card = detail_token_card["data"]["data"]["id"]
token_status = detail_token_card["data"]["data"]["status"]
token_created = detail_token_card["data"]["data"]["created"]

puts "************************** Detalle de token card *******************************************"
puts "data_info_token: #{data_info_token}\n"
puts "token_card: " + token_card + "\n"
puts "token_status: " + token_status
puts "token_created: ", token_created
puts "************************** END Detalle de token card ***************************************"
puts " "

# ------------------------------ Pago con tarjeta de credito -------------------------------------------

payment_tc = URI(url_apify + "/payment/process")

https = Net::HTTP.new(payment_tc.host, payment_tc.port)
https.use_ssl = true

request = Net::HTTP::Post.new(payment_tc)
request["Content-Type"] = "application/json"
request["Authorization"] = "Bearer " + tokenJTW["token"]

request.body = JSON.dump({
    "value": "10",
    "currency": "USD",
    "description": "Pago apify Ruby",
    "tax": 0,
    "taxBase": 0,
    "docType": "CC",
    "docNumber": "1017237749",
    "name": "juan david",
    "lastName": "valencia toro",
    "email": "juanda.vid1996@hotmail.com",
    "cellPhone": "3215845480",
    "phone": "2224272",
    "cardNumber": "4575623182290326",
    "cardExpYear": "2025",
    "cardExpMonth": "12",
    "cardCvc": "123",
    "dues": "1",
    "_cardTokenId": token_card,
    "urlResponse": "https://pruebaepayco.000webhostapp.com/response.html",
    "urlConfirmation": "https://pruebaepayco.000webhostapp.com/insert.php",
    "testMode": false,
})

response_payment_tcd = https.request(request)
# puts response_payment_tcd.read_body

data_transation_TDC = JSON.parse(response_payment_tcd.read_body)

titleResponse = data_transation_TDC["titleResponse"]
ref_payco_paymentTDC = data_transation_TDC["data"]["transaction"]["data"]["ref_payco"]
amount_paymentTDC = data_transation_TDC["data"]["transaction"]["data"]["valor"]
estado = data_transation_TDC["data"]["transaction"]["data"]["estado"]
nombres = data_transation_TDC["data"]["transaction"]["data"]["nombres"]
apellidos = data_transation_TDC["data"]["transaction"]["data"]["apellidos"]
factura = data_transation_TDC["data"]["transaction"]["data"]["factura"]
data_TDC = data_transation_TDC["data"]["transaction"]["data"]

puts ("************************** Data de pago TDC *******************************************************")
puts ("Respuesta server: " + titleResponse)
puts ("ref_payco : " + ref_payco_paymentTDC.to_s + "\n")
puts ("factura : " + factura)
puts ("valor: " + amount_paymentTDC.to_s + "\n")
puts ("estado: " + estado)
puts ("nombres: " + nombres)
puts ("apellidos: " + apellidos)
puts ("request: " + request.body)
puts ("Response: " + data_TDC.to_s)

puts ("************************** END Data de pago TDC *******************************************************")




