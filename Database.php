<?php
class Database {
    private $host = "localhost";
    private $db_name = "klinik_kesehatan";
    private $username = "root"; // ganti sesuai config
    private $password = "1234";     // ganti sesuai config
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                   $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Koneksi gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
