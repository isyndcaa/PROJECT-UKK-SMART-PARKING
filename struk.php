<div class="card p-4 mb-4 shadow-sm rounded-4 no-print">
    <form method="GET" class="row g-2 align-items-center">
        <input type="hidden" name="page" value="rekap">

        <div class="col-md-5">
            <input type="date" name="tgl" class="form-control shadow-sm"
                value="<?php echo isset($_GET['tgl']) ? $_GET['tgl'] : date('Y-m-d'); ?>">
        </div>

        <div class="col-md-3">
            <button type="submit" class="btn btn-dark w-100 fw-bold shadow-sm">Filter</button>
        </div>

        <div class="col-md-4">
            <button onclick="window.print()" type="button" class="btn btn-primary w-100 fw-bold shadow-sm">
                <i class="bi bi-printer"></i> Laporan
            </button>
        </div>
    </form>
</div>

<div class="card p-4 bg-white shadow-sm rounded-4">

    <div class="text-center mb-4 only-print">
        <h3>LAPORAN HARIAN</h3>
        <p>Tanggal: <?php echo isset($_GET['tgl']) ? $_GET['tgl'] : date('Y-m-d'); ?></p>
        <hr>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Plat</th>
                    <th>Durasi</th>
                    <th class="text-end">Biaya</th>
                </tr>
            </thead>
            <tbody>

                <?php if (!empty($rekap)): ?>
                    <?php foreach ($rekap as $row): ?>
                        <tr>
                            <td><?php echo $row['checkin_time']; ?></td>
                            <td><?php echo $row['checkout_time']; ?></td>
                            <td><strong><?php echo $row['plat_nomor']; ?></strong></td>
                            <td><?php echo $row['duration']; ?> Jam</td>
                            <td class="text-end">Rp <?php echo number_format($row['fee']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada data
                        </td>
                    </tr>
                <?php endif; ?>

            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th colspan="4" class="text-end">TOTAL PENDAPATAN:</th>
                    <th class="text-end text-primary">
                        Rp <?php echo number_format($total); ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<style>
.card:hover {
    transform: translateY(-3px);
    transition: 0.3s;
}
.table-hover tbody tr:hover {
    background-color: rgba(102, 126, 234, 0.08);
}
.only-print { display: none; }

@media print {
    .no-print { display: none !important; }
    .only-print { display: block !important; }
}
</style>