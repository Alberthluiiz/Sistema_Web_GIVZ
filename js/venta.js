$(function(){
    $('#btnbuscarproducto').click(function(){
        $.post('./php/venta_ajax.php', {codigo: $('#codigoproducto').val()}, function(data)
        {
            if(data.mensaje!=''){
                $('#mensaje').html(data.mensaje);
            }else{
                $('#nombreproducto').val(data.datos.tproducto_nombre);
                $('#precioproducto').val(data.datos.tproducto_precio);
                $('#idproducto').val(data.datos.tproducto_id);
                $('#cantidadproducto').val(1);
            }
        },'json');
    });

    $('#btnagregar').click(function(){
        if($('#idproducto').val()!=''){
            var subtotal = $('#precioproducto').val()*$('#cantidadproducto').val();
            $('#tablaventa').append('<tr id="prd'+$('#idproducto').val()+'"><td>'+
            '<input type="hidden" name="idproducto[]" value="'+$('#idproducto').val()+'">'+
            '<input type="hidden" name="cantidad[]" value="'+$('#cantidadproducto').val()+'">'+
            '<input type="hidden" name="precio[]" value="'+$('#precioproducto').val()+'">'+
            '<button title="Eliminar" class="btneliminar" idprd="'+$('#idproducto').val()+'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/></svg></button></td><td>'+$('#nombreproducto').val()+'</td><td>'+$('#cantidadproducto').val()+'</td><td>'+$('#precioproducto').val()+'</td><td>'+subtotal+'</td></tr>');
            limpiarventa();
        }else{
            alert('Por favor busque un producto por el código');
        }
    });

    $(document).on('click', '.btneliminar', function () {
        if(confirm('Desea eliminar el item seleccionado?')){
            $('#prd'+$(this).attr('idprd')).remove();
        }
    });

    $('#registrarcompra').click(function(){
        $.post('./php/venta_ajax.php',  $('#formventas').serialize(), function(data)
        {
            //console.log(data)
            $('#mensaje').html(data.mensaje);
            limpiartodo();
        },'json');
    });

});

function limpiarventa(){
    $('#nombreproducto').val('');
    $('#precioproducto').val('');
    $('#idproducto').val('');
    $('#codigoproducto').val('');
}

function limpiartodo(){
    $('#givz_tcliente').val('');
    $('#tablaventa').html('');
}