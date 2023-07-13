$(function(){
    $('#ConoscoForm').validate({
        rules: {
            nome: {
                required: true,
                minlength: 3,
            },

            email: {
                required: true,
                email: true,
            },

            telefone: {
                required: true,
            },

            cidade: {
                required: true,
            },

            estado: {
                required: true,
            },

            rpro: {
                required: true,
            },

            presen: {
                required:true,
            }

            
        
        },

        messages:{
            nome: {
                required: " Campo obrigatório!",
                minlength:  jQuery.validator.format("Preencha com no mínimo {0} letras!")
            },

            email: {
                required: " Campo obrigatório!",
            },

            telefone: {
                required: " Campo obrigatório!",
            },

            cidade: {
                required: " Campo obrigatório!",
            },
            
            estado: {
                required: " Campo obrigatório!",
            },

            rpro: {
                required: " Campo obrigatório!",
            },

            presen: {
                required: " Selecione pelo menos uma opção!",
            }
        }
    }); 


})