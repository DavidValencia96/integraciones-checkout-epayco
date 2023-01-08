<div id="botones">
    <div class="content-lg container">
        <!-- BOTONES PROPIOS -->
        <div class="masonry-grid row">
            <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>
            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 sm-margin-b-30">
                <div class="margin-b-60">
                    <h2>Botón pago genérico</h2>
                    <p>ONEPAGE CHECKOUT pago </p>
                    <form>
                        <script src='https://checkout.epayco.co/checkout.js'
                            data-epayco-key='d42ae82ca25bd9b0f3877a574183c4d7' 
                            class='epayco-button' 
                            data-epayco-amount='9999.99' 
                            data-epayco-tax='0.00'  
                            data-epayco-tax-ico='0.00'               
                            data-epayco-tax-base='9999.99'
                            data-epayco-name='prueba' 
                            data-epayco-description='prueba' 
                            data-epayco-currency='cop'    
                            data-epayco-country='CO' 
                            data-epayco-test='false' 
                            data-epayco-external='false' 
                            data-epayco-extra1='false' 
                            data-epayco-response=''  
                            data-epayco-confirmation='' 
                            data-epayco-button='https://multimedia.epayco.co/dashboard/btns/btn2.png'> 
                        </script> 
                    </form>
                    <hr>
                    <p>STANDAR CHECKOUT</p>
                    <form>
                        <script src='https://checkout.epayco.co/checkout.js' 
                                data-epayco-key='d42ae82ca25bd9b0f3877a574183c4d7' 
                                class='epayco-button' data-epayco-amount='119000' 
                                data-epayco-tax='19000' 
                                data-epayco-tax-base='100000' 
                                data-epayco-name='Botón de cobro test' 
                                data-epayco-description='Botón de cobro test' 
                                data-epayco-currency='cop' 
                                data-epayco-country='CO'
                                data-epayco-test='false' 
                                data-epayco-external='false'
                                data-epayco-response='http://localhost/test-epayco/pages/response.php' 
                                data-epayco-confirmation='http://localhost/test-epayco/pages/confirmation.php' 
                                data-epayco-button='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/boton_de_cobro_epayco4.png'>
                        </script>
                    </form>
                </div>
            </div>

            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4">
                <div class="margin-b-60">
                    <h2>Botón de pago abierto</h2>
                    <p>Redirecciona al STANDAR CHECKOUT</p>
                    <form id="frm_ePaycoCheckoutOpen" 
                        name="frm_ePaycoCheckoutOpen" 
                        method="POST" 
                        action="https://secure.payco.co/checkoutopen.php">
                        
                        <input name="p_cust_id_cliente" type="hidden" value="497258"/>
                        <input name="p_key" type="hidden" value="1ae67e3d92deaa1e69803a73eb5d9059f09c3708"/>
                        <input name="p_id_factura" type="hidden" value=""/>
                        <input name="p_description" type="hidden" value="prueba servicio"/>
                        <input name="p_detalle" type="hidden" value=""/>
                        <input name="p_referencia" type="hidden" value=""/>
                        <input name="p_test_request" type="hidden" value="false"/>
                        <input name="p_url_respuesta" type="hidden" value=""/>
                        <input name="p_url_confirmacion" type="hidden" value=""/>
                        <input type="image" id="imagen" src="https://multimedia.epayco.co/dashboard/btns/btn5.png" alt=""/>
                        <input type="hidden" id="idboton" name="idboton" value="47407"/>
                                            
                    </form>
                </div>
            </div>

            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4">
                <div class="margin-t-60 margin-b-60">
                    <h2>Botón de pago con JS</h2>
                    <p>Botón con handler JavaScript</p>
                    <a id="epayco" onclick="pagar()" class="btn-theme btn-theme-sm btn-white-bg text-uppercase">Pagar ahora</a>
                </div>
            </div>

            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4">
                <div class="margin-t-60 margin-b-60">
                    <h2>Botón de pago Split Payment</h2>
                    <p></p>
                    <a id="epayco_split" onclick="btb_split()" class="btn-theme btn-theme-sm btn-white-bg text-uppercase">Pago Dividido</a>
                </div>
            </div>
        </div>
        <!-- FIN BOTONES PROPIOS -->

        <!-- ESPACIO PARA PEGAR BOTONES NUEVOS -->
        <div class="masonry-grid row">
            <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>
            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 sm-margin-b-30">
                <div class="margin-b-60">
                    <h2>Botón pago genérico prueba</h2>
                    <p>Recuerda pegar el codigo. <br> Ruta: test-epayco/pages/botones.php :: id="FormPagoGenerico"</p>


                    <!-- Compartir al correo lpino@zambo.com.co -->
                    <form id="FormPago">
                    <h5>Recuerda rellenar todos los campos !</h5>

                        <label for="nombre">Nombre estudiante: *</label>
                        <input id="nombre" type="text" onkeypress="return soloLetras(event)" class="" ><br>
                        <label for="documento">N° Documento estudiante: *</label> 
                        <input id="documento" type="number" class="" > <br>
                        <label for="curso">Curso: *</label>
                        <input id="curso" type="text" class=""><br>
                        <input id="DatosForm" onclick="pagarAhora()" type="submit" value="Pagar ahora" class="">
                            
                        <script>
                            document.getElementById("DatosForm").onclick = pagarAhora;
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById("FormPago").addEventListener('submit', pagarAhora); 
                            });

                            function pagarAhora(e) {
                                e.preventDefault();
                                var nombre = document.getElementById("nombre").value;
                                var documento = document.getElementById("documento").value;
                                var curso = document.getElementById("curso").value;
                                
                                // Validación de campos
                                if(nombre.length == 0) {
                                    alert('El campo "Nombre Estudiante" no puede ir en blanco o vacio');
                                    return;
                                }
                                if (documento.length == 0) {
                                    alert('El campo "N° Documento estudiante" no puede ir en blanco o vacio');
                                    return;
                                }
                                if(curso.length == 0) {
                                    alert('El campo Curso" no puede ir en blanco o vacio');
                                    return;
                                }

                                var handler = ePayco.checkout.configure({
                                    key: "d42ae82ca25bd9b0f3877a574183c4d7", //public_key la sacan del dashboard llaves API
                                    test: false,
                                });
                                var data = {
                                    //Parametros compra (obligatorio)
                                    name: "Nombre estudiante: "+nombre+" - Colegio: XXXXX - Programa: XXXXX - Destino: XXXXX -- Código: XXXXXXXXXX",
                                    description: "Nombre estudiante: "+nombre+" - Colegio: XXXXX - Programa: XXXXX - Destino: XXXXX -- Código: XXXXXXXXXX",
                                    currency: "cop",
                                    amount: "20000", //Aqui el valor total a pagar incluyendo IVA ((el valor del producto + iva))
                                    tax_base: "0",  //Aqui el valor a pagar SIN IVA
                                    tax: "0",  // Aqui el IVA del producto
                                    country: "co",
                                    lang: "en",
                                    //Onpage="false" - Standard="true"
                                    external: "true",
                                    //Atributos opcionales
                                    extra1: "Nombre estudiante: "+nombre,
                                    extra2: "Documento estudiante: "+documento,
                                    extra3: "Curso estudiante: "+curso,
                                    confirmation: "https://pruebaepayco.000webhostapp.com/insert.php",
                                    response: "https://pruebaepayco.000webhostapp.com/response.html",
                                    method: "POST",
                                };
                                console.log(data);
                                handler.open(data);
                            }
                        </script>
                    </form>
                </div>
            </div>

            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4">
                <div class="margin-b-60">
                    <h2>Botón de pago abierto prueba</h2>
                    <p>Recuerda pegar el codigo. <br> Ruta: test-epayco/pages/botones.php :: id="FormPagoAbierto"</p>
                    
                    
                    


                </div>
            </div>
        </div>
        <!-- FIN ESPACIO PARA PEGAR BOTONES NUEVOS -->

        
    </div>
</div>

<script ></script>
