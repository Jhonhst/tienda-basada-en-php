<?php
//es para que solo aparesca el boton de finalizar compra cuando el carrito tenga articulos, lo hago de esta forma para que por ajax siempre este actualizado debido a que si lo hago de forma simple se debe recargar la pagina para que funcione.
session_start();

if(isset($_SESSION['producto']) && count($_SESSION['producto'])>0){
   echo '<a href="carrito.php" class="btn btn-danger">';
   echo 'Finalizar Compra';
   echo '</a>';
}else{
   echo ''; 
}
