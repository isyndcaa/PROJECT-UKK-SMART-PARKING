<?php
class StrukController extends BaseController
{
    public function index()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $data = $this->transaksiModel->getTransaksiForStruk($id);
        include 'views/struk.php';
    }
}
?>