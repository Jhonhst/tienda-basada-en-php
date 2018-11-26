<?php 
include('conexion/conexion.php');
include('cabecera.php');
?>
<div id="informacion-pedido" class="container"> 
    <div  class="row mt-5">
        <div class="col-12 col-md-8" id="factura">
           
        </div>
        
        <div class="col-12 col-md-4"><h5 class="text-center" style="color:orange">Hasta ahora llevamos:</h5>
        <p><strong>total Artículos diferentes:</strong>  <span class="numero-del-carrito"> </span></p> <hr>
        <p><strong>total Artículos:</strong> <span class="toda-cantidad"> </span></p><hr>
        <p><strong>Subtotal:</strong> $ <span class="total-cancelar"> </span></p> <hr>
        <p><strong>Envio:</strong> $ <span class="envio">  600</span></p> <hr>
        <p><strong>total:</strong> $ <span class="total-cancelar-final"> </span></p> 
        <?php if(!isset($_COOKIE['mail'])): ?>
        <a id="procesar-compra" class="btn btn-danger">Procesar compra</a>
        <?php endif ?>
        <?php if(isset($_COOKIE['mail']) && (isset($_SESSION["producto"]) && count($_SESSION["producto"])>0)): ?>
        <a href="resumen.php" class="btn btn-danger">Procesar compra</a>
       
        <?php endif ?>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>