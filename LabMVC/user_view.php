<?php
require_once 'usercontroller.php';

$controller = new usercontroller();

// Mostrar la lista de usuarios
$users = $controller->getAllUsers();
foreach ($users as $user) {
    echo $user['username'] . ": " . $user['email'] . "<br>";
}
?>

<form action="usercontroller.php" method="post">
    <input type="text" name="newUsername" placeholder="Enter a new username" required>
    <input type="email" name="newEmail" placeholder="Enter a new email" required>
    <input type="submit" value="Add User">
</form>
