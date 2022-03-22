$(document).ready(function() {
    $("#btn").click(function() {
        let reserva = $("#reserva").val();
        let hreserva = $("#hreserva").val();
        let hdevolucion = $("#hdevolucion").val();

        let count = ($("#selects").children().length) / 2;
        var array = [];
        for (let i = 0; i < count; i++) {
            let mat1 = "#mat"+i;
            let cant1 = "#cant"+i;
            let mat = $(mat1).val();
            let cant = $(cant1).val();
            array.push({'id' : mat, 'cant' : cant});
        }
        var matycant = JSON.stringify(array);
        console.log(matycant);
        console.log(count);
        $.ajax({
            url:"controller/reservar.php",
            type:"POST",
            data:{
                reserva: reserva,
                hreserva: hreserva,
                hdevolucion: hdevolucion,
                matycant: matycant,
            },
            success: function(data){
                setTimeout(function(){
                    console.log(data);
                    $("#reserva").val("");
                    $("#hreserva").val("");
                    $("#hdevolucion").val("");
                    $("#titulo").hide();
                    while (selects.firstChild) {
                        selects.removeChild(selects.firstChild);
                    }
                }, 1000);
            },
        });
    });
});