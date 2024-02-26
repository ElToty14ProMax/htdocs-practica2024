<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = pg_connect("host=localhost dbname=practica user=postgres password=Toty*020314");
    if (!$conn) {
        echo "Error al conectar a la base de datos.";
        exit;
    }

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $query = "UPDATE usuario SET username='$username', password='$password', email='$email' WHERE id=$id";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "Usuario actualizado exitosamente.";
    } else {
        echo "Error al actualizar el usuario.";
    }

    pg_close($conn);
} else {
    $id = $_GET['id'];

    $conn = pg_connect("host=localhost dbname=practica user=postgres password=Toty*020314");
    if (!$conn) {
        echo "Error al conectar a la base de datos.";
        exit;
    }

    $query = "SELECT * FROM usuario WHERE id=$id";
    $result = pg_query($conn, $query);

    if (!$result) {
        echo "Error al ejecutar la consulta.";
        exit;
    }

    $row = pg_fetch_assoc($result);
    $username = $row['username'];
    $password = $row['password'];
    $email = $row['email'];

    pg_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar usuario</title>
</head>
<body>
    <h2>Actualizar usuario</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required>
        <br><br>
        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $password; ?>" required>
        <br><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>
        <br><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>