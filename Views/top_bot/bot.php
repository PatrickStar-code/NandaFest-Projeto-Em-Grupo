</body>

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<!-- flowbite-->
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

<!-- MDB -->
<!-- <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script> -->
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
    $("#cep").blur(function() {

        var cep = this.value.replace(/[^0-9]/, "");


        if (cep.length != 8) {
            return false;
        }


        var url = "https://viacep.com.br/ws/" + cep + "/json/";


        $.getJSON(url, function(dadosRetorno) {
            try {

                $("#endereco").val(dadosRetorno.logradouro);
                $("#bairro").val(dadosRetorno.bairro);
                $("#cidade").val(dadosRetorno.localidade);
                $("#uf").val(dadosRetorno.uf);
            } catch (ex) {}
        });
    });
</script>
</html>