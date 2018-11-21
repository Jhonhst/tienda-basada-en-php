$(function(){

  mostrar_carrito();//mantengo el carrito actualizado sin la necesidad de recargar

 console.log('funcionando jQuery')

  // inicio del boton para mostrar la tabla del pedido
  let boton = true;
  
  $('#boton-carrito').click(function(){
    
    if(boton == true){
      $('#tabla').slideDown(300);
      boton = false;
      
    }else if(boton == false){
      $('#tabla').slideUp(300);
      boton = true;
    }
  });
   // fin del boton para mostrar la tabla del pedido

  //inicio de la función que enviara los datos del articulo el cual se vera en el carrito
  $('#form-carrito').submit(function(e){
    var button_content = $(this).find('button[type=submit]');
    button_content.html('Cargando...'); //mensaje del boton mistras carga

    const postData = {
      id: $('#id').val(),
      cantidad: $('#cantidad').val() 
    }
    
    const url = 'carrito/guardar-carrito.php';
    // console.log(postData, url);

    $.post(url, postData,function(response){  
      button_content.html('Ya se ha agregado al carrito'); //mensaje del boton una ves cargado y agregado
      mostrar_carrito();
      alert(response);
    });
    e.preventDefault();
  });
    //fin de la función que enviara los datos del articulo el cual se vera en el carrito

    // inicio de precio de los envios
  var envio = $('.envio').html();
  envio = parseInt(envio);
  $('#precioenvio').val(envio);//precio del envio,  para enviar a pedidos, se encuentra en resumen.php
    // fin de precio de los envios

    // inicio de la función que mostrara los articulos en el carrito y los mantendra actualizaado sin recargar
  function mostrar_carrito() {
    $.ajax({
      url: 'carrito/mostrar-carrito.php',
      type: 'GET',
      success: function (response) { 
        let datos = JSON.parse(response);
        let modulo = '<p class="text-center mt-5"> Cargando...</p>';//es para mostrar mientras carga el carrito si este se tarda.
        sub_total = 0;
        let total_articulos = 0;
        let modulo_dos = '';
        let total_articulos_dos = 0;
        let toda_cantidad = 0; 
        let resumen = '';  
        datos.forEach(dato => {
          let id = dato.id;
          let cantidad = dato.cantidad
          cantidad = parseInt(cantidad);
          toda_cantidad += cantidad;
          let nombre = dato.nombre;
          let precio = dato.precio;  
          let urlimg = dato.urlimg;     
          var depositos = dato.deposito;    
          let total = precio * cantidad;
          sub_total += total;
           
          if(id == 0){   
            modulo += `
              <tr >
                <td class="text-center" colspan="4">
                  Aún no se ha añadido algún producto al carrito!
                </td>
              </tr>
            ` 
          }else { 
            total_articulos += 1;  
            modulo += `
              <tr elId="${id}">
                <td class="text-center" >
                  <i class="fas fa-minus-square menos menoscss"></i>
                  <input type="text" class="col-8" elId="${id}" deposito="${depositos}" id="numero${id}" value="${cantidad}" 
                  readonly>
                  <i class="fas fa-plus-square mas mascss"></i>
                  <p id="${id}">${depositos}</p>
                </td>
                <td> ${nombre} </td>
                <td> ${precio} </td>
                <td> ${total} </td>
                <td> 
                  <button elId="${id}" class="eliminar-del-carrito btn btn-danger">Eliminar</button>
                </td>
              </tr>
            ` 
          }

          if(id == 0){   
            modulo_dos += `
              <tr >
                <td class="text-center" colspan="4">
                  Aún no se ha añadido algún producto al carrito!
                </td>
              </tr>
            ` 
          }else { 
            total_articulos_dos += 1;  
            modulo_dos += `
            <div class="col-12">
              <p>${nombre}</p>
            </div>
            <div class="col-3 ">
              <img src="img/${urlimg}" class="img-fluid" alt="">
            </div>
            <div elId="${id}" class="col-3">
              <i class="fas fa-minus-square menos menoscss"></i>
              <input type="text" class="col-8" elId="${id}" deposito="${depositos}" id="numero${id}" value="${cantidad}" readonly>
              <i class="fas fa-plus-square mas mascss"></i>
              <p id="${id}">${depositos}</p>
            </div>
            <div class="col-3" >
              <p>Precio</p> <p>$ ${precio}</p>
            </div>
            <div class="col-3">
              <p>$ sub total <br>$ ${total}</p>
            </div>
            <div class="col-2"> 
              <button elId="${id}" class="eliminar-del-carrito btn btn-danger"> Eliminar </button>
            </div>
            ` 
          }   
          
          if(id == 0){   
            resumen += `
              <tr >
                <td class="text-center" colspan="4">
                  Aún no se ha añadido algún producto al carrito!
                </td>
              </tr>
            ` 
          }else { 
            resumen += `
            <div class="col-3">
              <p>${nombre}</p>
            </div>
            <div  class="col-3">
              <p>${cantidad}</p>
            </div>
            <div class="col-3" >
              <p>Precio</p> <p>$ ${precio}</p>
            </div>
            <div class="col-3">
              <p>$ sub total <br>$ ${total}</p>
            </div>
            ` 
          }
        });
        $('#datos-carrito').html(modulo);//el desplegable
        $('.total-cancelar').html(sub_total);//sub total
        $('#subtotal').val(sub_total);//sub total, para enviar a pedidos
        $('.numero-del-carrito').html(total_articulos); 
        $('#factura').html(modulo_dos); //el carrito como tal
        var total_cancelar = envio + sub_total; //sumar el precio del envío
        $('.total-cancelar-final').html(total_cancelar);//sub total mas envío
        $('#total').val(total_cancelar);//sub total mas envío,  para enviar a pedidos
        $('.toda-cantidad').html(toda_cantidad);//sub total mas envío,  para enviar a pedidos
        $('#resumen').html(resumen);//sub total mas envío,  para enviar a pedidos

      }
    })
    finalizarCompra();//para que salga el boton de finalizar pedido solo cuando hay articulos en el carrito
  } 
  // fin de la función que mostrara los articulos en el carrito y los mantendra actualizado sin recargar
 
    //inicio de la función para eliminar la cookie del usuario
  $('#cerrar-sesion').click(function(){     
    if(window.confirm("desea salir del sitio "))
    {
      const postData = {
        borrar: $('#borrar').val()
      };
        
      const url = 'procesos/cookie.php';
    // console.log(postData, url);
    
      $.post(url, postData,function(response){
        // console.log(response)  
        window.location="index.php";
      });
    }
     else
    {
      alert("No hay problema");
    }
  });
    //fin de la función para eliminar la cookie del usuario
    
    // inicio de la función para eliminar articulos del carrito
  $(document).on('click', '.eliminar-del-carrito', function() {
    if(confirm('¿Desea eliminar del carrito este articulo?')) {
      let id = $(this).attr('elId');
      $.post('carrito/eliminar-carrito.php', {id}, function (response) {
        alert(response);
        mostrar_carrito();
      });
    } 
  })
    // fin de la función para eliminar articulos del carrito 


    //inicio de la clase encargada de sumar y restar los articulos del carrito de compras
  class SumaResta {
    constructor(elemento) {
     
      this.elemento = elemento;
      this.pre_id = $(this.elemento).attr('id'); 
      this.id = $(this.elemento).attr('elId');
      this.valor = $('#'+this.pre_id).val();
      this.valor = parseInt(this.valor);
      this.deposito = $(this.elemento).attr('deposito');
      this.deposito = parseInt(this.deposito);
    }

    suma(){
      this.suma = this.valor + 1;
      this.suma = parseInt(this.suma);
      // console.log(suma);          
      if(this.suma > this.deposito){
        this.suma = this.deposito;
        alert('no te pases wuey ya no hay mas');
      }
      this.postData = {
        id: this.id,
        cantidad: this.suma 
      };

      this.enviar(this.postData);
    }

    resta(){
      this.resta = this.valor - 1;
      this.resta = parseInt(this.resta);
      // console.log(suma);          
      if(this.resta < 1){
        this.resta = 1;
        alert('eso es lo minimo');
      }
      this.postData = {
        id: this.id,
        cantidad: this.resta 
      };

      this.enviar(this.postData);
    }

    enviar(postData){
      $.post('carrito/modificar-carrito.php', postData , function(response) {
        // console.log(response);
        mostrar_carrito();
      });
    }  
  }
  //fin de la clase encargada de sumar y restar los articulos del carrito de compras

  // función que resta articulos del carrito usando objeto
  $(document).on('click', '.menos', function(e) {

    let elemento = $('.menos').siblings()[0];
    // console.log(elemento);
    let restar = new SumaResta(elemento);
    restar.resta();
    e.preventDefault(); 
  });
    
    // función que suma articulos del carrito usando objeto
  $(document).on('click', '.mas', function(e) {
    
    let elemento = $('.mas').siblings()[1];
    var sumar = new SumaResta(elemento);
    sumar.suma(); 
    e.preventDefault();     
  });

  
    // inicio de la función encargada de sumar los articulos en la parte de articulo.php 
  $(document).on('click', '.mas-articulo', function(e) {
   
    let depositos = $('#deposito').val();
    depositos = parseInt(depositos);
   
    let valor = $('#cantidad').val();
    valor = parseInt(valor);
       
    let suma = valor + 1; 
    valor = suma; 
    $('#cantidad').val(valor); 

    if(suma > depositos){
      $('#cantidad').val(depositos); 
      alert('no te pases wuey ya no hay mas');
    }
  });
    // fin de la función encargada de sumar los articulos en la parte de articulo.php 
  
    // inicio de la función encargada de restarlos articulos en la parte de articulo.php 
  $(document).on('click', '.menos-articulo', function(e) {
   
    let valor = $('#cantidad').val();
    valor = parseInt(valor);
       
    let menos = valor - 1; 
    valor = menos; 
    $('#cantidad').val(valor); 

    if(menos < 1){
      $('#cantidad').val(1); 
      alert('no se permite menos cantidad');
    }
  });
    // fin de la función encargada de restar los articulos en la parte de articulo.php 


    //inicio alert para el carrito vacío
  $('#carrito-vacio').click(function(){
     alert('Se debe iniciar sesión para acceder al carrito');
  })
    //fin alert para el carrito vacío

    var deposito = $('#deposito').val();
  //inicio  función encargada de que no baje de 1 la cantidad y no se sobrepase de la cantidad que hay en deposito
  var cantidad = $('.cantidad-llevar').val();
    
  $('#menos').click(function(){
    cantidad = parseInt(cantidad)
    cantidad -= 1;
    if(cantidad < 1){
      cantidad = 1;
      $('.cantidad-llevar').val(cantidad);
    }
    $('.cantidad-llevar').val(cantidad);
  })

  $('#mas').click(function(){
    cantidad = parseInt(cantidad)
    cantidad += 1;
    if(cantidad > deposito){
      cantidad = deposito;
      $('.cantidad-llevar').val(cantidad);
      alert('no te pases wuey ya no hay mas');
    }
    $('.cantidad-llevar').val(cantidad);
    // console.log(cantidad);
  })
  //inicio  función encargada de que no baje de 1 la cantidad y no se sobrepase de la cantidad que hay en deposito







  //inicio de  guardar los datos del pedido
  // $("#enviar-pedido").click(function(e){
 
  //   var formulario = $("#pedido").serializeArray();
  //   $.ajax({
  //     type: "POST",
  //     dataType: 'json',
  //       url: "pedidos/guardar-pedido.php",
  //       data: formulario,
  //   }).done(function(respuesta){
  //     console.log(respuesta)
  //     alert('respuesta.mensaje');
  //     mensajeCuenta(respuesta);
  //   });
  //   e.preventDefault();
  // });
    $("#enviar-pedido").click(function(e){
 
    var formulario = $("#pedido").serializeArray();
    $.post('pedidos/guardar-pedido.php', formulario, function (respuesta) {
      alert('Se guardo correctamente');
      mensajeCuenta(respuesta);
    });
    e.preventDefault();
  });
   //fin de  guardar los datos del pedido

  //inicio  función encargada de mostrar el contenido de la forma de pago que el cliente eligio
  function mensajeCuenta(cuenta){
    $('#informacion-pedido').addClass('d-none');
    $('#mensaje-cuenta').removeClass('d-none');
    // console.log(cuenta);
    switch (cuenta) {
      case 'Transferencia Electronica Davivienda':
        $('#davivienda').removeClass('d-none');
        break;
      case 'Transferencia Electronica Bancolombia':
        $('#bancolombia').removeClass('d-none');
        break;
      case 'Giro Por Efecty Servientrega':
        $('#efecty').removeClass('d-none');
        break;
      case 'Transferencia Banco De Bogotá':
        $('#bogota').removeClass('d-none');
        break;
      default:
      console.log('Se ha encontrado un error');
    }
    eliminarCarrito();
  }
    //fin  función encargada de mostrar el contenido de la forma de pago que el cliente eligio

    //inicio de función encargada de borrar los datos guardados en el carrito
  function eliminarCarrito(){
    $.post('procesos/eliminar-carrito.php', '' , function(response) {
      console.log(response);
      mostrar_carrito();    
    });
  }
  //fin de función encargada de borrar los datos guardados en el carrito

    // inicio de la función encargada de decirle al usuario que se debe logear para procesar la compra
    $('#procesar-compra').click(function(){
      alert('se debe iniciar sesión para procesar la compra');
      window.location="ingresar.php";
    });
    // fin de la función encargada de decirle al usuario que se debe logear para procesar la compra

    //inicio de iniciar sesión y que sea reenviado a la ultima pagina visitada y que esta ya este acualizada con las cookies para que se vean el nombre del usuario
    $(document).on('click', '#ingresar-sesion', function(e) {

      var formulario = $("#form-ingresar").serializeArray();
  
      const postData = formulario;
      // console.log(postData);
      $.post('procesos/iniciar-sesion.php', postData , function(response) {
        // alert(response);
        retroceder();
        
      });
      e.preventDefault(); 
      
    });
    
    function retroceder(){
      window.history.back(1);
    }
    
     //fin de iniciar sesión y que sea reenviado a la ultima pagina visitada y que esta ya este acualizada con las cookies para que se vean el nombre del usuario
   
  
     // inicio de la función  funcion encargada mostrar el boton de finalizar pedido solo cuando hay articulos en el carrito
  function finalizarCompra(){
    $.post('carrito/boton-actualizado.php', '',function(response){   
        $('#boton-finalizar-compra').html(response);
    })
  }
  // inicio de la función  funcion encargada mostrar el boton de finalizar pedido solo cuando hay articulos en el carrito
    
  // boton para retroceder en caso de que se quiera modificar el resumen del pedido
  $('#retroceder-moficar').click(function(){
    retroceder();
  })
});

