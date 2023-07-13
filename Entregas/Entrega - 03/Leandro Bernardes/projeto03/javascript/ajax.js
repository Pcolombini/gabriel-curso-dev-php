$(document).ready(function(){
        
    //envio do formulario
    $("#btnEnv").click(function(event){
        event.preventDefault();

        if($('#construForm').valid()){
            $.ajax({
                method: "POST",
                url: "?page=sucess",
                data: {
                    userName: $("#userName").val(),
                    userPhone: $("#userPhone").val(),
                    userEmail: $("#userEmail").val(),
                    userCidade: $("#userCidade").val(),
                    userVaga: $("#userVaga").val(),
                    userResumo: $("#userResumo").val(),
                    userIngles: $("#userIngles").is(':checked'),
                    userEspanhol: $("#userEspanhol").is(':checked'),
                    userSim: $("#userSim").is(':checked'),
                    userNao: $("#userNao").is(':checked'),
                    userType: $("#userType").val(),
                    userId: $("#userId").val(),
                },
                beforeSend: function(){
                    //$("#resultado").html("PERA, TA ENVIANDO...");
                }
            })
            .done(function(msg){ //tudo que vem do backend vem pra essa variavel
                //window.location.href = "?page=cidades";
                window.location.href = "?page=list";
                //$("#resultado").html(msg);
            })
            .fail(function(jqXHR,textStatus,msg){
                alert(msg);
            });
        }
    });

});