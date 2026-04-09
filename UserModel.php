<?php
class TarifModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    // Hanya tampilkan tarif aktif
    public function getAllTarif()
    {
        return mysqli_query(
            $this->conn,
            "SELECT * FROM tb_tarif WHERE status='aktif'"
        );
    }

    public function getTarifById($id)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $q = mysqli_query(
            $this->conn,
            "SELECT * FROM tb_tarif WHERE id_tarif='$id'"
        );
        return mysqli_fetch_assoc($q);
    }

    public function insertTarif($data)
    {
        $jenis = mysqli_real_escape_string($this->conn, $data['jenis']);
        $tarif = mysqli_real_escape_string($this->conn, $data['tarif']);

        return mysqli_query(
            $this->conn,
            "INSERT INTO tb_tarif (jenis_kendaraan, tarif_per_jam, status) 
             VALUES ('$jenis', '$tarif', 'aktif')"
        );
    }

    public function updateTarif($id, $data)
    {
        $id    = mysqli_real_escape_string($this->conn, $id);
        $jenis = mysqli_real_escape_string($this->conn, $data['jenis']);
        $tarif = mysqli_real_escape_string($this->conn, $data['tarif']);

        return mysqli_query(
            $this->conn,
            "UPDATE tb_tarif SET 
                jenis_kendaraan='$jenis',
                tarif_per_jam='$tarif'
             WHERE id_tarif='$id'"
        );
    }

    // Soft Delete
    public function deleteTarif($id)
    {
        $id = mysqli_real_escape_string($this->conn, $id);

        return mysqli_query(
            $this->conn,
            "UPDATE tb_tarif SET status='nonaktif' 
             WHERE id_tarif='$id'"
        );
    }
}
?>
