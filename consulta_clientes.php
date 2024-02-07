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

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los datos de cada cliente
    while ($row = $result->fetch_assoc()) {
        echo "ID Cliente: " . $row["id_cliente"] . "<br>";
        echo "Nombre Cliente: " . $row["nombre_cliente"] . "<br>";
        echo "----------------------------------------<br>";
    }
} else {
    echo "No se encontraron registros en la tabla clientes.";
}

// Cerrar la conexión después de realizar la consulta
$conn->close();
?>