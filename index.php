<?php 

include 'cabecera.php';
include('conexion/conexion.php');

    class Traer {
    
        var $con;
        var $nombre;
        function buscar($con,$nombre)
        {
            $this->con = $con;
            $this->nombre = $nombre;
            $seleccion="SELECT articulos.id AS ai, articulos.nombre AS an, urlimg, precio, categoria, categorias.id AS ci, categorias.nombre AS cn  FROM articulos  JOIN categorias ON categoria=categorias.id  where  categorias.nombre='$this->nombre' ORDER BY articulos.id DESC LIMIT 6";
            return $sql=mysqli_query($this->con,$seleccion);
            // $asociativo=mysqli_fetch_assoc($sql);
        }
    }

$relojes = new Traer;
$reloj = $relojes->buscar($con,'relojes');

$lentes = new Traer;
$lente = $lentes->buscar($con,'lentes');

$billeteras = new Traer;
$billetera = $billeteras->buscar($con,'billeteras');

$zapatos = new Traer;
$zapato = $zapatos->buscar($con,'zapatos');

$gorras = new Traer;
$gorra = $gorras->buscar($con,'gorras');
?>

<div class="container">
    <h3 class="mt-4 letra">Relojes</h3>
    <div class="row bordee ">    
        <?php foreach($reloj as $dato): ?> 
        <div class="col-6 col-sm-4 col-md-3 col-lg-2  ">
            <a href="articulo.php?articulo=<?php echo $dato['an']?>">
                <img src="img/<?php echo $dato['urlimg'] ?>" class="img-fluid" alt="">
                <p><?php echo $dato['an'] ?></p>
            </a>
            <p class="color-precio">$ <?php echo $dato['precio'] ?></p>
        </div>
        <?php endforeach ?>
    </div>

    <h3 class="mt-4 letra">Lentes</h3>
    <div class="row bordee">       
        <?php foreach($lente as $dato): ?> 
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 ">
            <a href="articulo.php?articulo=<?php echo $dato['an']?>">
                <img src="img/<?php echo $dato['urlimg'] ?>" class="img-fluid" alt="">
                <p><?php echo $dato['an'] ?></p>
            </a>
            <p class="color-precio">$ <?php echo $dato['precio'] ?></p>          
        </div>
        <?php endforeach ?>
    </div>

    <h3 class="mt-4 letra">Billeteras</h3>
    <div class="row bordee">
        <?php foreach($billetera as $dato): ?> 
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 ">
            <a href="articulo.php?articulo=<?php echo $dato['an']?>">
                <img src="img/<?php echo $dato['urlimg'] ?>" class="img-fluid" alt="">
                <p><?php echo $dato['an'] ?></p>
            </a>
            <p class="color-precio">$ <?php echo $dato['precio'] ?></p>
        </div>
        <?php endforeach ?>
    </div>

    <h3 class="mt-4 letra">Zapatos</h3>
    <div class="row bordee">
        <?php foreach($zapato as $dato): ?> 
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 ">
            <a href="articulo.php?articulo=<?php echo $dato['an']?>">
                <img src="img/<?php echo $dato['urlimg'] ?>" class="img-fluid" alt="">
                <p><?php echo $dato['an'] ?></p>
            </a>
            <p class="color-precio">$ <?php echo $dato['precio'] ?></p>
        </div>
        <?php endforeach ?>
    </div>

    <h3 class="mt-4 letra">Gorras</h3>
    <div class="row bordee">
        <?php foreach($gorra as $dato): ?> 
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 ">
            <a href="articulo.php?articulo=<?php echo $dato['an']?>">
                <img src="img/<?php echo $dato['urlimg'] ?>" class="img-fluid" alt="">
                <p><?php echo $dato['an'] ?></p>
            </a>
            <p class="color-precio">$ <?php echo $dato['precio'] ?></p>
        </div>
        <?php endforeach ?>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>