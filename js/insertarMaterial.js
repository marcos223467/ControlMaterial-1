$(document).ready(function() {
    $("#alertG").hide();
    $("#alertB").hide();
    $('#btn').click(function(){
        let categoria = $("#categoria").val();
        let descripcion = $("#descripcion").val();
        let cantidad = $("#cantidad").val();
        let imagen = document.getElementById("imagen");
        let extension = imagen.files[0].name.split('.').pop();
        let filename = (Math.random()+1).toString(36).substring(2) + '.' + extension;
        const formData = new FormData();
        formData.append('img', imagen.files[0], filename);
        
        fetch('./controller/subirImg.php', {
            method: 'post',
            body: JSON.stringify({file: formData})
        });

        $.ajax({
            url:"controller/altaMaterial.php",
            type: "POST",
            data:{
                categoria: categoria,
                descripcion: descripcion,
                cantidad: cantidad,
                imagen: filename
            },
            success: function(data){ 
                setTimeout(function(){
                    console.log(data);
                    $("#alertG").show();
                    $("#categoria").val("");
                    $("#descripcion").val("");
                    $("#cantidad").val("");
                    document.getElementById("imagen").value = null;
                }, 500);
            },          
        });

    });
});