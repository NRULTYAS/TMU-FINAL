<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .stat-card { border: none; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .menu-title { font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; }
        .menu-description { color: #6c757d; font-size: 0.9rem; }
    </style>
</head>
<!-- head tetap -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm mb-4">
    <div class="container-fluid">
        <a class="navbar-brand text-primary fw-bold" href="#">Portal Pendaftaran Diklat</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= site_url('login/logout') ?>" class="nav-link login-link">
                        <i class="fa fa-sign-out-alt me-1"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Daftar Pendaftar</h2>
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">List Pendaftar</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Pekerjaan</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Foto</th>
                                <th>KTP</th>
                                <th>Ijazah</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Is Exist</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pendaftar_list)): ?>
                                <?php foreach ($pendaftar_list as $pendaftar): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($pendaftar->id) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->nama_lengkap) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->email) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->no_hp) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->alamat) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->tempat_lahir) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->tanggal_lahir) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->jenis_kelamin) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->agama) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->pendidikan_terakhir) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->pekerjaan) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->nama_ayah) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->nama_ibu) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->foto) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->ktp) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->ijazah) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->created_at) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->updated_at) ?></td>
                                        <td><?= htmlspecialchars($pendaftar->is_exist) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="19" class="text-center">Tidak ada data pendaftar.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- JS tetap, hapus penutup script yang salah -->

<!-- Konfirmasi Logout -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const logoutLink = document.querySelector("a[href*='login/logout']");
        if (logoutLink) {
            logoutLink.addEventListener("click", function (e) {
                if (!confirm("Yakin ingin logout?")) {
                    e.preventDefault();
                }
            });
        }
    });
</script>
</body>
</html>
