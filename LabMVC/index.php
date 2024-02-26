<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example</title>
</head>
<body>
    <h1>CRUD Example</h1>
    <a href="create.php">Crear usuario</a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php
        $conn = pg_connect("host=localhost dbname=practica user=postgres password=Toty*020314");
        if (!$conn) {
            echo "Error al conectar a la base de datos.";
            exit;
        }

        $query = "SELECT * FROM usuario";
        $result = pg_query($conn, $query);

        if (!$result) {
            echo "Error al ejecutar la consulta.";
            exit;
        }

        while ($row = pg_fetch_assoc($result)) {
            $id = isset($row['id']) ? $row['id'] : '';
            $username = isset($row['username']) ? $row['username'] : '';
            $password = isset($row['password']) ? $row['password'] : '';
            $email = isset($row['email']) ? $row['email'] : '';

            echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$username."</td>";
            echo "<td>".$password."</td>";
            echo "<td>".$email."</td>";
            echo "<td>";
            echo "<a href='update.php?id=".$id."'>Editar</a>";
            echo " | ";
            echo "<a href='delete.php?id=".$id."'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }

        pg_close($conn);
        ?>
    </table>
</body>
</html>