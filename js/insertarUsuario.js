$(document).ready(function() {
    //$("#loading").hide();
    $("#alertG").hide();
    $("#alertB").hide();
    $('#btn').click(function(){
        //$("#loading").show();
        let nombre = $("#nombre").val();
        let apellidos = $("#apellidos").val();
        let email = $("#email").val();
        let pssw = $("#pssw").val();
        let rol = $("#rol").val();

        $.ajax({
            url:"controller/altaUser.php",
            type: "POST",
            data:{
                nombre: nombre,
                apellidos: apellidos,
                email: email,
                pssw: pssw,
                rol: rol
            },
            success: function(data){ 
                setTimeout(function(){
                    $("#alertG").show();
                    $("#nombre").val("");
                    $("#apellidos").val("");
                    $("#email").val("");
                    $("#pssw").val("");
                    $("#rol").val("");
                }, 500);
            },
            error: function()
            {
                setTimeout(function(){
                    $("#alertB").show();
                    $("#nombre").val("");
                    $("#apellidos").val("");
                    $("#email").val("");
                    $("#pssw").val("");
                    $("#rol").val("");
                }, 500);
            }        
        });

    });

});