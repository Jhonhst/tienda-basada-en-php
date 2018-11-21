<?php 
include('conexion/conexion.php');
include('cabecera.php');
?>
<div id="informacion-pedido" class="container"> 
    <div  class="row mt-5">
        <div class="col-8">
            <div class="row" id="factura">

            </div>
        </div>
        <div class="col-4"><h5 class="text-center">Hasta ahora llevamos</h5>
        <p>total Articulos diferesntes <span class="numero-del-carrito"> </span></p> <hr>
        <p>total Articulos <span class="toda-cantidad"> </span></p><hr>
        <p>Subtotal $ <span class="total-cancelar"> </span></p> <hr>
        <p>Envio $ <span class="envio">  600</span></p> <hr>
        <p>total $ <span class="total-cancelar-final"> </span></p> 
        <?php if(!isset($_COOKIE['mail'])): ?>
        <a id="procesar-compra" class="btn btn-danger">Procesar compra</a>
        <?php endif ?>
        <?php if(isset($_COOKIE['mail']) && (isset($_SESSION["producto"]) && count($_SESSION["producto"])>0)): ?>
        <a href="resumen.php" class="btn btn-danger">Procesar compra</a>
        <?php endif ?>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>