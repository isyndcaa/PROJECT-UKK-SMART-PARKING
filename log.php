<div class="container my-5">
    <div class="row g-4 text-center">

        <div class="col-md-4">
            <div class="card shadow-sm p-4 rounded-4 border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff;">
                <h6 class="fw-bold mb-2">Parkir Aktif</h6>
                <h3 class="fw-bold"><?php echo isset($data['parkir_aktif']) ? $data['parkir_aktif'] : 0; ?></h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-4 rounded-4 border-0" style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); color: #fff;">
                <h6 class="fw-bold mb-2">Total Transaksi</h6>
                <h3 class="fw-bold"><?php echo isset($data['total_transaksi']) ? $data['total_transaksi'] : 0; ?></h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-4 rounded-4 border-0" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: #fff;">
                <h6 class="fw-bold mb-2">Total Pendapatan</h6>
                <h3 class="fw-bold">Rp <?php echo isset($data['pendapatan_hari_ini']) ? number_format($data['pendapatan_hari_ini']) : 0; ?></h3>
            </div>
        </div>

    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 768px) {
        .card h3 {
            font-size: 1.8rem;
        }

        .card h6 {
            font-size: 1rem;
        }
    }
</style>