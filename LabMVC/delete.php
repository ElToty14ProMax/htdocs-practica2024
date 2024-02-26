<?php
$id = $_GET['id'];

$conn = pg_connect("host=localhost dbname=practica user=postgres password=Toty*020314");
if (!$conn) {
    echo "Error al conectar a la base de datos.";
    exit;
}

$query = "DELETE FROM usuario WHERE id=$id";
$result = pg_query($conn, $query);

if ($result) {
    echo "Usuario eliminado exitosamente.";
} else {
    echo "Error al eliminar el usuario.";
}

pg_close($conn);
