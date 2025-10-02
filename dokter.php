<?php
require_once "Database.php";

class Dokter {
    private $conn;
    private $table_name = "dokter";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Create
    public function tambah($nama, $spesialisasi, $jam_praktik) {
        $query = "INSERT INTO " . $this->table_name . " (nama, spesialisasi, jam_praktik) VALUES (:nama, :spesialisasi, :jam_praktik)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":spesialisasi", $spesialisasi);
        $stmt->bindParam(":jam_praktik", $jam_praktik);
        return $stmt->execute();
    }

    // Read
    public function tampil() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_dokter ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Update
    public function ubah($id, $nama, $spesialisasi, $jam_praktik) {
        $query = "UPDATE " . $this->table_name . " SET nama=:nama, spesialisasi=:spesialisasi, jam_praktik=:jam_praktik WHERE id_dokter=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":spesialisasi", $spesialisasi);
        $stmt->bindParam(":jam_praktik", $jam_praktik);
        return $stmt->execute();
    }

    // Delete
    public function hapus($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_dokter=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
