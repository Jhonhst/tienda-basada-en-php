<?php
    include('cabecera.php');
?>
<?php if(isset($_COOKIE['admin'])): ?>
<!-- pedidos pendientes -->
<div class="container">
    <h3 class="text-center mt-3 mb-3" style="color:red">Pedidos Realizados</h3>
    <div class="row"> 
        <table class="table table-dark col-4">
            <thead>
                <tr>
                    <th scope="col">Id - pedido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Usuario</th>
                </tr>
            </thead>
            <tbody id="tablapedidos">
             
            <tbody>
        </table>
        <div class="col-8 ">
            <div class="row bordee" id="pedido">
                
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="nombre-tabla" value="pedidosrealizados">
<input type="hidden" id="url" value="precesos-pedidos/traer.php">
    <!--inicio de botones paginador-->
    <nav >
        <ul class="pagination justify-content-center"  id="paginador">

        </ul>
    </nav>
      <!-- fin de botones -->

<?php
include('footer.php');
?>
   <script src="../js/admin-pedidos.js"></script> 

  <?php endif ?>