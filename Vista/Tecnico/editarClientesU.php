<?php 
session_start();
if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="es">
<?php require '../head.php'?>

    <div id="wrapper">
        <?php require 'headerUser.php' ?>
        
                
                  <!-- formulario servicio tecnico -->
                  <?php
require_once "../Modelo/Clientes.php";
$id = filter_input(INPUT_GET, 'client', FILTER_VALIDATE_INT);
if( ! $id )
{
    header("Location:" . Clientes::baseurl() . "Controlador/index.php");
}
$db = new Database;
$nuevoCliente = new Clientes($db);
$nuevoCliente->setId($id);
$client= $nuevoCliente->get();
$nuevoCliente->checkUser($client);
?>

        
           <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Editar Cliente : <?php echo $client->cli_nombre ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <div class="row">
                <div class="col-lg-8">
        <form action="<?php echo Clientes::baseurl() ?>Controlador/updateClientesU.php" method="POST">
            <div class="form-group">
                <label for="username">Cédula</label>
                <input type="text" name="cedula" value="<?php echo $client->cli_cedula ?>" class="form-control" id="username" placeholder="Actualize la cédula">
            </div>
            <div class="form-group">
                <label for="password">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $client->cli_nombre ?>" class="form-control" id="password" placeholder="Actualize el nombre">
            </div>
            <div class="form-group">
                <label for="username">Apellido</label>
                <input type="text" name="apellido" value="<?php echo $client->cli_apellido ?>" class="form-control" id="tipo" placeholder="Actualize el apellido">
            </div>
            <div class="form-group">
                <label for="username">Empresa</label>
                <input type="text" name="empresa" value="<?php echo $client->cli_empresa ?>" class="form-control" id="username" placeholder="Actualize la empresa">
            </div>
            <div class="form-group">
                <label for="password">Dirección</label>
                <input type="text" name="direccion" value="<?php echo $client->cli_direccion ?>" class="form-control" id="password" placeholder="Actualize direccion">
            </div>
            <div class="form-group">
                <label for="username">Teléfono</label>
                <input type="text" name="telefono" value="<?php echo $client->cli_telefono ?>" class="form-control" id="tipo" placeholder="Actualize el teléfono">
            </div>
            <div class="form-group">
                <label for="username">Celular</label>
                <input type="text" name="celular" value="<?php echo $client->cli_celular ?>" class="form-control" id="tipo" placeholder="Actualize el teléfono">
            </div>
            <div class="form-group">
                <label for="username">Correo</label>
                <input type="email" name="correo" value="<?php echo $client->cli_correo ?>" class="form-control" id="username" placeholder="Actualize el correo">
            </div>
            
            <input type="hidden" name="id" value="<?php echo $client->cli_id ?>" />
            <input type="submit" name="submit" class="btn btn-default" value="Actualizar Cliente" />
        </form>
              <!--fin  formulario cliente -->
              <?php require '../footer.php' ?>
</html>
<?php 
}else{
    header('Location:../login.php');
}
?>