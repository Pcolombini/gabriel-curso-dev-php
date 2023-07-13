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
                maxlength: 11,
            },

            cidade: {
                required: true,
            },

            estado: {
                required: true,
            },

            rpro: {
                required: true,
                maxlength: 255,
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
                maxlength: jQuery.validator.format("Preencha com no máximo {0} números!")
            },

            cidade: {
                required: " Campo obrigatório!",
            },
            
            estado: {
                required: " Campo obrigatório!",
            },

            rpro: {
                required: " Campo obrigatório!",
                maxlength: jQuery.validator.format("Preencha com no máximo {0} caracteres!")
            },

            presen: {
                required: " Selecione pelo menos uma opção!",
            }
        }
    }); 


})