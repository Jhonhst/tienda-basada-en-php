<?php
    include('cabecera.php');
?>
<?php if(isset($_COOKIE['admin'])): ?>
<!-- desplegable agregar o modificar -->
<div class="container">
    <h3 class="text-center mt-3 mb-3" style="color:red">Usuarios</h3>
    <table class="table table-dark bordee">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">C.C</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Email</th>
                <th scope="col">País</th>
                <th scope="col">Ciudad y municipio</th>
                <th scope="col">Dirección</th> 
                <th scope="col">Pedidos</th>       
            </tr>
        </thead>
        <tbody id="tablausuarios">
        <tbody>
    </table>
</div>

    <!--inicio de botones paginador-->
    <nav >
        <ul class="pagination justify-content-center"  id="paginador">

        </ul>
    </nav>
      <!-- fin de botones -->


<?php
include('footer.php');
?>
   <script src="../js/admin-usuarios.js"></script> 
   <?php endif ?>