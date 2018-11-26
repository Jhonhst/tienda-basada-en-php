$(function(){
 
    var url = $('#url').val();
    var tabla = $('#nombre-tabla').val();//manda el nombre de la pagina y la url que se encuenta en inputs no visibles, depende de la pagina donde se este.

    iniciar(url,tabla)
    
function iniciar(url,tabla){
    
    //paginador
    $( document ).ready(function() {
        // se genera el paginador
         paginador = $(".pagination");
    // cantidad de items por pagina
        var items = 10, numeros =4;	
    // inicia el paginador
        init_paginator(paginador,items,numeros);
        // se envia la peticion ajax que se realizara como callback
        set_callback(traerPedidos);
        cargaPagina(0);
    });
    // url para llamar la peticion por ajax

    //mantine los datos actualaizados
    function traerPedidos(){
     
     $.ajax({
            data:{
            limit: itemsPorPagina,							
            offset: desde,
            tabla: tabla,									
            },
            type:"POST",
            url:url
        }).done(function(data,textStatus,jqXHR){		
            // obtiene la clave lista del json data
         
            var lista = data.lista;
            $("#tablapedidos").html("");
    
            // si es necesario actualiza la cantidad de paginas del paginador
            if(pagina==0){
                creaPaginador(data.cantidad);
            }

            var modulo = '';
            $.each(lista, function(ind, elem){
                dia = elem.fecha.split('-').reverse().join('/');			
                modulo +=`
                <tr>
                    <th scope="row">
                        <span class="traer-individual" elId="${elem.id}">${elem.id}</span>
                    </th>
                    <td >
                        <span class="traer-individual" elId="${elem.id}">${dia}</span>
                    </td>
                    <td >
                        <span class="traer-individual" elId="${elem.id}">${elem.nombre}</span>
                    </td>
                    <td>
                        <button elId="${elem.id}" class="btn btn-danger eliminar-pedido" > Eliminar </button>
                    </td>
                </tr>           
                `	
            });	
            $('#tablapedidos').html(modulo);

        }).fail(function(jqXHR,textStatus,textError){
        console.log("Error al realizar la petición dame".textError);
        });
    }


    $(document).on('click', '.traer-individual', function() {
        let datos = {
            id: $(this).attr('elId'),
            tabla: tabla,
        }
        $.post('precesos-pedidos/traer-individual.php', datos, function (respuesta) {
            // console.log(respuesta);
            let datos = JSON.parse(respuesta);
            let modulo = ''; 
            datos.forEach(dato => {
                retornarId(dato.idpe);

                modulo +=`
                <div class="col-6">
                    <p>N* pedido: <strong>${dato.idpe}</strong></p>
                    <p>N* usuario: <strong>${dato.idus}</strong></p>
                    <p>A nombre de: <strong>${dato.nombrepe}</strong></p>   
                    <p>C.C: <strong>${dato.ccpe}</strong></p>
                    <p>Ciudad: <strong>${dato.ciudadpe}</strong></p>
                    <p>Email: <strong>${dato.emailpe}</strong></p>
                    <p>Método de envío: <strong>${dato.enviope}</strong></p>
                </div>
                <div class="col-6">
                    <p>Fecha: <strong>${dato.fechape}</strong></p>
                    <p>Nombre Usuario: <strong>${dato.nombreus}</strong></p>
                    <p>Apellidos: <strong>${dato.apellidope}</strong></p>    
                    <p>Dirección: <strong>${dato.direccionpe}</strong></p>
                    <p>País: <strong>${dato.paispe}</strong></p>
                    <p>Teléfono: <strong>${dato.telefonope}</strong></p>           
                    <p>Método de pago: <strong>${dato.pagope}</strong></p>
                </div>
                <div class="col-12">
                    <p>Resumen: <strong>¡..........!</strong></p>
                    <p>Subtotal: <strong>${dato.subtotalpe}</strong></p>
                    <p>Precio de envío: <strong>${dato.precioenviope}</strong></p>
                    <p>Gran Total: <strong>${dato.totalpe}</strong></p>
                </div>
                `
            })
            $('#pedido').html(modulo);
            $('.boton-enviar').slideDown(300);
        });
    })


    // eliminar pedidos
    $(document).on('click', '.eliminar-pedido', function() {
        if(confirm('¿Desea eliminar este pedido?')) {
            let datos = {
                id: $(this).attr('elId'),
                tabla: tabla,
            }
            $.post('precesos-pedidos/eliminar.php', datos , function (respuesta) {
                alert(respuesta);
                traerPedidos();
            });
        }
     
    })

    function retornarId(id){//recibe el id desde traer individual  
        // enviar pedido pendiente a pedido realizado
        $(document).on('click', '#pedido-cancelado', function() {
            if(confirm('¿Este pedido ya se ha cancelado? Será enviado a pedidos realizados')) {
                // let id = $(this).attr('elId');
                $.post('precesos-pedidos/pedido-cancelado.php', {id}, function (respuesta) {
                      alert(respuesta);
                    traerPedidos();
                });
            }        
        })
        
    }

        $('#posicion-pedido').scroll(function(){//scroll es el metodo
            if($(this).scrollTop() > -100){//de esta forma le digo que si al hacer scroll supero los 100px con respcto al top entonces haga lo que sigue 
                console.log('hola scroll');
            }else{
                console.log('no scroll')
            }
        });

   
}
})
