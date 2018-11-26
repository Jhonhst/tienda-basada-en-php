$(function(){

        //paginador
        $( document ).ready(function() {
            // se genera el paginador
             paginador = $(".pagination");
	    // cantidad de items por pagina
	        var items = 30, numeros =4;	
	    // inicia el paginador
	        init_paginator(paginador,items,numeros);
	        // se envia la peticion ajax que se realizara como callback
	        set_callback(traerUsuarios);
	        cargaPagina(0);
        });
        // url para llamar la peticion por ajax
        var url_listar_usuario = "procesos-usuario/traer.php";
        //mantine los datos actualaizados
        function traerUsuarios(){
	     $.ajax({
		        data:{
		        limit: itemsPorPagina,							
                offset: desde,									
		        },
		        type:"POST",
		        url:url_listar_usuario
	        }).done(function(data,textStatus,jqXHR){		
                // obtiene la clave lista del json data
                console.log(data)
                var lista = data.lista;
		        $("#tablausuarios").html("");
		
		        // si es necesario actualiza la cantidad de paginas del paginador
		        if(pagina==0){
			        creaPaginador(data.cantidad);
		        }
	
                var modulo = '';
                $.each(lista, function(ind, elem){			
                    modulo +=`
                    <tr>
                        <th scope="row">${elem.id}</th>
                        <td>${elem.nombre}</td>
                        <td>${elem.apellidos}</td>
                        <td>${elem.cc}</td>
                        <td>${elem.telefono}</td>
                        <td>${elem.email}</td>
                        <td>${elem.pais}</td>
                        <td>${elem.ciudad}</td>
                        <td>${elem.direccion}</td>
                        <td>${elem.pedidos}</td>
                        <td>
                            <button elId="${elem.id}" class="btn btn-danger eliminar-usuario" > Eliminar </button>
                        </td>
                    </tr>           
                    `	
                });	
                $('#tablausuarios').html(modulo);

            }).fail(function(jqXHR,textStatus,textError){
		    console.log("Error al realizar la petición dame".textError);
	        });
        }

        //eliminar articulos
        $(document).on('click', '.eliminar-usuario', function() {
            if(confirm('¿Desea eliminar este usuario?')) {
                let id = $(this).attr('elId');
                $.post('procesos-usuario/eliminar.php', {id}, function (respuesta) {
                    alert(respuesta);
                    traerUsuarios();
                });
            }
         
        })
})
