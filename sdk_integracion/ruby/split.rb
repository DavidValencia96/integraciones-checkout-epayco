require "epayco-sdk-ruby"
Epayco.apiKey = "c40acc8a877f180bf312c79aae0503f7"
Epayco.privateKey = "b13e95ea247b7cbe1f41724a1cb86d91"
Epayco.lang = "ES"
Epayco.test = false

pse_info = {
  bank: "1022",
  invoice: rand(999999).to_s,
  description: "SDK RUBY Pruebas ePayco Split PSE",
  value: "50",
  tax: "0",
  tax_base: "0",
  currency: "COP",
  type_person: "0",
  doc_type: "CC",
  doc_number: "1342242",
  name: "Juan David",
  last_name: "Valencia",
  email: "david.valencia@payco.co",
  country: "CO",
  cell_phone: "3042462218",
  ip: "181.134.247.50",  #client's IP, it is required
  url_response: "http://localhost/test-david/response.php",
  url_confirmation: "http://localhost/test-david/confirmation.php",
  method_confirmation: "POST",
  splitpayment: "true",
  split_app_id: "9898",
  split_merchant_id: "9898",
  split_type: "01",
  split_primary_receiver: "9898",
  split_primary_receiver_fee: "0",
  split_rule: "multiple", #si se envía este parámetro el campo split_receivers se vuelve obligatorio
  split_receivers: [
    { "id": "515360", "total": "25", "iva": "0", "base_iva": "0", "fee": "5" },
    { "id": "93006", "total": "25", "iva": "0", "base_iva": "0", "fee": "10" },
  ],
  #Extra params: These params are optional and can be used by the commerce
  extra1: "",
  extra2: "",
  extra3: "",
  extra4: "",
  extra5: "",
  extra6: "",
  extra7: "",
  extra8: "",
  extra9: "",
  extra10: "",
}
begin
  pse = Epayco::Bank.create pse_info
rescue Epayco::Error => e
  puts e
end
puts pse
