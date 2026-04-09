<?php
class DashboardController extends BaseController
{

    public function index()
    {

        $conn = Database::getConnection();

        $q1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_transaksi WHERE status='IN'");
        $parkir = mysqli_fetch_assoc($q1);

        $q2 = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_transaksi");
        $transaksi = mysqli_fetch_assoc($q2);

        $q3 = mysqli_query($conn, "SELECT SUM(fee) as total FROM tb_transaksi WHERE DATE(checkout_time)=CURDATE()");
        $pendapatan = mysqli_fetch_assoc($q3);

        $data = [

            'parkir_aktif' => $parkir['total'],
            'total_transaksi' => $transaksi['total'],
            'pendapatan_hari_ini' => $pendapatan['total'] ? $pendapatan['total'] : 0

        ];

        include 'views/dashboard.php';

    }

}
?>