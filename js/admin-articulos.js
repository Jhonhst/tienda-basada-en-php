$(function(){
    traerDatos();
    function traerDatos(categoria){//este parametro es si se pide por categoría
        //paginador
        $( document ).ready(function() {
            // se genera el paginador
             paginador = $(".pagination");
	    // cantidad de items por pagina
	        var items = 2, numeros =4;	
	    // inicia el paginador
	        init_paginator(paginador,items,numeros);
	        // se envia la peticion ajax que se realizara como callback
	        set_callback(get_data_callback);
	        cargaPagina(0);
        });
        // url para llamar la peticion por ajax
        var url_listar_usuario = "procesos-admin/traer.php";
        //mantine los datos actualaizados
        function get_data_callback(){
	     $.ajax({
		        data:{
		        limit: itemsPorPagina,							
                offset: desde,
                categoria: categoria,									
		        },
		        type:"POST",
		        url:url_listar_usuario
	        }).done(function(data,textStatus,jqXHR){		
                // obtiene la clave lista del json data
                var lista = data.lista;
		        $("#cuadros").html("");
		
		        // si es necesario actualiza la cantidad de paginas del paginador
		        if(pagina==0){
			        creaPaginador(data.cantidad);
		        }
	
                var modulo = '';
                $.each(lista, function(ind, elem){			
                    modulo +=`
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" >  
                        <img src="../img/${elem.urlimg}" class="img-fluid" alt="">
                        <p>${elem.nombre}</p>
                        <button elId="${elem.id}"  class="btn btn-success     modificar-articulo">Modificar</button>
                        <button elId="${elem.id}" class="btn btn-danger eliminar-articulo"     >Eliminar</button>
                    </div>
            
                    `	
                });	
                $('#cuadros').html(modulo);

            }).fail(function(jqXHR,textStatus,textError){
		    console.log("Error al realizar la peticion dame".textError);
	        });
        }
    }

     //desplegable para agregar o modifcar
    var agregar = true;
    $('.agregar').click(function(){
        $('#guardar-articulo').removeClass('d-none');
        $('#guardar-modificacion').addClass('d-none');
        if(agregar == true){
            $('#form-articulos').slideDown(300);
            agregar = false;
        }else if(agregar == false){
            $('#form-articulos').slideUp(300);
            agregar = true
        }
    })
     //cerrar desplegable con el boton cerrar
    $('#cerrar').click(function(e){
        $('#form-articulos').slideUp(300);
        agregar = true
        e.preventDefault();
    })

    //para que al hacer scroll el deplegable se pegue en el top
    $(window).scroll(function(){
        if($(this).scrollTop() > 111){
            $('#form-articulos').css({'top':'0'});
        }else if($(this).scrollTop() < 111){
            $('#form-articulos').css({'top':'110px'});
        }
    });

      //guardar articulos
    $("#guardar-articulo").click(function(e){
        var formData = new FormData($("#form-articulos")[0]);
        var ruta = "procesos-admin/guardar.php";
        $("#guardar-articulo").html('Espere...')//el boton
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(respuesta)
            {
                alert(respuesta);
                var categoria = $('#titulo-categoria').html();
                if(categoria == 'Todos'){
                    traerDatos();
                }else{
                    traerDatos(categoria);
                }

                $('#form-articulos').slideUp(300);
                agregar = true
            }
        });
        $("#guardar-articulo").html('Guardar');//el boton
        e.preventDefault();
  
    });
 

    //eliminar articulos
    $(document).on('click', '.eliminar-articulo', function() {
        if(confirm('¿Desea eliminar este articulo?')) {
            let id = $(this).attr('elId');
            $.post('procesos-admin/eliminar.php', {id}, function (respuesta) {
                alert(respuesta);
                // traerDatos();
                var categoria = $('#titulo-categoria').html();
                if(categoria == 'Todos'){
                    traerDatos();
                }else{
                    traerDatos(categoria);
                }

            });
        }
     
    })

    //traer datos para modificar
    $(document).on('click', '.modificar-articulo', function() {
        let id = $(this).attr('elId');
        $.post('procesos-admin/modificar.php', {id}, function (respuesta) {
            let datos = JSON.parse(respuesta); 
            // console.log(datos);
            let id = ''; 
            let nombre = '';
            let descripcion = '';
            let marca = '';
            let categoria = '';
            let precio = '';
            let deposito = '';
            let urlimg = '';

            datos.forEach(dato => {
                 id = dato.id;
                 nombre = dato.nombre;
                 descripcion = dato.descripcion;
                 marca = dato.marca;
                 categoria = dato.categoria;
                 precio = dato.precio;
                 deposito = dato.deposito;
                 urlimg = dato.urlimg;
            })  
            $('#id-articulo').val(id);
            $('#nombre-articulo').val(nombre);
            $('#descripcion-articulo').val(descripcion);
            $('#marca-articulo').val(marca);
            $('#categoria-articulo').val(categoria);
            $('#precio-articulo').val(precio);
            $('#cantidad-articulo').val(deposito);

            $('#form-articulos').slideDown(300);
            agregar = false;

            $('#guardar-articulo').addClass('d-none');
            $('#guardar-modificacion').removeClass('d-none');                
        });
    })

    //modificación
    $('#guardar-modificacion').click(function(e){
        e.preventDefault();
        var formData = new FormData($("#form-articulos")[0]);
        var ruta = "procesos-admin/guardar-modificacion.php";
        $("#guardar-modificacion").html('Espere...')//el boton
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(respuesta)
            {
                alert(respuesta);
                var categoria = $('#titulo-categoria').html();
                if(categoria == 'Todos'){
                    traerDatos();
                }else{
                    traerDatos(categoria);
                }
                $('#form-articulos').slideUp(300);
                agregar = true
            }
        });
        $("#guardar-modificacion").html('Guardar modificación');//el boton
      
    })

    //trae los datos por categoría
    $(document).on('click', '.categoria', function() {
        let categoria = $(this).attr('categoria');
            // console.log(categoria);
        $.post('procesos-admin/traer.php', {categoria}, function (data) {      
            traerDatos(categoria);
            $('#titulo-categoria').html(categoria);

        });     
    })

    //recarga la página cuando se le de click a todo y salga como desde el principio
    $('#todo').click(function(){
        location.reload();
    })

});
  
  
  
  