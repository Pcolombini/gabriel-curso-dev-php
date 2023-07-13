$(function(){
    $('#construForm').validate({
        rules: {
            userName: {
                required: true,
                minlength: 3
            },
            userEmail: {
                required: true,
                email: true
            },
            userPhone: {
                required: true
            },
            userEndereco: {
                required: true
            },
            userEstado: {
                required: true
            },
            userResumo: {
                required: true,
                maxlength: 300
            },
            userSim: {
                required: true
            },
            userNao: {
                required: true
            }
        }
    });
});