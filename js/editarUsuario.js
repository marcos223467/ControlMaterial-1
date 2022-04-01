$(document).ready(function() {
    $("#btn2").hide();
    $('#lbl').click(function()
    {
        $("#btn2").show();
    });
    
    $('#btn2').click(function(){
        let id = $("#id").val();
        let nombre = $("#nombre").val();
        let apellidos = $("#apellidos").val();
        let email = $("#email").val();
        let rol = $("#rol").val();
        let imagen = document.getElementById("imagen");
        var filename = $("#img").val();

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
            url:"controller/editarUser.php",
            type: "POST",
            data:{
                id: id,
                nombre: nombre,
                apellidos: apellidos,
                email: email,
                rol: rol,
                imagen: filename
            },
            success: function(data){ 
                setTimeout(function(){
                    window.location.reload();
                }, 500);
            }       
        });

    });

    $('#btn').click(function(){
        let id = $("#id").val();
        let nombre = $("#nombre").val();
        let apellidos = $("#apellidos").val();
        let email = $("#email").val();
        let rol = $("#rol").val();
        let imagen = document.getElementById("imagen");
        var filename = $("#img").val();

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
            url:"controller/editarUser.php",
            type: "POST",
            data:{
                id: id,
                nombre: nombre,
                apellidos: apellidos,
                email: email,
                rol: rol,
                imagen: filename
            },
            success: function(data){ 
                setTimeout(function(){
                    window.location.reload();
                }, 500);
            }       
        });

    });
});