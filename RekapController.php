<?php
class LogController extends BaseController {
    public function index() {
        $logs = $this->logModel->getAllLogs();
        include 'views/log.php';
    }
}
?>