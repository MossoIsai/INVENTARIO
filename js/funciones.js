$(document).ready(function () {
    $('#Eje').change(function(){
        $.ajax({
            url  : "listaTramos.php",
            type : "GET",
            data : "valor="+$("#Eje").val(),
            success: function(opciones){
                $("#cuerpo").html(opciones)
            }
        })
    });
});

