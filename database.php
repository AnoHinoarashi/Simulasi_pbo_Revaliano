<?php
// file: database.php

class Database {
    private $host = "localhost";
    private $username = "root"; // Sesuaikan dengan username MySQL Anda
    private $password = "";     // Sesuaikan dengan password MySQL Anda
    private $db_name = "DB_SIMULASI_PBO_TRPL1A_Revaliano";
    protected $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // Menggunakan PDO untuk koneksi yang lebih aman dan fleksibel
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Mengatur mode error PDO ke Exception untuk mempermudah debugging
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi basis data gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>