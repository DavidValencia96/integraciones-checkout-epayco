<?php 

require_once 'dao.php';

// $dao = new DAO();
//     // $query = "INSERT INTO test(id, nombre) VALUES ('32', 'juan david')";
// $query = "INSERT INTO test(id, nombre) VALUES (:id, :nombre)";

// $parametros = array(":id"=>23, ":nombre"=>"juan david");

// try {
//     $resultado = $dao->ejecutarOrden($query, $parametros);
//     if($resultado >= 0){
//         echo "Data guardada: " . $resultado;
//     } else{
//         echo "Ocurrio un error." ;
//     }
// } catch (Exception $ex) {
//     echo "Error: " . $ex->getMessage();
// }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////7


$p_cust_id_cliente = '497258';
$p_key             = 'af2bf0b1e269b4d93d199688fdf94aa4232b5d9f';

$x_ref_payco      = $_REQUEST['x_ref_payco'];
$x_transaction_id = $_REQUEST['x_transaction_id'];
$x_amount         = $_REQUEST['x_amount'];
$x_currency_code  = $_REQUEST['x_currency_code'];
$x_signature      = $_REQUEST['x_signature'];


$signature = hash('sha256', $p_cust_id_cliente . '^' . $p_key . '^' . $x_ref_payco . '^' . $x_transaction_id . '^' . $x_amount . '^' . $x_currency_code);
// obtener invoice y valor en el sistema del comercio
// $numOrder = 'KZ3982477'; // Este valor es un ejemplo se debe reemplazar con el número de orden que tiene registrado en su sistema
// $valueOrder = '5000';  // Este valor es un ejemplo se debe reemplazar con el valor esperado de acuerdo al número de orden del sistema del comercio

$x_response     = $_REQUEST['x_response'];
$x_motivo       = $_REQUEST['x_response_reason_text'];
$x_id_invoice   = $_REQUEST['x_id_invoice'];
$x_cust_id_cliente = $_REQUEST['x_cust_id_cliente'];
$x_description = $_REQUEST['x_description'];
$x_approval_code = $_REQUEST['x_approval_code'];
$x_tax = $_REQUEST['x_tax'];
$x_amount_base = $_REQUEST['x_amount_base'];
$x_bank_name = $_REQUEST['x_bank_name'];
$x_cardnumber = $_REQUEST['x_cardnumber'];
$x_quotas = $_REQUEST['x_quotas'];
$x_response = $_REQUEST['x_response'];
$x_transaction_date = $_REQUEST['x_transaction_date'];
$x_cod_response = $_REQUEST['x_cod_response'];
$x_errorcode = $_REQUEST['x_errorcode'];
$x_cod_transaction_state = $_REQUEST['x_cod_transaction_state'];
$x_transaction_state = $_REQUEST['x_transaction_state'];
$x_franchise = $_REQUEST['x_franchise'];
$x_business = $_REQUEST['x_business'];
$x_customer_doctype = $_REQUEST['x_customer_doctype'];
$x_customer_document = $_REQUEST['x_customer_document'];
$x_customer_name = $_REQUEST['x_customer_name'];
$x_customer_lastname = $_REQUEST['x_customer_lastname'];
$x_customer_email = $_REQUEST['x_customer_email'];
$x_customer_phone = $_REQUEST['x_customer_phone'];
$x_customer_movil = $_REQUEST['x_customer_movil'];
$x_customer_ind_pais = $_REQUEST['x_customer_ind_pais'];
$x_customer_country = $_REQUEST['x_customer_country'];
$x_customer_city = $_REQUEST['x_customer_city'];
$x_customer_address = $_REQUEST['x_customer_address'];
$x_customer_ip = $_REQUEST['x_customer_ip'];
$x_signature = $_REQUEST['x_signature'];
$x_test_request = $_REQUEST['x_test_request'];
$x_extra1 = $_REQUEST['x_extra1'];
$x_extra2 = $_REQUEST['x_extra2'];
$x_extra3 = $_REQUEST['x_extra3'];
$x_extra4 = $_REQUEST['x_extra4'];
$x_extra5 = $_REQUEST['x_extra5'];
$x_extra6 = $_REQUEST['x_extra6'];
$x_extra7 = $_REQUEST['x_extra7'];
$x_extra8 = $_REQUEST['x_extra8'];
$x_extra9 = $_REQUEST['x_extra9'];
$x_extra10 = $_REQUEST['x_extra10'];

// echo intval($x_cust_id_cliente);
$data = array();
$data[]= array(
    'x_cust_id_cliente' => intval($x_cust_id_cliente),
    'x_ref_payco' => intval($x_ref_payco),
    'x_id_invoice' => $x_id_invoice,
    'x_description' => $x_description,
    'x_amount' => intval($x_amount),
    'x_tax' => intval($x_tax),
    'x_amount_base' => intval($x_amount_base),
    'x_currency_code' => $x_currency_code,
    'x_bank_name' => $x_bank_name,
    ':x_cardnumber'=> $x_cardnumber, 
    ':x_quotas'=> intval($x_quotas), 
    ':x_response'=> $x_response, 
    ':x_approval_code'=> $x_approval_code, 
    ':x_transaction_id'=> $x_transaction_id, 
    ':x_transaction_date'=> $x_transaction_date, 
    ':x_cod_response'=> intval($x_cod_response), 
    ':x_response_reason_text'=> $x_motivo, 
    ':x_errorcode'=> $x_errorcode, 
    ':x_cod_transaction_state'=> intval($x_cod_transaction_state), 
    ':x_transaction_state'=> $x_transaction_state, 
    ':x_franchise'=> $x_franchise, 
    ':x_business'=> $x_business, 
    ':x_customer_doctype'=> $x_customer_doctype, 
    ':x_customer_document'=>$x_customer_document, 
    ':x_customer_name'=>$x_customer_name, 
    ':x_customer_lastname'=>$x_customer_lastname, 
    ':x_customer_email'=>$x_customer_email, 
    ':x_customer_phone'=>$x_customer_phone, 
    ':x_customer_movil'=>$x_customer_movil, 
    ':x_customer_ind_pais'=>$x_customer_ind_pais, 
    ':x_customer_country'=>$x_customer_country, 
    ':x_customer_city'=>$x_customer_city, 
    ':x_customer_address'=>$x_customer_address, 
    ':x_customer_ip'=>$x_customer_ip, 
    ':x_signature'=>$x_signature, 
    ':x_test_request'=>$x_test_request, 
    ':x_extra1'=>$x_extra1,
    ':x_extra2'=>$x_extra2, 
    ':x_extra3'=>$x_extra3,
    ':x_extra4'=>$x_extra4,
    ':x_extra5'=>$x_extra5,
    ':x_extra6'=>$x_extra6,
    ':x_extra7'=>$x_extra7,
    ':x_extra8'=>$x_extra8,
    ':x_extra9'=>$x_extra9,
    ':x_extra10'=>$x_extra10,
);


$request = (json_encode($data));
// print_r($c);

// error_reporting(0); //suprimir error en pantalla

// var_dump($request);

// http://foros.cristalab.com/como-almacenar-un-array-en-mysql-t80585/
// https://qastack.mx/programming/20017409/how-to-solve-php-error-notice-array-to-string-conversion-in

// se valida que el número de orden y el valor coincidan con los valores recibidos
// if ($x_id_invoice === $numOrder && $x_amount === $valueOrder) {

//Validamos la firma
if ($x_signature == $signature) {
    $x_cod_response = $_REQUEST['x_cod_response'];
    
    switch ((int) $x_cod_response) {
    
    case 1:
        # code transacción aceptada
        echo 'transacción aceptada';
        $dao = new DAO();
        // $query = "INSERT INTO test(id, nombre) VALUES ('32', 'juan david')";
        $query = "INSERT INTO acepted(x_ref_payco, request) VALUES ($x_ref_payco, '$request')";
        

        // $parametros = array(':x_cust_id_cliente'=>$x_cust_id_cliente, 
                        //     ':x_ref_payco'=>$x_ref_payco, 
                        //     ':x_id_invoice'=>$x_id_invoice,
                        //     ':x_description'=>$x_description, 
                        //     ':x_amount'=>$x_amount, 
                        //     ':x_amount_country'=>$x_autorizacion, 
                        //     ':x_tax'=>$x_tax, 
                        //     ':x_amount_base'=>$x_amount_base, 
                        //     ':x_currency_code'=>$x_currency_code, 
                        //     ':x_bank_name'=>$x_bank_name, 
                        //     ':x_cardnumber'=>$x_cardnumber, 
                        //     ':x_quotas'=>$x_quotas, 
                        //     ':x_response'=>$x_response, 
                        //     ':x_approval_code'=>$x_approval_code, 
                        //     ':x_transaction_id'=>$x_transaction_id, 
                        //     ':x_transaction_date'=>$x_transaction_date, 
                        //     ':x_cod_response'=>$x_cod_response, 
                        //     ':x_response_reason_text'=>$x_motivo, 
                        //     ':x_errorcode'=>$x_errorcode, 
                        //     ':x_cod_transaction_state'=>$x_cod_transaction_state, 
                        //     ':x_transaction_state'=>$x_transaction_state, 
                        //     ':x_franchise'=>$x_franchise, 
                        //     ':x_business'=>$x_business, 
                        //     ':x_customer_doctype'=>$x_customer_doctype, 
                        //     ':x_customer_document'=>$x_customer_document, 
                        //     ':x_customer_name'=>$x_customer_name, 
                        //     ':x_customer_lastname'=>$x_customer_lastname, 
                        //     ':x_customer_email'=>$x_customer_email, 
                        //     ':x_customer_phone'=>$x_customer_phone, 
                        //     ':x_customer_movil'=>$x_customer_movil, 
                        //     ':x_customer_ind_pais'=>$x_customer_ind_pais, 
                        //     ':x_customer_country'=>$x_customer_country, 
                        //     ':x_customer_city'=>$x_customer_city, 
                        //     ':x_customer_address'=>$x_customer_address, 
                        //     ':x_customer_ip'=>$x_customer_ip, 
                        //     ':x_signature'=>$x_signature, 
                        //     ':x_test_request'=>$x_test_request, 
                        //     ':x_extra1'=>$x_extra1,
                        //     ':x_extra2'=>$x_extra2, 
                        //     ':x_extra3'=>$x_extra3,
                        // );

        try {
            $resultado = $dao->ejecutarOrden($query);
            if($resultado >= 0){
                echo " - Data save: " . $resultado;
            } else{
                echo " Ocurrio un error al guardar la data." ;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }

        break;
    
    case 2:
        # code transacción rechazada
        echo 'transacción rechazada';
        $dao = new DAO();
        // $query = "INSERT INTO test(id, nombre) VALUES ('32', 'juan david')";
        $query = "INSERT INTO rejected(x_ref_payco, request) VALUES ($x_ref_payco, '$request')";
        
        try {
            $resultado = $dao->ejecutarOrden($query);
            if($resultado >= 0){
                echo " - Data save: " . $resultado;
            } else{
                echo " Ocurrio un error al guardar la data." ;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        break;
    
    case 3:
        # code transacción pendiente
        $dao = new DAO();
        // $query = "INSERT INTO test(id, nombre) VALUES ('32', 'juan david')";
        $query = "INSERT INTO pending(x_ref_payco, request) VALUES ($x_ref_payco, '$request')";
        
        try {
            $resultado = $dao->ejecutarOrden($query);
            if($resultado >= 0){
                echo " - Data save: " . $resultado;
            } else{
                echo " Ocurrio un error al guardar la data." ;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        break;
    
    case 4:
        # code transacción fallida
        echo 'transacción fallida';
        $dao = new DAO();
        // $query = "INSERT INTO test(id, nombre) VALUES ('32', 'juan david')";
        $query = "INSERT INTO failed(x_ref_payco, request) VALUES ($x_ref_payco, '$request')";
        
        try {
            $resultado = $dao->ejecutarOrden($query);
            if($resultado >= 0){
                echo " - Data save: " . $resultado;
            } else{
                echo " Ocurrio un error al guardar la data." ;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        break;
    
    }
} else {
    die('Firma no valida');
}
// } else {
//     die('numero de orden o valor pagado no coinsiden');
// }