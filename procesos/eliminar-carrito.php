<?php 
    session_start();
    //es para borrar la variable de sesión que tiene guardado los articulos del carrito, esto es para cuando hace el pedido el carrito quede en 0.
    unset($_SESSION["producto"]);
    echo 'destruida';

?>
