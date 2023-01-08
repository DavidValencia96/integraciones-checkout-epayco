import http.client
import base64 as b64
import json
from datetime import datetime


# Defino la url como constante para poderla utilizar en todo el proyecto sin problema
global conn 
conn = http.client.HTTPSConnection("apify.epayco.co")

def solicitar_tokenJWT():
    payload = ''
    user = 'd42ae82ca25bd9b0f3877a574183c4d7:7eba53ab76dbb2c39a7435a79d27b6f8'

    #codifico en base 64 las llaves
    encoded_u = b64.b64encode(user.encode()).decode()  
    headers = {
        'Content-Type': 'application/json',
        'Authorization': "Basic %s" % encoded_u                                  
    }

    conn.request("POST", "/login", payload, headers)
    res = conn.getresponse()
    data = res.read()

    # print('este es el token retornado por la api: ', data.decode("utf-8"))

    '''Guardo el token en la variable "response" en formato JSON, para despues generar en la variable 
    "token" tomar el valor del token  que retorno la api'''
    response = json.loads(data.decode("utf-8")) 
    global token # defino la palabra token como global para utilizarla en otra funciona
    token = response['token']     

    # print('************************** TOKEN JTW *******************************************************')         
    # print('este es el token tomado del JSON: ', token)
    # print('************************** END TOKEN JTW ***************************************************')
    # print('')

def consultar_detalleTx():
    ref_payco = int(input("ingrese una ref_payco, en caso de no tener alguna ingrese la siguiente '83964530': "))
    consultar_tx = json.dumps({
        "filter": {
            "referencePayco": ref_payco
        }
    })
    headers = {
    'Content-Type': 'application/json',
    'Authorization': "Bearer %s" % token
    }
    conn.request("GET", "/transaction/detail", consultar_tx, headers)
    res = conn.getresponse()
    data = res.read()
    # print(data.decode("utf-8"))

    # Guardo los datos que retorno la red en un json
    data_transation = json.loads(data.decode("utf-8")) 

    #aqui almaceno en la variable los datos que quiero tomar del json e ingreso al "log" que retorna epayco con las variables x_ref_payco, ...
    data = data_transation['data']['log']
    ref_payco = data_transation['data']['log']['x_ref_payco']
    email_comprador = data_transation['data']['log']['x_customer_email']

    print('************************** Consultar Transacción *******************************************************')
    print('Ref_payco: ',ref_payco) 
    print('email_comprador: ',email_comprador)
    print('Detalle tx ',data) 
    print('************************** END Consultar Transacción *******************************************************')       
    print('')

def crear_linkCobro():
    print('************************** Generar link de cobro *******************************************************') 
    print("A continuación ingrese los datos para crear un link de cobro y enviarselo al cliente pagador")
    amount = input("ingrese el valor a cobrar: ")
    tipo_moneda = input("Seleccione el tipo de moneda --> 'USD ó COP':  ").upper()
    titulo = input("Ingrese una titulo para el cobro:  ")
    descripcion = input("Ingrese una descripción para el cobro:  ")
    email = input("Ingrese el email del cliente el cual va a pagar:  ")
    # mobil = input("Ingrese el numero celular del cliente el cual va a pagar:  ")
    create_link = json.dumps({
        "quantity": 1,
        "onePayment": True,
        "amount": amount,
        "currency": tipo_moneda,
        "id": 0,
        "description": descripcion,
        "title": titulo,
        "typeSell": "1",
        "tax": "0",
        # "indicative": "57",
        # "mobilePhone": mobil
        "email": "david.valencia@payco.co"
    })
    headers = {
    'Content-Type': 'application/json',
    'Authorization': "Bearer %s" % token
    }

    conn.request("POST", "/collection/link/create", create_link, headers)
    res = conn.getresponse()
    data = res.read()
    # print(data.decode("utf-8"))

    # Guardo los datos que retorno la red en un json
    data_link_cobro = json.loads(data.decode("utf-8")) 
    print (data_link_cobro)

    detail_link = data_link_cobro['data']
    url_link = data_link_cobro['data']['routeLink']
    title_link = data_link_cobro['data']['title']
    valor_link = data_link_cobro['data']['amount']
    description_link = data_link_cobro['data']['description']

    print('************************** Generar link de cobro *******************************************************')  
    # print('data_link_cobro: ',detail_link)
    print('url_link: ',url_link) 
    print('title_link: ',title_link) 
    print('valor_link: ',valor_link) 
    print('description_link: ',description_link) 
    print('************************** END Generar link de cobro  *******************************************************')  
    print ('')  

def token_card():
    init_token_card = json.dumps({
        "cardNumber": "4575623182290326",
        "cardExpYear": "2025",
        "cardExpMonth": "20",
        "cardCvc": "123"
    })
    headers = {
        'Content-Type': 'application/json',
        'Authorization': "Bearer %s" % token
    }

    conn.request("POST", "/token/card", init_token_card, headers)
    res = conn.getresponse()
    data = res.read()
    # print(data.decode("utf-8"))

    # Guardo los datos que retorno la red en un json
    data_token_card = json.loads(data.decode("utf-8")) 
    # print (data_token_card)

    data_info_token = data_token_card['textResponse']

    # Si tokeniza correctamente COMENTAR/DESCOMENTAR LINEAS SIGUIENTES
    global token_credit_card
    token_credit_card = data_token_card['data']['data']['id']
    token_status = data_token_card['data']['data']['status']
    token_created = data_token_card['data']['data']['created']

    # Si presenta error al tokenizar COMENTAR/DESCOMENTAR LINEAS SIGUIENTES

    # error_description = data_token_card['data']['error']['description']
    # error_data_errors = data_token_card['data']['error']['errors']

    print('************************** Token tarjeta *******************************************************')  
    # print('all data: ',data_token_card) 
    print('data_info_token: ',data_info_token) 

    # Si tokeniza correctamente COMENTAR/DESCOMENTAR LINEAS SIGUIENTES
    print('token_card: ',token_credit_card) 
    print('token_status: ',token_status) 
    print('token_created: ',token_created) 

    # Si presenta error al tokenizar COMENTAR/DESCOMENTAR LINEAS SIGUIENTES
    # print('error_description: ',error_description) 
    # print('error_data_errors: ',error_data_errors) 
    print('************************** END Token tarjeta  *******************************************************') 

def payment_credit():
    payment_tdc = json.dumps({
        "value": "190",
        "invoice": "Factura Python Apify "+datetime.today().strftime('%Y-%m-%d %H:%M'),
        "currency": "USD",
        "description": "Pago apify python",
        "docType": "CC",
        "docNumber": "80755975",
        "name": "Juan",
        "lastName": "valencia",
        "email": "valencia@epayco.com",
        "cellPhone": "312548545",
        "phone": "2000000",
        "cardNumber": "4575623182290326",
        "cardExpYear": "2025",
        "cardExpMonth": "12",
        "cardCvc": "123",
        "dues": "1",
        "_cardTokenId": token_credit_card,
        "urlResponse": "https://pruebaepayco.000webhostapp.com/response.html",
        "urlConfirmation": "https://pruebaepayco.000webhostapp.com/insert.php",
        "testMode" : False
    })
    headers = {
        'Content-Type': 'application/json',
        'Authorization': "Bearer %s" % token
    }

    conn.request("POST", "/payment/process", payment_tdc, headers)
    res = conn.getresponse()
    data = res.read()
    # print(data.decode("utf-8"))

    data_transation_TDC = json.loads(data.decode("utf-8")) 
    # print (data_transation_TDC)

    titleResponse = data_transation_TDC['titleResponse']
    ref_payco_paymentTDC = data_transation_TDC['data']['transaction']['data']['ref_payco']
    amount_paymentTDC = data_transation_TDC['data']['transaction']['data']['valor']
    estado = data_transation_TDC['data']['transaction']['data']['estado']
    nombres = data_transation_TDC['data']['transaction']['data']['nombres']
    apellidos = data_transation_TDC['data']['transaction']['data']['apellidos']
    factura = data_transation_TDC['data']['transaction']['data']['factura']
    data_TDC = data_transation_TDC['data']['transaction']['data']


    print('************************** Data de pago TDC *******************************************************')  
    print ('Respuesta server: ',titleResponse)
    print ('ref_payco : ',ref_payco_paymentTDC)
    print ('factura : ',factura)
    print ('valor: ',amount_paymentTDC)
    print ('estado: ',estado)
    print ('nombres: ',nombres,' ',apellidos )
    print ('request: ',payment_tdc)
    print ('Response: ', data_TDC)

    print('************************** END Data de pago TDC *******************************************************')  


def run():
    solicitar_tokenJWT()
    # # consultar_detalleTx()
    # # crear_linkCobro()
    # token_card()
    # payment_credit()

    sw = True
    while sw:
        try:
            print('''
----------------------------------------------------------------------
            Seleccione un numero: 
            1. Consultar el detalle de una transacción. 
            2. Tokenizar tarjeta. 
            3. Procesar transacción. 
            4. Enviar cobro 
            5. Salir del programa 
----------------------------------------------------------------------
            ''')
            n = int(input("Ingrese el número según su requerimiento: "))
            if n == 1:
                consultar_detalleTx()
                return run()
            elif n == 2:
                token_card()
                return run()
            elif n == 3:
                payment_credit()
                return run()
            elif n == 4:
                crear_linkCobro()
                return run()
            elif n ==5:
                sw = False
                print("Programa Terminado!")
        except ValueError :
                print("Error seleccione una opcion correcta")
    

if __name__ == '__main__':
    run()