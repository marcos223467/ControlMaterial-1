$(document).ready(function() {
    $("#alertB").hide();
    $('#btn').click(function(){
        let id = $("#id").val();
        let nombre = $("#nombre").val();
        let apellidos = $("#apellidos").val();
        let email = $("#email").val();
        let rol = $("#rol").val();
        $.ajax({
            url:"controller/editarUser.php",
            type: "POST",
            data:{
                id: id,
                nombre: nombre,
                apellidos: apellidos,
                email: email,
                rol: rol
            },
            success: function(data){ 
                setTimeout(function(){
                    window.history.back();
                }, 500);
            },
            error: function()
            {
                setTimeout(function(){
                    $("#alertB").show();
                }, 500);
            }        
        });

    });

});