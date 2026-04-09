<?php

require __DIR__ . '/../vendor/autoload.php';

use PhpMqtt\Client\MqttClient;

class TransaksiController extends BaseController
{

    public function index()
    {

        $config = require __DIR__ . '/../config/mqtt.php';

        if (isset($_POST['aksi'])) {

            if ($_POST['aksi'] == 'buka_palang') {

                // ===============================
                // VALIDASI INPUT
                // ===============================
                if (empty($_POST['id'])) {
                    header("Location:?page=transaksi&error=invalid_id");
                    exit();
                }

                $id = (int) $_POST['id'];

                // ===============================
                // AMBIL DATA
                // ===============================
                $data = $this->transaksiModel->getById($id);

                // ===============================
                // VALIDASI STATUS
                // ===============================
                if (!$data || $data['status'] !== 'OUT') {
                    header("Location:?page=transaksi&error=invalid_status");
                    exit();
                }

                // ===============================
                // UPDATE STATUS → DONE
                // ===============================
                $this->transaksiModel->selesaiTransaksi($id);

                // ================= MQTT =================
                try {

                    $mqtt = new MqttClient(
                        $config['broker'],
                        $config['port'],
                        'web-client-' . uniqid()
                    );

                    $mqtt->connect(null, $config['clean_session']);

                    $topicServo = $config['prefix'] . '/' . $config['topic_exit_servo'];
                    $topicLCD   = $config['prefix'] . '/' . $config['topic_lcd'];

                    $mqtt->publish($topicServo, 'OPEN', 0);
                    $mqtt->publish($topicLCD, 'Terima Kasih|Selamat Jalan', 0);

                    $mqtt->disconnect();

                } catch (Exception $e) {
                    // log error kalau perlu
                    // error_log($e->getMessage());
                }

                header("Location:?page=transaksi");
                exit();
            }
        }

        // ================= DATA =================
        $checkin  = $this->transaksiModel->getCheckin();
        $checkout = $this->transaksiModel->getCheckout();
        $riwayat  = $this->transaksiModel->getRiwayat();

        include 'views/transaksi.php';
    }
}