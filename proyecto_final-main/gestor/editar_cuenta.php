<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "ggg";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css"> 
</head>
<body class="container py-5"> 
    
    
   <div>
    <h1 class="mb-4">Cuenta de <a href="#"></a></h1><br>
    <br><br>
    <section id="cambiar-datos" class="setting-section">
        <form class="mb-3 setting-form" action="#" method="POST">
            <div class="mb-3">
                <label for="nombre-actual" class="form-label">Ingrese su ID para hacer cambios: </label>
                <input type="text" name="id_usuario" class="form-control"><br>
            </div>
            <div class="mb-3">
                <label for="nuevo-nombre" class="form-label">Nuevo Nombre: </label>
                <input type="text" name="nombre" class="form-control">
                <label for="nuevo-correo" class="form-label">Nuevo Telefono:</label>
                <input type="tel" name="celular" class="form-control">
                <label for="nueva-contraseña" class="form-label">Nueva Contraseña:</label>
                <input type="password" name="contraseña" class="form-control">
                <label for="nuevo-correo" class="form-label">Nuevo Correo:</label>
                <input type="email" name="correo" class="form-control">
            </div>
            <div class="mb-3">
            </div>
            <button type="submit" class="btn btn-primary" name="Confirmar">Confirmar cambios</button>
            <button type="reset" class="btn btn-primary">Borrar</button>

            <?php
                if(isset($_POST['Confirmar']))
                {
                    $id_usuario= $_POST['id_usuario'];
                    $nombre= $_POST['nombre'];
                    $celular= $_POST['celular'];
                    $contraseña= $_POST['contraseña'];
                    $correo= $_POST['correo'];

                    $actualizar= "UPDATE usuarios SET nombre='$nombre', contraseña='$contraseña', celular='$celular', correo='$correo' WHERE id_usuario='$id_usuario' ";
                    $sql_update= mysqli_query($enlace, $actualizar);
                }
            ?>
        </form>
    </section>
   <div>
    <section id="ver-historial" class="setting-section">
        <h2 class="mb-4"><strong>Ver Historial de Órdenes</strong></h2>
        <!-- Aquí puedes mostrar el historial de órdenes -->
    </section>
    <br>

    <section id="eliminar-cuenta" class="setting-section">
    <label for="nombre-actual" class="form-label">Ingrese su nombre y contraseña para eliminar su cuenta: </label>
        <form action="#" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar tu cuenta? Esta acción no se puede deshacer.')">
            <label for="eliminar-cuenta">Nombre:</label>
            <input type="text" name="nombre" class="form-control"><br>
            <label for="eliminar-cuenta">Contraseña:</label>
            <input type="password" name="contraseña" class="form-control"><br>
            <button type="submit" class="btn btn-danger" name="delete">Eliminar Cuenta</button>
            <?php
                if(isset($_POST['delete']))
                {
                    $nombre= $_POST['nombre'];
                    $contraseña= $_POST['contraseña'];

                    $eliminar= "DELETE FROM usuarios WHERE nombre='$nombre' AND contraseña='$contraseña'";
                    $sql_delete= mysqli_query($enlace, $eliminar);

                    header("Location: pag_principal.html");
                    exit();
                }
            ?>
        </form>
        <br>
        <a href="inicio.html"><button class="btn btn-primary me-md-2" type="button">Cancelar</button></a>
    </section>
   </div>  
</body>
</html>