<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agape | Transaccion</title>
    <!-- Bootstrap -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    {{--<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>--}}

</head>
<body>
<header id='main-header' style='margin-top:20px'>
    <div class='row'>
        <div class='col-lg-12 franja'>
            <img class='center-block' src='{{asset('img/ÁGAPE_logo1.png')}}' height="150">
        </div>
    </div>
</header>
<div class='container'>
    <div class='row' style='margin-top:20px'>
        <div class='col-lg-7 col-lg-offset-2 '>
            <h4 style='text-align:left'> Respuesta de la Transacción </h4>
            <hr>
        </div>
        <a id="enlace" class="btn btn-success">Continuar</a>
        <div class='col-lg-8 col-lg-offset-2' >
            <div class='table-responsive'>
                <table class='table table-bordered'>
                    <tbody>
                    <tr>
                        <td>Referencia </td>
                        <td id='referencia'> </td >
                    </tr>
                    <tr>
                        <td class='bold'> Fecha </td>
                        <td id='fecha' class=''>  </td>
                    </tr>
                    <tr>
                        <td> Respuesta </td>
                        <td id='respuesta'>  </td>
                    </tr>
                    <tr>
                        <td> Motivo </td>
                        <td id='motivo'>  </td>
                    </tr>
                    <tr>
                        <td class='bold'> Banco </td>
                        <td class='' id='banco'>
                    </tr>
                    <tr>
                        <td class='bold'> Recibo </td>
                        <td id='recibo'>  </td>
                    </tr>
                    <tr>
                        <td class='bold'> Total </td>
                        <td class='' id='total'> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class='row'>
        <div class='container'>
            <div class='col-lg-8 col-lg-offset-2'>
                <img src='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/pagos_procesados_por_epayco_260px.png' style="margin-top:10px; float:left">
                <img src='https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/credibancologo.png'height='40px' style='margin-top:10px; float:right'>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js'> </script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'> </script>
<script>
    function getQueryParam(param) {
        location.search.substr(1)
            .split('&')
            .some(function(item) { // returns first occurence and stops
                return item.split('=')[0] == param && (param = item.split('=')[1])
            })
        return param
    }
    $(document).ready(function() {
        //llave publica del comercio
        //Referencia de payco que viene por url
        var ref_payco = getQueryParam('ref_payco');
        //Url Rest Metodo get, se pasa la llave y la ref_payco como paremetro
        var urlapp = 'https://secure.epayco.co/validation/v1/reference/' + ref_payco;
        $.get(urlapp, function(response) {
            if (response.success) {

                var transaccion = 'http://agapectg.test/payment/transaccion/'+ 1 + '/' + ref_payco;

                document.getElementById("enlace").setAttribute("href",transaccion);

                if (response.data.x_cod_response == 1) {
                    //Codigo personalizado
                    alert('Transaccion Aprobada');
                    console.log('transacción aceptada');

                }
                //Transaccion Rechazada
                if (response.data.x_cod_response == 2) {
                    alert('Transaccion Rechazada');
                    console.log('transacción rechazada');
                }
                //Transaccion Pendiente
                if (response.data.x_cod_response == 3) {
                    alert('Transaccion Pendiente');
                    console.log('transacción pendiente');
                }
                //Transaccion Fallida
                if (response.data.x_cod_response == 4) {
                    alert('Transaccion Fallida');
                    console.log('transacción fallida');
                }
                $('#fecha').html(response.data.x_transaction_date);
                $('#respuesta').html(response.data.x_response);
                $('#referencia').text(response.data.x_id_invoice);
                $('#motivo').text(response.data.x_response_reason_text);
                $('#recibo').text(response.data.x_transaction_id);
                $('#banco').text(response.data.x_bank_name);
                $('#autorizacion').text(response.data.x_approval_code);
                $('#total').text(response.data.x_amount + ' ' + response.data.x_currency_code);



            } else {
                alert("Error consultando la información");
            }
        });
    });

</script>

</body>
</html>
