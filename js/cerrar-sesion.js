$(function(){
     
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
})