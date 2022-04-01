$(document).ready(function() {
    $("#alertG").hide();
    $("#alertB").hide();
    $('#btn').click(function(){
        let nombre = $("#nombre").val();
        let apellidos = $("#apellidos").val();
        let email = $("#email").val();
        let pssw = $("#pssw").val();
        let rol = $("#rol").val();
        let imagen = document.getElementById("imagen");
        var filename = "default_user.png";
        if(imagen.files[0] != null)
        {
            let extension = imagen.files[0].name.split('.').pop();
            filename = (Math.random()+1).toString(36).substring(2) + '.' + extension;
            const formData = new FormData();
            formData.append('img', imagen.files[0], filename);

        
            fetch('controller/subirImg.php', {
                method: 'post',
                headers: {
                    'Accept' : 'application/json'
                },
                body: formData
            }).then(respuesta => respuesta.text()).then(decodificado =>{
                console.log(decodificado);
            });
        }

        $.ajax({
            url:"controller/altaUser.php",
            type: "POST",
            data:{
                nombre: nombre,
                apellidos: apellidos,
                email: email,
                pssw: pssw,
                rol: rol,
                imagen: filename
            },
            success: function(data){ 
                setTimeout(function(){
                    $("#alertG").show();
                    $("#nombre").val("");
                    $("#apellidos").val("");
                    $("#email").val("");
                    $("#pssw").val("");
                    $("#rol").val("");
                    $("imagen").val("");
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
                    $("imagen").val("");
                }, 500);
            }        
        });

    });

});