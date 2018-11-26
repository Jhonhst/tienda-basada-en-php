
<?php
include('cabecera.php')
?>
<?php if(isset($_COOKIE['mail'])): ?>
<div class="container">
    <h3 class="mt-4 letra" style="color:green">Datos </h3>
        <form class="row form-group" id="datos-usuario">
            <div class="col-6 col-md-4"> 
                <p>N* usuario: <span id="num_usuario"></span></p><br> 
                <label for="">Nombre:</label><br> 
                <input class="form-control" id="nombre" name="nombre" type="text" value=""><br> 
                <label for="">C.C: </label><br>
                <input class="form-control" id="cc" name="cc" type="text" value=""><br> 
                <label for="">Ciudad:</label><br>
                <input class="form-control" id="ciudad" name="ciudad" type="text" value=""><br> 
                <label for="">Email:</label><br>
                <input class="form-control" id="email" name="email" type="text" value=""><br>
                <button class="btn btn-primary" id="guardar-cambios">Guardar Cambios</button>
            </div>
            <div class="col-6 col-md-4"> 
                <p>Nombre Usuario: <span id="nom_usuario"></span></p><br> 
                
                <label for="">Apellidos: </label><br> 
                <input class="form-control" id="apellidos" name="apellidos" type="text" value=""><br> 
                <label for="">Dirección: </label><br>
                <input class="form-control" id="direccion" name="direccion" type="text" value=""><br> 
                <label for="">País:</label><br>
                <input class="form-control" id="pais"  name="pais" type="text" value=""><br> 
                <label for="">Teléfono:</label><br>
                <input class="form-control" id="telefono" name="telefono" type="text" value="">          
            </div>
             
        </form>

    <h3 style="color:orange" class="letra">Mis Pedidos</h3>
    <h4 style="color:green" class="letra">Pendientes</h4>
    <div id="pendientes">

    </div>
    
    <h4 style="color:green" class="letra">Realizados</h4>
    <div id="realizados">

    </div>
</div>
<br>
<br>
<br>
<br>

<?php endif ?>


<?php if(!isset($_COOKIE['mail'])): ?>
<p class="resumen-vacio ">NO SE HA INICIADO SESIÓN</p>
<?php endif ?>


<?php
include('footer.php')
?>
 