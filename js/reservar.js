$(document).ready(function() {
    $("#btn").click(function() {
        let reserva = $("#reserva").val();
        let hreserva = $("#hreserva").val();
        let hdevolucion = $("#hdevolucion").val();
        let mat = $("#mat").val();
        let cant = $("#cant").val();

        $.ajax({
            url:"controller/reservar.php",
            type:"POST",
            data:{
                reserva: reserva,
                hreserva: hreserva,
                hdevolucion: hdevolucion,
                mat: mat,
                cant: cant,
            },
            success: function(data){
                setTimeout(function(){
                    console.log(data);
                    $("#reserva").val("");
                    $("#hreserva").val("");
                    $("#hdevolucion").val("");
                    $("#mat").val("");
                    $("#cant").val("");
                }, 1000);
            },
        });
    });
});