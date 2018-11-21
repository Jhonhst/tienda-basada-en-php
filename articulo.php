<?php


include 'cabecera.php';
include 'conexion/conexion.php';

if(isset($_GET['articulo'])){
    $articulo=$_GET['articulo'];
    $consulta="SELECT articulos.id AS ai, articulos.nombre AS an, urlimg, precio, categoria, deposito, categorias.id AS ci, categorias.nombre AS cn  FROM articulos  JOIN categorias ON categoria=categorias.id  where  articulos.nombre='$articulo'";
    $filas_datos=mysqli_query($con,$consulta);
    $reg=mysqli_fetch_assoc($filas_datos);
}
?>


<div class="container">
    <div class="row">
        <div class="col-12 col-sm-5  col-md-6">
            <img src="img/<?php echo $reg['urlimg'] ?>" class="img-fluid"  alt="">
        </div>
        <div class="col-12 col-sm-7  col-md-6"><h3>Descripción</h3>
            <p><?php echo $reg['an'] ?></p>
            <p>$ <?php echo $reg['precio'] ?></p>
            <p>Cantidad en deposito <?php echo $reg['deposito'] ?></p>
            <form id="form-carrito">
                <input type="hidden" id="id" value="<?php echo $reg['ai'] ?>">  
                <input type="hidden" id="deposito" value="<?php echo $reg['deposito'] ?>">  
                <i class="fas fa-minus-square menos-articulo menoscss" id="menos"></i>
                <input type="text" id="cantidad"  value="1" readonly>      
                <i class="fas fa-plus-square mas-articulo mascss" id="mas"></i>
                <button type="submit" class="btn btn-danger btn-block text-center mt-3">
                  Enviar al carrito
                </button>
            </form>       
        </div>
        <div class="col-12 col-md-8"><h3>los detalles</h3></div>
        <div class="col-12 col-md-4"><h3>Caracteristicas</h3></div>
    </div>
</div>

<?php 
include 'footer.php';
?>