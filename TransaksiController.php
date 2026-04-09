<?php
class TarifController extends BaseController
{
    public function index()
    {
        $e = isset($_GET['edit']) ? $this->tarifModel->getTarifById($_GET['edit']) : null;
        $tarifs = $this->tarifModel->getAllTarif();
        include 'views/tarif.php';
    }
}
?>