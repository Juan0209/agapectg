<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js'> </script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'> </script>

<script>

    //Referencia de payco que viene por url
    var ref_payco = '{{$referencia}}';
    //Url Rest Metodo get, se pasa la llave y la ref_payco como paremetro
    var urlapp = 'https://secure.epayco.co/validation/v1/reference/' + ref_payco;
    $.get(urlapp, function(response) {
        var trasaccion = response.data.x_cod_response;

        var link = 'http://agapectg.test/payment/transaccion/'+trasaccion+'/1';
        function redireccion() {
            document.location.href = link;
        }

        redireccion();
    });
</script>

