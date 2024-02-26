<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = pg_connect("host=localhost dbname=practica user=postgres password=Toty*020314");
    if (!$conn) {
        echo "Error al conectar a la base de datos.";
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $query = "INSERT INTO usuario (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear el usuario.";
    }

    pg_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear usuario</title>
</head>
<body>
    <h2>Crear usuario</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br><br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>