<?php
class RekapController extends BaseController
{
    public function index()
    {
        $tgl = isset($_GET['tgl']) ? $_GET['tgl'] : date('Y-m-d');

        // ambil data (array)
        $rekap = $this->transaksiModel->getTransaksiForRekap($tgl);

        // total pendapatan
        $total = $this->transaksiModel->getTotalRekap($tgl);

        include 'views/rekap.php';
    }
}
?>