$(document).ready(function() {
    $("#alertB").hide();
    $('#btn').click(function(){
        let id = $("#id").val();
        let categoria = $("#categoria").val();
        let descripcion = $("#descripcion").val();
        let cantidad = $("#cantidad").val();
        let imagen = document.getElementById("imagen");
        var filename =  $("#img").val();
        if(imagen != null)
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
            url: "controller/editarMaterial.php",
            type: "POST",
            data:
            {
                id: id,
                categoria: categoria,
                descripcion: descripcion,
                cantidad: cantidad,
                imagen: filename,
            },
            success: function(data){
                setTimeout(function(){
                    window.history.back();
                },500)
            }
        });

    });
});