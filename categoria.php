<?php 

include 'cabecera.php';
include('conexion/conexion.php');
require_once("procesos/zebra.php");


  $nombrecategoria=$_GET['categoria'];
  $seleccion="SELECT articulos.id AS ai, articulos.nombre AS an, urlimg, precio, categoria, categorias.id AS ci, categorias.nombre AS cn  FROM articulos  JOIN categorias ON categoria=categorias.id  where  categorias.nombre='$nombrecategoria' ORDER BY articulos.id DESC";
  $sql=mysqli_query($con,$seleccion);
  $asociativo=mysqli_fetch_assoc($sql);
  $numero_de_articulos=$asociativo['ci'];
  //echo $numerodecategoria;

  //contar articulos de nuestra base de datos
  $contar_art="SELECT COUNT(*) as cuenta FROM articulos WHERE categoria='$numero_de_articulos'";
  $contar=mysqli_query($con,$contar_art);
  $resultado=mysqli_fetch_assoc($contar);

  $total_articulos_db = (string) $resultado['cuenta'];
  //echo $total_articulos_db;
  $resul_x_pagina = 1;

  $paginacion = new Zebra_Pagination();
  $paginacion->records($total_articulos_db );
  $paginacion->records_per_page($resul_x_pagina);

  $consulta="SELECT articulos.id AS ai, articulos.nombre AS an, urlimg, precio, categoria, categorias.id AS ci, categorias.nombre AS cn  FROM articulos  JOIN categorias ON categoria=categorias.id  where  categorias.nombre='$nombrecategoria' ORDER BY ai DESC limit ".(($paginacion->get_page() - 1) * $resul_x_pagina). "," .$resul_x_pagina;

  $listado=mysqli_query($con,$consulta);

?>


<div class="container">
    <div class="row">
        <?php foreach($listado as $dato): ?> 
        <div class="col-6 col-sm-4 col-md-3 col-lg-2"> 
            <a href="articulo.php?articulo=<?php echo $dato['an']?>">
                <img src="img/<?php echo $dato['urlimg'] ?>" class="img-fluid" alt="">
                <p><?php echo $dato['an'] ?></p>
            </a>
        </div>
        <?php endforeach ?>
    </div>
</div>

    <!--inicio de botones -->
      <nav aria-label="page navigation example">
        <ul class="pagination justify-content-center mt-4">
            <li class="page-item" > <?php $paginacion->render(); ?></li> 
        </ul>
    </nav>
      <!-- fin de botones -->
 

<?php 
include 'footer.php';
?>