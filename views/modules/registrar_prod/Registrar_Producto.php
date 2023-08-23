<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
</head>

<body>
    <div class="col-md-8 col-md-offset-2">
        <h3 class="centrar">Registro de Productos</h3>
        <form method="POST" action="controllers/registro_productos.php">
            <label for="nombre">Nombre Producto :</label>
            <input class="form-control" type="text" name="nombreproducto" required><br>
            <label for="fecha">Fecha Ingreso:</label>
            <input class="form-control" type="text" name="fechaingreso" required><br>
            <label for="fecha">Cantidad:</label>
            <input class="form-control" type="text" name="cantidadproducto" required><br>
            <input class="form-control btn btn-success letra3" type="submit" name="registrarproducto" value="Registrarse">
        </form>
    </div>
    <br>
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>Nombre del Producto</td>
                <td>Fecha Producto</td>
                <td>Cantidad</td>
                <!-- <td>Acción</td>
                <td>Acción</td>
                <td>Acción</td> -->
            </tr>
            <?php
            $serverName = "DESKTOP-71KFE54\SQLEXPRESS";
            $dbname = "asoinco";
            $username = "";
            $passworddb = "";
            $connectionInfo = array(
                "Database" => $dbname,
                "UID" => $username,
                "PWD" => $passworddb,
                "CharacterSet" => "Utf-8"
            );
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            if ($conn) {
                echo "";
            } else {
                echo "fallo";
                die(print_r(sqlsrv_errors(), true));
            }
            ?>
            <?php
            $query1 = "SELECT * FROM productos";
            $ejecutar3 = sqlsrv_query($conn, $query1);
            $i = 0;
            while ($fila = sqlsrv_fetch_array($ejecutar3)) {
                $id = $fila['id'];
                $nombrepro = $fila['nombrepro'];
                $fechapro = $fila['fechapro'];
                $cantidadpro = $fila['cantidad'];
                $i++;
            ?>
                <tr align="center">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombrepro; ?></td>
                    <td><?php echo $fechapro; ?></td>
                    <td><?php echo $cantidadpro; ?></td>
                    <!-- <td><a href="editar.php?editar=<?php echo $id; ?>">Editar</a></td>
                    <td><a href="formulario.php?borrar=$id;">Borrar</a></td>
                    <td><a href="formulario.php?borrar=<?php echo $id; ?>">Alerta</a></td> -->
                </tr>
            <?php } ?>
        </table>
    </div>    
</body>
<?php
    if (isset($_GET['editar'])) {
        include("editar.php");
    }
    ?>

</html>