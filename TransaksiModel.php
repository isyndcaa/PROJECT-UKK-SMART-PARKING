<?php
class LogModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAllLogs() {
        return mysqli_query($this->conn, "SELECT l.*, u.nama_lengkap FROM tb_log_aktivitas l JOIN tb_user u ON l.id_user=u.id_user ORDER BY l.id_log DESC LIMIT 50");
    }

    public function insertLog($uid, $aktivitas) {
        mysqli_query($this->conn, "INSERT INTO tb_log_aktivitas (id_user, aktivitas, waktu_aktivitas) VALUES (
            '$uid', '$aktivitas', NOW())");
    }
}
?>