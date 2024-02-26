<?php
class usermodel {
    private $host = "localhost";
    private $dbname = "practica";
    private $user = "postgres";
    private $password = "Toty*020314";
    private $conn;

    public function __construct() {
        $this->conn = new PDO("pgsql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    }

    public function addUser($username, $email) {
        $stmt = $this->conn->prepare("INSERT INTO usuario (username, email) VALUES (?, ?)");
        $stmt->execute([$username, $email]);
    }

    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
