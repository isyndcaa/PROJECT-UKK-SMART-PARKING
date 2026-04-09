<div class="table-responsive mt-4">
    <table class="table table-hover bg-white shadow-sm rounded-4">
        <thead class="table-dark rounded-4">
            <tr>
                <th>Waktu</th>
                <th>User</th>
                <th>Aktivitas</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = mysqli_fetch_assoc($logs)): ?>
                <tr>
                    <td><?php echo $r['waktu_aktivitas']; ?></td>
                    <td class="fw-bold"><?php echo $r['nama_lengkap']; ?></td>
                    <td><?php echo $r['aktivitas']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<style>
/* Hover effect untuk row tabel */
.table-hover tbody tr:hover {
    background-color: rgba(102, 126, 234, 0.08);
    transition: background-color 0.3s ease;
}

/* Tabel shadow & rounded */
.table {
    border-radius: 12px;
    overflow: hidden;
}

/* Responsif font di layar kecil */
@media (max-width: 576px) {
    .table-responsive {
        font-size: 0.9rem;
    }
}
</style>
