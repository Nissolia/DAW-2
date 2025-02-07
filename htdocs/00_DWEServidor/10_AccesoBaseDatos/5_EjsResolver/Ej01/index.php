<?php
include_once 'libreria.php';
// primero de todo pedimos la conexion con la base de datos

$conexion = pedirConexion("cliente", "banco");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matenimiento</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Mantenimiento de clientes</h2>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Teléfono</th>
            <th colspan="2">Modificaciones</th>
        </tr>
        <?php
        $consulta = $conexion->query("SELECT * FROM cliente");
        while ($cliente = $consulta->fetchObject()) {
        ?>
            <tr>
                <td><?= $cliente->dni ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->dirección ?></td>
                <td><?= $cliente->telefono ?></td>
                <td>
                    <form action="eliminar.php" method="post">
                        <input type="hidden" name="eliminar" value="true">
                        <input type="hidden" name="dni" value="<?= $cliente->dni ?>">
                        <input class="eliminar" type="submit" value="Eliminar">
                    </form>
                </td>
                <td>
                    <form action="modificar.php" method="post">
                        <input type="hidden" name="modificar" value="true">
                        <input type="hidden" name="dni" value="<?= $cliente->dni ?>">
                        <input class="modificar" type="submit" value="Modificar">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <form action="altaClienteFormulario.php" method="post">
                <td>
                    <input type="text" name="dni" placeholder="DNI" minlength="8" maxlength="8"><br>
                </td>
                <td>
                    <input type="text" name="nombre" placeholder="Nombre"  minlength="3" maxlength="30"><br>
                </td>
                <td>
                    <input type="text" name="direccion" placeholder="Direccion"  minlength="5" ><br>
                </td>
                <td>
                    <input type="number" name="telefono" placeholder="Teléfono"  minlength="10" maxlength="15">
                </td>
                <td colspan="2">
                    <input class="nuevoCliente" type="submit" value="Nuevo cliente">
                </td>

            </form>
            </td>
        </tr>
    </table>
    

<tr>
<td>Página  de</td>
</tr>
 
  
</body>

</html>