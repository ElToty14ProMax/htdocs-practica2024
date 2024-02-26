<?php
require_once 'usermodel.php';

class usercontroller {
    private $model;

    public function __construct() {
        $this->model = new usermodel();
    }

    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['newUsername'];
            $email = $_POST['newEmail'];
            $this->model->addUser($username, $email);
            // Redirigir al usuario a la página de usuarios o mostrar un mensaje de éxito
            header('Location: user_view.php');
            exit;
        }
    }

    public function getAllUsers() {
        return $this->model->getAllUsers();
    }
}
?>
