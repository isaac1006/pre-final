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
    $nombre_producto = $_POST["nombre_producto"];
    $descripcion_producto = $_POST["descripcion_producto"];
    $precio_producto = $_POST["precio_producto"];
    $stock_producto=$_POST["stock_producto"];
    $categoria_producto=$_POST["categoria_producto"];
    // preparo la consulta sql //
    $sql = "INSERT INTO productos (nombre_producto,descripcion_producto,precio_producto,stock_producto,categoria_producto ) VALUES ('$nombre_producto', '$descripcion_producto','$precio_producto',' $stock_producto','$categoria_producto')";
     // ejecuto la consulta //
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>