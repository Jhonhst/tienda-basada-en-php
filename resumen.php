<?php 
include('conexion/conexion.php');
include('cabecera.php');
?>

    <?php if(isset($_COOKIE['mail']) && (isset($_SESSION["producto"]) && count($_SESSION["producto"])>0)): ?>
<div id="informacion-pedido" class="container"> 

    <h4 class="mt-5" style="color:green">Resumen</h4>
    <div class="row">
        <table class="col-12 col-lg-8 table table-bordered table-sm bordee ">
            <thead>
            <tr>
                <th scope="col" class="text-center">Cant</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio uni</th>
                <th scope="col">total</th>
             </tr>
             </thead>
            <tbody id="resumen">

            </tbody>
            <tbody>
                <tr>
                    <td colspan="3" class="text-right"><strong >Subtotal</strong></td>
                    <td>$ <span class="total-cancelar" style="color:red"></span></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><strong>Envío</strong></td>
                    <td>$ <span class="envio" style="color:red">600</span></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                    <td>$ <span class="total-cancelar-final" style="color:red"></span> </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total de artículos diferentes:</strong></td>
                    <td class="numero-del-carrito"></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total Artículos:</strong></td>
                    <td class="toda-cantidad"></td>
                </tr>
            </tbody>
        </table>    
    </div>
    <div class=""">
        <button id="retroceder-moficar" class="btn btn-danger">Modificar</button>
    </div>
      <!--inicio del formulario para enviar a pedidos -->
    <h4 class="mt-5" style="color:green">Información de envío</h4>
    <div class=" mt-2">
        <form id="pedido" class="row">
            <div class="col-6 col-lg-4">
                <label for="" class="mb-0 mt-1">Nombre: *</label>
                <input type="text" name="nombre" class="form-control" id="nombre">
                <label for="" class="mb-0 mt-1">C.C: *</label>
                <input type="text" name="cc" class="form-control" id="cc">
                <label for="" class="mb-0 mt-1">Dirección: *</label>
                <input type="text" name="direccion" class="form-control" id="direccion">
                <label for="" class="mb-0 mt-1">Email: *</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="col-6 col-lg-4">
                <label for="" class="mb-0 mt-1">Apellidos: *</label>
                <input type="text" name="apellido" class="form-control" id="apellidos">
                <label for="" class="mb-0 mt-1">Ciudad y municipio: *</label>
                <input type="text" name="ciudad" class="form-control" id="ciudad">
                <label for="" class="mb-0 mt-1">País: *</label>
                <input type="text" name="pais" class="form-control" id="pais">
                <label for="" class="mb-0 mt-1">Teléfono: *</label>
                <input type="text" name="telefono" class="form-control" id="telefono">
                <input type="hidden" name="subtotal" class="form-control" id="subtotal">
                <input type="hidden" name="precioenvio" class="form-control" id="precioenvio">
                <input type="hidden" name="total" class="form-control" id="total">
                <input type="hidden" name="idcliente" class="form-control" value="<?php echo $_COOKIE['id'] ?>">
            </div>
            <div class="col-12 col-lg-8 ">
                <h4 class="mt-5" style="color:green">Método de envío</h4>
                <label for="" class="mb-0 mt-1">Servientrega </label>
                <input type="radio" name="envio" value="Servientrega" id="servi"><br>
                <label for="" class="mb-0 mt-1">Interrapidisimo </label>
                <input type="radio" name="envio" value="Interrapidisimo" id="inter">

                <h4 class="mt-5" style="color:green">Método de pago</h4>
                <input type="radio" name="pago" value="Transferencia Electronica Davivienda">
                <label for="" class="mb-0 mt-1">Transferencia Electrónica Davivienda </label><br>
                <input type="radio" name="pago" value="Transferencia Electronica Bancolombia">
                <label for="" class="mb-0 mt-1">Transferencia Electronica Bancolombia </label><br>
                <input type="radio" name="pago" value="Giro Por Efecty Servientrega">
                <label for="" class="mb-0 mt-1">Giro Por Efecty Servientrega</label><br>
                <input type="radio" name="pago" value="Transferencia Banco De Bogotá">
                <label for="" class="mb-0 mt-1">Transferencia Banco De Bogotá </label>
                <button id="enviar-pedido" class="btn btn-danger btn-block text-center mt-3 col-6 col-lg-3">
                  Finalizar Compra
                </button>
            </div>
        </form>
    </div> 
     <!--fin del formulario para enviar a pedidos --> 
</div>

<div id="mensaje-cuenta" class="container d-none mt-4">
    ¡Gracias por tu compra!
    Tu numero de pedido es: 100007506. <br><br>

    Recibirás un Email confirmando el pedido con los detalles.<br><br>

    Recuerda revisar correo no deseado o spam
    Clic aquí para imprimir una copia de tu confirmación de pedido.<br><br>

    Solo falta que realices el pago, tan pronto lo hagas por favor envíanos un mail a ventas@tiendajr.com con el comprobante de pago escaneado y el número de tu pedido, para asegurar la entrega del correo, por favor envíalo sin firmas. A continuación encuentras la información de la forma de pago que escogiste:<br><br>

    <p id="davivienda" class="d-none">Transferencia Electrónica Davivienda
    Cuenta de ahorros Davivienda # 488401441149 a nombre de Alejandra Torres C.C. 1234567891, recuerda que es solo para transferencia electrónica, puede ser por cajero, internet o App, no consignación por ventanilla, si consignas por ventanilla debes adicionar 14,100 que cobra la entidad por consignación nacional. Si la consignación la haces en Bogotá no tiene costo.<br><br></p>

    <p id="bancolombia" class="d-none">Transferencia Electrónica Bancolombia
    Cuenta de ahorros Bancolombia # 24489267892 a nombre de Alejandra Torres C.C. 1234567890, recuerda que es solo para transferencia electrónica, puede ser por cajero, internet o PAC, no consignación por ventanilla, si consignas por ventanilla debes adicionar 10,500 que cobra la entidad por consignación nacional.<br><br></p>

    <p id="efecty" class="d-none">Giro por Efecty Servientrega
    A nombre de Alejandra Torres C.C. 1234567890, debes enviar para reclamar libre el valor del pedido, adicional te cobran algo por el giro<br><br></p>

    <p id="bogota" class="d-none">Transferencia Banco de Bogotá
    Cuenta de ahorros # 130132400 a nombre de Alejandra Torres C.C. 1234567890, puedes hacer transferencia desde cualquier banco del grupo AVAL y por cualquier canal electrónico, cajero, internet o App, no tiene costo. Si consignas por ventanilla fuera de bogotá debes adicionar 14,000 por consignación nacional<br><br></p>

    El tiempo estimado de entrega lo encuentras en la descripción de cada producto. El envío se realiza por Servientrega o Interrapidisimo, en la noche del día de despacho te notificaremos el número de guía para que realices el seguimiento si lo deseas. Recuerda que este pedido tiene una validez de 24 horas, si no notificas el pago dentro de este tiempo el pedido se cancela automáticamente.<br><br>
</div>

<br>
<br>
<br>
<br>
<?php endif ?>

<?php if(!isset($_COOKIE['mail']) || (!isset($_SESSION["producto"]) || count($_SESSION["producto"])<=0)): ?>
<p class="resumen-vacio">Carrito vacío <i class="fas fa-cart-arrow-down carrito"></i> o talves no se ha iniciado sesión <i class="fas fa-user-times"></i></p>
<?php endif ?>

<?php 
include 'footer.php';
?>