<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
</head>

<body>
    <h2>Formulario de Compra</h2>
    <form action="registrar_compra.php" method="post">
        <label for="id_cliente">Cliente:</label>
        <select id="id_cliente" name="id_cliente" required>
            <?php
            // Realizar la conexión a la base de datos (reemplaza con tus datos de conexión)
            $severname="localhost";
            $username="root";
            $password="";
            $dbname="almacenuno";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Realizar la consulta para obtener solo el id y el nombre de los clientes
            $sql = "SELECT id_cliente, nombre_cliente FROM clientes";
            $result = $conn->query($sql);

            // Mostrar las opciones del menú desplegable
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id_cliente"] . "'>" . $row["nombre_cliente"] . "</option>";
            }

            // Cerrar la conexión después de realizar la consulta
            $conn->close();
            ?>
        </select><br>

        <label for="id_producto">Producto:</label>
        <select id="id_producto" name="id_producto" required>
            <!-- Aquí deberías cargar dinámicamente los productos desde la base de datos -->
            <option value="1">Producto 1</option>
            <option value="2">Producto 2</option>
            <label for="fecha">Fecha de compra</label>
            <input type="date" name="fecha_compra" required>
            <!-- Agrega más opciones según tus productos -->
        </select><br>

        <button type="submit">Registrar Compra</button>
    </form>
</body>

</html>