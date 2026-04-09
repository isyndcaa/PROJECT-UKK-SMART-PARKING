<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class BaseController
{

    protected $conn;
    protected $userModel;
    protected $tarifModel;
    protected $areaModel;
    protected $transaksiModel;
    protected $logModel;

    public function __construct()
    {

        $this->conn = Database::getConnection();

        $this->userModel = new UserModel();
        $this->tarifModel = new TarifModel();
        $this->areaModel = new AreaModel();
        $this->transaksiModel = new TransaksiModel();
        $this->logModel = new LogModel();

    }

    protected function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    public function handleActions()
    {

        if (isset($_POST['aksi'])) {

            $aksi = $_POST['aksi'];
            $uid = $_SESSION['id_user'];

            /* ======================
               USER
            ====================== */

            if ($aksi == 'tambah_user') {
                $this->userModel->insertUser($_POST);
            } elseif ($aksi == 'edit_user') {
                $this->userModel->updateUser($_POST['id'], $_POST);
            } elseif ($aksi == 'hapus_user') {
                $this->userModel->deleteUser($_POST['id']);
            }


            /* ======================
               TARIF
            ====================== */ elseif ($aksi == 'tambah_tarif') {
                $this->tarifModel->insertTarif($_POST);
            } elseif ($aksi == 'edit_tarif') {
                $this->tarifModel->updateTarif($_POST['id'], $_POST);
            } elseif ($aksi == 'hapus_tarif') {
                $this->tarifModel->deleteTarif($_POST['id']);
            }


            /* ======================
               AREA PARKIR
            ====================== */ elseif ($aksi == 'tambah_area') {
                $this->areaModel->insertArea($_POST);
            } elseif ($aksi == 'edit_area') {
                $this->areaModel->updateArea($_POST['id'], $_POST);
            } elseif ($aksi == 'hapus_area') {
                $this->areaModel->deleteArea($_POST['id']);
            }


            /* ======================
               BUKA PALANG PARKIR
            ====================== */ elseif ($aksi == 'buka_palang') {

                $id = $_POST['id'];

                // update status transaksi
                $this->transaksiModel->selesaiTransaksi($id);

                // simpan log
                $this->logModel->insertLog($uid, "Buka Palang ID Transaksi : " . $id);

                try {

                    $config = require __DIR__ . '/../config/mqtt.php';

                    $mqtt = new MqttClient(
                        $config['broker'],
                        $config['port'],
                        'web-gate-' . uniqid()
                    );

                    $connectionSettings = (new ConnectionSettings)
                        ->setKeepAliveInterval(60);

                    $mqtt->connect($connectionSettings, true);

                    // topic
                    $topicServo = $config['prefix'] . '/' . $config['topic_exit_servo'];
                    $topicLCD = $config['prefix'] . '/' . $config['topic_lcd'];

                    // kirim MQTT
                    $mqtt->publish($topicServo, 'OPEN', 0);
                    $mqtt->publish($topicLCD, 'Terima Kasih|Selamat Jalan', 0);

                    $mqtt->disconnect();

                } catch (Exception $e) {
                }

            }

            $this->redirect("index.php?page=" . $_GET['page']);

        }

    }

}
?>