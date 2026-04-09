<?php
class AreaModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getAllAreas()
    {
        return mysqli_query($this->conn, "SELECT * FROM tb_area_parkir");
    }

    public function getAreaById($id)
    {
        $q = mysqli_query($this->conn, "SELECT * FROM tb_area_parkir WHERE id_area='$id'");
        return mysqli_fetch_assoc($q);
    }

    public function insertArea($data)
    {
        mysqli_query($this->conn, "INSERT INTO tb_area_parkir (nama_area, kapasitas, terisi) VALUES (
            '{$data['nama_a']}', '{$data['kapasitas']}', 0)");
    }

    public function updateArea($id, $data)
    {
        mysqli_query($this->conn, "UPDATE tb_area_parkir SET 
            nama_area='{$data['nama_a']}', kapasitas='{$data['kapasitas']}' WHERE id_area='$id'");
    }

    public function deleteArea($id)
    {
        mysqli_query($this->conn, "DELETE FROM tb_area_parkir WHERE id_area='$id'");
    }

    public function updateTerisi($id, $change)
    {
        mysqli_query($this->conn, "UPDATE tb_area_parkir SET terisi = terisi $change WHERE id_area = '$id'");
    }
}
?>