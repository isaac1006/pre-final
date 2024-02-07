<?php
// Procesamiento del formulario y conexión a la base de datos (debes configurar tus credenciales)
$severname="localhost";
$username="root";
$password="";
$dbname="almacenuno";

$conn = new mysqli($servername, $username, $password, $dbname); //concateno la direccion para crear la conexion con la base de datos //

if ($conn->connect_error) { //creo un condional if para verificar si la conexion fue exitosa //
    die("Conexión fallida: " . $conn->connect_error);
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar datos del formulario y realizar inserción en la base de datos
    $nombre_cliente = $_POST["nombre_cliente"];
    $email_cliente = $_POST["email_cliente"];
    $telefono_cliente = $_POST["telefono_cliente"];
    $direccion_cliente=$_POST["direccion_cliente"];
    $fecha_registro=$_POST["fecha_registro"];
    // preparo la consulta sql //
    $sql = "INSERT INTO clientes (nombre_cliente, email_cliente,telefono_cliente,direccion_cliente,fecha_registro ) VALUES ('$nombre_cliente', '$email_cliente', '$telefono_cliente',' $direccion_cliente','$fecha_registro')";
     // ejecuto la consulta //
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>