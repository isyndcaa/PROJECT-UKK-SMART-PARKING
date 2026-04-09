<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/config.php';

use PhpMqtt\Client\MqttClient;

// ================= DB =================
try {
    $conn = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("DB Error: " . $e->getMessage());
}

// ================= MQTT =================
$config = require __DIR__ . '/../config/mqtt.php';

$mqtt = new MqttClient(
    $config['broker'],
    $config['port'],
    $config['client_id']
);

$mqtt->connect();

$topicEntry = $config['prefix'] . '/' . $config['topic_rfid_entry'];
$topicExit = $config['prefix'] . '/' . $config['topic_rfid_exit'];

echo "Listening ENTRY: $topicEntry\n";
echo "Listening EXIT: $topicExit\n";


// ================= ENTRY =================
$mqtt->subscribe($topicEntry, function ($topic, $message) use ($mqtt, $conn, $config) {

    echo "ENTRY RFID: $message\n";

    try {

        $stmt = $conn->prepare("
            INSERT INTO tb_transaksi (card_id, checkin_time, status)
            VALUES (?, NOW(), 'IN')
        ");
        $stmt->execute([trim($message)]);

        echo "✅ INSERT BERHASIL\n";

        // LCD
        $mqtt->publish($config['prefix'] . '/' . $config['topic_lcd'], 'Selamat Datang|Silakan Masuk', 0);

        // SERVO MASUK
        $mqtt->publish($config['prefix'] . '/' . $config['topic_entry_servo'], 'OPEN', 0);

    } catch (Exception $e) {
        echo "❌ ERROR ENTRY: " . $e->getMessage() . "\n";
    }

}, 0);


// ================= EXIT =================
$mqtt->subscribe($topicExit, function ($topic, $message) use ($mqtt, $conn, $config) {

    echo "EXIT RFID: $message\n";

    try {

        // Cari yang masih IN
        $cek = $conn->prepare("
            SELECT id, checkin_time FROM tb_transaksi
            WHERE card_id = ? AND status = 'IN'
            ORDER BY id DESC LIMIT 1
        ");
        $cek->execute([trim($message)]);
        $data = $cek->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            echo "❌ DATA TIDAK DITEMUKAN\n";
            return;
        }

        // Update jadi OUT + hitung biaya
        $stmt = $conn->prepare("
            UPDATE tb_transaksi SET
                checkout_time = NOW(),
                duration = CEIL(TIMESTAMPDIFF(SECOND, checkin_time, NOW()) / 3600),
fee = CEIL(TIMESTAMPDIFF(SECOND, checkin_time, NOW()) / 3600) * 2000,
                status = 'OUT'
            WHERE id = ?
        ");
        $stmt->execute([$data['id']]);

        // Ambil fee
        $fee = $conn->prepare("SELECT fee FROM tb_transaksi WHERE id=?");
        $fee->execute([$data['id']]);
        $total = $fee->fetchColumn();

        echo "✅ UPDATE BERHASIL | TOTAL: $total\n";

        // LCD tampilkan biaya
        $mqtt->publish($config['prefix'] . '/' . $config['topic_lcd'], 'Total: ' . $total . '|Silakan Bayar', 0);

        // ❌ Servo keluar BELUM (nunggu approve web → status DONE)

    } catch (Exception $e) {
        echo "❌ ERROR EXIT: " . $e->getMessage() . "\n";
    }

}, 0);


$mqtt->loop(true);