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
    <div class="row mt-4">
        <div class="col-12 col-sm-5  col-md-6">
            <img src="img/<?php echo $reg['urlimg'] ?>" class="img-fluid"  alt="">
        </div>
        <div class="col-12 col-sm-7  col-md-6"><h3 style="color:green">Descripción</h3>
            <p> <strong> Nombre:</strong> <?php echo $reg['an'] ?></p>
            <p style="color:red;"> <strong>Precio:</strong>  $ <?php echo $reg['precio'] ?></p>
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
        <div class="col-12 col-md-8">
            <h3>DETALLE DEL PRODUCTO</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima, quia! Accusamus cumque ad ex impedit est nostrum dolor cum unde in tempora, inventore deserunt fuga quasi? Delectus ratione rem rerum?Explicabo officiis facilis quam minima minus dolorum, iste illum? Quos autem eveniet a necessitatibus esse, mollitia deserunt dignissimos eius nesciunt dolores hic commodi quibusdam error animi. Praesentium repellat mollitia aspernatur.</p>
        </div>
        <div class="col-12 col-md-4">
            <h3>CARACTERÍSTICAS</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima, quia! Accusamus cumque ad ex impedit est nostrum dolor cum unde in tempora, inventore deserunt fuga quasi? Delectus ratione rem rerum?Explicabo officiis facilis quam minima minus dolorum, iste illum? Quos autem eveniet a necessitatibus esse, mollitia deserunt dignissimos eius nesciunt dolores hic commodi quibusdam error animi. Praesentium repellat mollitia aspernatur.</p>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>