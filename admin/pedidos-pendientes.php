<?php
    include('cabecera.php');
?>
<!-- pedidos pendientes -->
<div class="container" onLoad="script a ejecutar">
    <h3 class="text-center mt-3 mb-3">Pedidos Pendientes</h3>
    <div class="row"> 
        <table class="table table-dark col-4">
            <thead>
                <tr>
                    <th scope="col">id - pedido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Usuario</th>
                </tr>
            </thead>
            <tbody id="tablapedidos">
             
            <tbody>
        </table>
        <div class="col-12 col-lg-8 ">
            <div id="posicion-pedido">
                <div class="row" id="pedido">
                
                </div>
                <p>¿El pedido ya esta cancelado?</p>
                <button class="btn btn-success" id="pedido-cancelado">Si</button>
            </div>
          

        </div>
    </div>
</div>
<input type="hidden" id="nombre-tabla" value="pedidos">
<input type="hidden" id="url" value="precesos-pedidos/traer.php">

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
    <script src="../js/admin-pedidos.js"></script> 
   
