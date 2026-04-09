<div class="card p-4 mb-4 shadow-sm rounded-4">
    <h6 class="fw-bold mb-3"><?php echo $e ? 'Edit Area' : 'Tambah Area'; ?></h6>
    <form method="POST" class="row g-2">
        <input type="hidden" name="aksi" value="<?php echo $e ? 'edit_area' : 'tambah_area'; ?>">
        <input type="hidden" name="id" value="<?php echo isset($e['id_area']) ? $e['id_area'] : ''; ?>">

        <div class="col-md-5">
            <input type="text" name="nama_a" class="form-control shadow-sm" placeholder="Nama Area" value="<?php echo isset($e['nama_area']) ? $e['nama_area'] : ''; ?>" required>
        </div>
        <div class="col-md-5">
            <input type="number" name="kapasitas" class="form-control shadow-sm" placeholder="Kapasitas" value="<?php echo isset($e['kapasitas']) ? $e['kapasitas'] : ''; ?>" required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm"><?php echo $e ? 'Update' : 'Simpan'; ?></button>
        </div>
    </form>
</div>

<div class="table-responsive">
    <table class="table table-hover bg-white shadow-sm rounded-4">
        <thead class="table-light">
            <tr>
                <th>Area</th>
                <th>Slot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = mysqli_fetch_assoc($areas)): ?>
                <tr>
                    <td class="fw-bold"><?php echo $r['nama_area']; ?></td>
                    <td><?php echo $r['terisi']; ?> / <?php echo $r['kapasitas']; ?></td>
                    <td>
                        <a href="?page=area&edit=<?php echo $r['id_area']; ?>" class="btn btn-sm btn-warning me-1 mb-1">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="aksi" value="hapus_area">
                            <input type="hidden" name="id" value="<?php echo $r['id_area']; ?>">
                            <button class="btn btn-sm btn-danger mb-1"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<style>
/* Hover effect untuk card */
.card:hover {
    transform: translateY(-3px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

/* Hover effect untuk row tabel */
.table-hover tbody tr:hover {
    background-color: rgba(102, 126, 234, 0.1);
}

/* Tombol lebih nyaman dilihat */
.btn-sm {
    font-weight: 500;
}

/* Responsif tabel di layar kecil */
@media (max-width: 576px) {
    .table-responsive {
        font-size: 0.9rem;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
    }
}
</style>
