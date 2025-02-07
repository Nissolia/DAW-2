<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <!-- Crea un servicio web que proporcione información sobre los productos de la base de datos, del carrito de la compra.
Se devolverá en formato JSON, el nombre, precio y url de la imagen, de cada uno de los productos seleccionados.
La petición podrá ser por nombre o por precio. Por nombre el servicio devolverá los productos cuyo nombre
contenga la cadena recibida por parámetro. Y por precio el servicio devolverá los productos cuyo precio este dentro
del rango mínimo y máximo recibido por parámetro.

Para poder usar el servicio, el cliente debe haberse registrado previamente y recibido su 'TOKEN' de acceso. Estos
tokens están almacenados en una tabla nueva llamada 'clientes' con tres campos, 'nombre', 'token' y 'peticiones'.
En cada petición el cliente debe mandar el token y el servidor debe comprobar que es un token válido
correspondiente a un cliente registrado, y sumar uno al campo peticiones en la tabla, para llevar un control de las
peticiones que realiza cada cliente. -->

    <form action="" method="post">
        Nombre del servicio: <input type="text" name="servicio">
        <input type="submit" value="Buscar servicio">
    </form>

    <form action="" method="post">
        Buscar por precio: <br>
        Mínimo: <input type="number" name="min">
        Máximo: <input type="number" name="max">
        <input type="submit" value="Buscar por precio">
    </form>
</body>

</html>