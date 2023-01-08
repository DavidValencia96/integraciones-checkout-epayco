<php? 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <script src="https://checkout.epayco.co/epayco.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="cdn.js"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokenización</title>
</head>
<body>
    <div>
        <form action="" method="POST" id="customer-form">
            <!-- div donde se imprimiran los errores (opcional) -->
            <div class="card-errors">
                
            </div>
            <!-- datos necesarios para tokenizar -->
            <div class="form-group">
                <label> Nombre del usuario de tarjeta </label>
                <input type="text" data-epayco="card[name]">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" data-epayco="card[email]">
            </div>
            <div class="form-group">
                <label> Número de la tarjeta de crédito  </label>
                <input type="text" data-epayco="card[number]">
            </div>
            <div class="form-group">
                <label>CVC</label>
                <input type="text" size="4" data-epayco="card[cvc]">
            </div>
            <div class="form-group">
                <label>Mes de expiración(MM)</label>
                <input type="text" data-epayco="card[exp_month]">
                <span>Año de expiración(AAAA)</span>
                <input type="text" data-epayco="card[exp_year]">
            </div>
            <!-- botón con la acción para enviar el formulario -->
            <button type="submit">¡Pay!</button>
        </form>
    </div>
</body>

<script src="tokenización.js"></script>


</html>