$(function(){

        //inicio de iniciar sesión y que sea reenviado a la ultima pagina visitada y que esta ya este acualizada con las cookies para que se vean el nombre del usuario
    $(document).on('click', '#ingresar-sesion', function(e) {
        var usuario = $('#correo').val();
        var clave = $('#contrasenia').val();
        if(usuario == '' || clave == ''){
            alert('Todos los campos deben ser completados');
            e.preventDefault(); 
        }else{
            var formulario = $("#form-ingresar").serializeArray();      
            const postData = formulario;
            // console.log(postData);
            $.post('procesos/iniciar-sesion.php', postData , function(response) {
            //   console.log(response);
                if(response == 1){
                    retroceder();
                }else{
                    alert('Usuario o contraseña incorrectos');
                } 
            });
            e.preventDefault(); 
        }

        
            
    });
     //retrocede a la pagina donde se encontraba el usuario
    function retroceder(){
        window.history.back(1);
    }


})