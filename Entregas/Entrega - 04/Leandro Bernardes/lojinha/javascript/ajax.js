$(document).ready(function(){
    $('#btnEnv').click(function(){
        Swal.fire({
            title: 'Gostaria de finalizar a compra?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, quero finalizar',
            cancelButtonText: 'Nao, nao quero finalizar'
          }).then((result) => {
            if (result.isConfirmed) {
                confirmado();
            }else{
                negado();
            }
          })
    });

    //chama caso seja confirmado
    function confirmado(){
        Swal.fire({
            title: 'Digite seu email: ',
            input: 'text',
            inputAttributes: {
              autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            allowOutsideClick: () => !Swal.isLoading()
          }).then((result) => {
            if (result.isConfirmed) {
                requisicaoAjax(result);
            }else{
                negado();
            }
          })
    }

    //chama caso nao seja confirmado
    function negado(){
        Swal.fire({
            icon: 'error',
            title: 'Compra Cancelada'
        })
    }

    //public function requisição ajax
    function requisicaoAjax(result){
        //var dadosEnviados = new FormData($('#formXD')[0]);
        
        $.ajax({
            method: "POST",
            url: "compra.php",
            data: {
                'email': result.value,
                'idProduto': $("#idProduto").val(),
                'idFrete': $("#idFrete").val()
            },
            beforeSend: function(){
                //$("#resultado").html("PERA, TA ENVIANDO...");
            },
            dataType: "json"
        })
        .done(function(msg){ //tudo que vem do backend vem pra essa variavel
            //window.location.href = "?page=cidades";
            //$("#resultado").html(msg);

            Swal.fire(
                'Sucesso!',
                'Compra aprovada',
                'success'
            )
            
            $('#resultado').html("<h4> Frete R$ "+msg.frete+"</h4>");
            
        })
        .fail(function(jqXHR,textStatus,msg){
            alert(msg);
        });
    }
});