function verRed(id, nombre, apellido, nivel){
    $.ajax({
        url: './controller/red.php',
        type: 'POST',
        data: {
            id: id,
            nombre: nombre,
            apellido: apellido,
            nivel: nivel
        },
        success: function(response){
            $("#miRed").html(response);
        }
    });
}