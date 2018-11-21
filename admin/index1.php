<?php
    include('cabecera.php');
?>
<!-- desplegable agregar o modificar -->
<div class="container">
    <button class="btn btn-primary mt-3 mb-2 agregar">Agregar nuevo articulos</button>
    <!-- <div class="row"> -->
        <form id="form-articulos"  enctype="multipart/form-data"> 
            <div class="form-group col-12 ">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre-articulo"  placeholder="">
     
                <label for="descripcion">descripción</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion-articulo" placeholder="">

                <label for="marca">Marca</label>
                <input type="text" name="marca" class="form-control" id="marca-articulo" placeholder="">

                <label for="categoria">Categoría</label>
                <select class="form-control" name="categoria" id="categoria-articulo">
                    <option >Categorías</option>
                    <option value="1">Reloj</option>
                    <option value="2">Billetera</option>
                    <option value="3">Gorras</option>
                    <option value="4">Zapatos</option>
                    <option value="5">Lentes</option>
                </select>

                <label for="precio" class="mt-1">Precio</label>
                <input type="text" name="precio" class="form-control" id="precio-articulo" placeholder="">

                <label for="cantidad">Cantidad</label>
                <input type="text" name="cantidad" class="form-control" id="cantidad-articulo" placeholder="">

                <input type="hidden" name="id" id="id-articulo" >

                <label for="file">Imagen formatos (jpg - jpg - png - gif)</label>
                <input type="file" name="file" id="nombre-urlimg" class="form-control">

                <button class="btn btn-danger mt-3" id="guardar-articulo">Guardar</button>
                <button class="btn btn-success mt-3" id="guardar-modificacion">Guardar modificación</button>
                <button class="btn btn-danger mt-3" id="cerrar">Cerrar</button>
               
            </div>
        </form>
    <!-- </div> -->
</div>

<!-- articulos -->
<div class="container">
    <div class=""> 
        <p class="text-center">
            <span id="todo">Todos</span>
            <span class="categoria" categoria="Relojes">Relojes</span>
            <span class="categoria" categoria="Billeteras">Billeteras</span>
            <span class="categoria" categoria="Gorras">Gorras</span>
            <span class="categoria" categoria="Zapatos">Zapatos</span>
            <span class="categoria" categoria="Lentes">Lentes</span>
        </p>
    </div>
    <h3 id="titulo-categoria">Todos</h3>
    <div class="row mt-4" id="cuadros">
        
         <!-- aqui llegan los datos por json -->
       
    </div>
</div>

    <!--inicio de botones paginador-->
    <nav >
        <ul class="pagination justify-content-center"  id="paginador">

        </ul>
    </nav>
      <!-- fin de botones -->

 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
include('footer.php');
?>
    <script src="../js/admin-articulos.js"></script> 
