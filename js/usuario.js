$(function(){

    Datos_usuario();
     //trae lo datos de usuario
    function Datos_usuario() {
        $.ajax({
          url: 'procesos/traer.php',
          type: 'GET',
            success: function (respuesta) { 
                // console.log(respuesta);
                let datos = JSON.parse(respuesta);  
                datos.forEach(dato => {
                    $('#num_usuario').html(dato.id);
                    $('#nombre').val(dato.nombre);
                    $('#cc').val(dato.cc);
                    $('#ciudad').val(dato.ciudad);
                    $('#email').val(dato.email);
                    $('#nom_usuario').html(dato.usuario);
                    $('#apellidos').val(dato.apellidos);
                    $('#direccion').val(dato.direccion);
                    $('#pais').val(dato.pais);
                    $('#telefono').val(dato.telefono);
                })
            } 
        })
    }

    //modifica datos del usuario
    $(document).on('click', '#guardar-cambios', function(e) {
        e.preventDefault();

        var nombre = $('#nombre').val();
        var cc = $('#cc').val();
        var ciudad = $('#ciudad').val();
        var email = $('#email').val();
        var nombre_user = $('#nom_usuario').val();
        var apellidos = $('#apellidos').val();
        var direccion = $('#direccion').val();
        var pais = $('#pais').val();
        var telefono = $('#telefono').val();

        
      if( nombre == '' || cc == '' || ciudad == '' || email == '' || apellidos == '' || direccion == '' || pais == '' || telefono == ''){
        alert('Todos los datos deben estar completos');   
      }else if(isNaN(cc)){
        alert('C.C solo acepta números')
      }else if(isNaN(telefono)){
        alert('Teléfono solo acepta números')
      } else{
        var formulario = $("#datos-usuario").serializeArray();
        // console.log(formulario);    
        $.post('procesos/modificar.php', formulario, function (respuesta) {
            alert(respuesta);
            Datos_usuario();
            e.preventDefault();
        });
      }

      
     
    })

    pedidos_pendientes();
    //datos de pedido pendientes
   function pedidos_pendientes() {
       $.ajax({
         url: 'procesos/pedidos-pendientes.php',
         type: 'GET',
           success: function (respuesta) { 
            //    console.log(respuesta);
               let datos = JSON.parse(respuesta);  
               let modulo = '';
               datos.forEach(dato => {
                    if(dato.nombre == 0){
                        modulo += `
                        <p>No Hay pedidos pendientes</p>
                        <hr>
                        `                    
                    }else{
                        modulo += `
                        <p>A nombre de: ${dato.nombre}</p>
                        <p>Dirección: ${dato.direccion} - ${dato.ciudad} - ${dato.pais} </p>
                        <p>Total: ${dato.total}</p>
                        <hr>
                        ` 
                    } 
               })
               $('#pendientes').html(modulo);
           } 
       })
   }

   pedidos_realizados();
   //datao de pedidos realizados
  function pedidos_realizados() {
      $.ajax({
        url: 'procesos/pedidos-realizados.php',
        type: 'GET',
        success: function (respuesta) { 
            // console.log(respuesta);
            let datos = JSON.parse(respuesta);  
            let modulo = '';
            datos.forEach(dato => {
                if(dato.nombre == 0){
                    modulo += `
                    <p>No Hay pedidos Realizados</p>
                    <hr>
                    `                    
                }else{
                    modulo += `
                    <p>A nombre de: ${dato.nombre}</p>
                    <p>Dirección: ${dato.direccion} - ${dato.ciudad} - ${dato.pais} </p>
                    <p>Total: ${dato.total}</p>
                    <hr>
                    ` 
                } 
            })
            $('#realizados').html(modulo);
        } 
      })
  }
});
  
  