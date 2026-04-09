<?php
class AreaController extends BaseController
{
    public function index()
    {
        $e = isset($_GET['edit']) ? $this->areaModel->getAreaById($_GET['edit']) : null;
        $areas = $this->areaModel->getAllAreas();
        include 'views/area.php';
    }
}
?>