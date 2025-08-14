<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #fff;
            border: 4px solid #1976d2;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        .profile-img img {
            width: 80px;
            height: 80px;
        }
        .card-stat {
            min-width: 200px;
            text-align: center;
        }
        .nav-tabs .nav-link.active {
            background: #1976d2;
            color: #fff !important;
        }
    </style>
</head>
<body style="background: #f5f6fa;">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold text-primary">Dashboard Admin</span>
        <div class="d-flex ms-auto">
            <a href="<?= site_url('logout') ?>" class="btn btn-outline-danger" id="logoutBtn">Logout</a>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="card shadow-lg">
                <div class="card-body text-center" style="background: linear-gradient(90deg, #ffb347 0%, #ffcc33 100%);">
                    <div class="profile-img mb-2">
                        <img src="https://img.icons8.com/ios-filled/100/1976d2/administrator-male.png" alt="Admin">
                    </div>
                    <h5 class="mb-0">Login as :</h5>
                    <h3 class="fw-bold">Administrator</h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="dashboardTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pendaftaran-all-tab" data-bs-toggle="tab" data-bs-target="#pendaftaran-all" type="button" role="tab">Data Pendaftaran</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="data-master-tab" data-bs-toggle="tab" data-bs-target="#data-master" type="button" role="tab">Data Master</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="diklat-jadwal-tab" data-bs-toggle="tab" data-bs-target="#diklat-jadwal" type="button" role="tab">Diklat & Atur Jadwal</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pendaftaran-tab" data-bs-toggle="tab" data-bs-target="#pendaftaran" type="button" role="tab">Pendaftaran</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="laporan-tab" data-bs-toggle="tab" data-bs-target="#laporan" type="button" role="tab">Laporan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kuesioner-tab" data-bs-toggle="tab" data-bs-target="#kuesioner" type="button" role="tab">Kuesioner</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="dashboardTabsContent">
                        <div class="tab-pane fade" id="pendaftaran-all" role="tabpanel">
                            <h5>Data Pendaftaran Seluruh Peserta</h5>
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Pendaftar</th>
                                        <th>Nama Diklat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pendaftaran)) : foreach ($pendaftaran as $p) : ?>
                                    <tr>
                                        <td><?= $p->id ?></td>
                                        <td><?= $p->nama_pendaftar ?></td>
                                        <td><?= $p->nama_diklat ?></td>
                                        <td><?= isset($p->status) ? $p->status : (isset($p->status_pendaftaran) ? $p->status_pendaftaran : '-') ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/delete_pendaftaran/'.$p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data pendaftaran ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="overview" role="tabpanel">
                            <h5>Selamat Datang,</h5>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="card card-stat shadow-sm mb-3">
                                        <div class="card-body">
                                            <div class="text-success fw-bold" style="font-size:2rem;">672</div>
                                            <div>Pengunjung Hari ini</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-stat shadow-sm mb-3">
                                        <div class="card-body">
                                            <div class="text-primary fw-bold" style="font-size:2rem;">345625</div>
                                            <div>Total Pengunjung</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-stat shadow-sm mb-3">
                                        <div class="card-body">
                                            <div class="text-danger fw-bold" style="font-size:2rem;">7</div>
                                            <div>Pengunjung Online</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data-master" role="tabpanel">
                                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link active" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#pills-user" type="button" role="tab">User/Operator</button>
                                                                                            </li>
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link" id="pills-jenis-tab" data-bs-toggle="pill" data-bs-target="#pills-jenis" type="button" role="tab">Jenis Diklat</button>
                                                                                            </li>
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link" id="pills-persyaratan-tab" data-bs-toggle="pill" data-bs-target="#pills-persyaratan" type="button" role="tab">Persyaratan</button>
                                                                                            </li>
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link" id="pills-diklatpersyaratan-tab" data-bs-toggle="pill" data-bs-target="#pills-diklatpersyaratan" type="button" role="tab">Diklat Persyaratan</button>
                                                                                            </li>
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link" id="pills-pendaftar-tab" data-bs-toggle="pill" data-bs-target="#pills-pendaftar" type="button" role="tab">Pendaftar</button>
                                                                                            </li>
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link" id="pills-pendaftaran-tab" data-bs-toggle="pill" data-bs-target="#pills-pendaftaran" type="button" role="tab">Pendaftaran</button>
                                                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="pills-user" role="tabpanel">
                                                                                                <h6 class="fw-bold">User/Operator</h6>
                                                                                                <div class="table-responsive">
                                                                                                    <table class="table table-bordered mt-2">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th>ID</th>
                                                                                                                <th>Nama Lengkap</th>
                                                                                                                <th>Username</th>
                                                                                                                <th>Role</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <?php if (!empty($users)) : foreach ($users as $user) : ?>
                                                                                                            <tr>
                                                                                                                <td><?= $user->id ?></td>
                                                                                                                <td><?= $user->nama_lengkap ?></td>
                                                                                                                <td><?= $user->username ?></td>
                                                                                                                <td><?= $user->type ?></td>
                                                                                                            </tr>
                                                                                                            <?php endforeach; endif; ?>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="pills-jenis" role="tabpanel">
                                                                                                <h6 class="fw-bold">Jenis Diklat</h6>
                                                                                                <div class="table-responsive">
                                                                                                    <table class="table table-bordered mt-2">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th>ID</th>
                                                                                                                <th>Jenis Diklat</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <?php if (!empty($jenis_diklat)) : foreach ($jenis_diklat as $jd) : ?>
                                                                                                            <tr>
                                                                                                                <td><?= $jd->id ?></td>
                                                                                                                <td><?= $jd->jenis_diklat ?></td>
                                                                                                            </tr>
                                                                                                            <?php endforeach; endif; ?>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="pills-persyaratan" role="tabpanel">
                                                                                                <h6 class="fw-bold">Persyaratan</h6>
                                                                                                <div class="table-responsive">
                                                                                                    <table class="table table-bordered mt-2">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th>ID</th>
                                                                                                                <th>Persyaratan</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <?php if (!empty($persyaratan)) : foreach ($persyaratan as $ps) : ?>
                                                                                                            <tr>
                                                                                                                <td><?= $ps->id ?></td>
                                                                                                                <td><?= $ps->persyaratan ?></td>
                                                                                                            </tr>
                                                                                                            <?php endforeach; endif; ?>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                            <div class="tab-pane fade" id="pills-diklatpersyaratan" role="tabpanel">
                                                                <h6 class="fw-bold">Diklat Persyaratan</h6>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered mt-2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Diklat ID</th>
                                                                                <th>Persyaratan ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php if (!empty($diklat_persyaratan)) : foreach ($diklat_persyaratan as $dp) : ?>
                                                                            <tr>
                                                                                <td><?= $dp->id ?></td>
                                                                                <td><?= $dp->diklat_id ?></td>
                                                                                <td><?= $dp->persyaratan_id ?></td>
                                                                            </tr>
                                                                            <?php endforeach; endif; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-pendaftar" role="tabpanel">
                                                                <h6 class="fw-bold">Pendaftar</h6>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered mt-2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Nama Lengkap</th>
                                                                                <th>Email</th>
                                                                                <th>Username</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php if (!empty($pendaftar)) : foreach ($pendaftar as $pd) : ?>
                                                                            <tr>
                                                                                <td><?= $pd->id ?></td>
                                                                                <td><?= $pd->nama_lengkap ?></td>
                                                                                <td><?= $pd->email ?></td>
                                                                                <td><?= isset($pd->username) ? $pd->username : '-' ?></td>
                                                                            </tr>
                                                                            <?php endforeach; endif; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-pendaftaran" role="tabpanel">
                                                                <h6 class="fw-bold">Pendaftaran</h6>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered mt-2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Pendaftar ID</th>
                                                                                <th>Diklat ID</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php if (!empty($pendaftaran)) : foreach ($pendaftaran as $p) : ?>
                                                                            <tr>
                                                                                <td><?= $p->id ?></td>
                                                                                <td><?= $p->pendaftar_id ?></td>
                                                                                <td><?= $p->diklat_id ?></td>
                                                                                <td><?= isset($p->status) ? $p->status : (isset($p->status_pendaftaran) ? $p->status_pendaftaran : '-') ?></td>
                                                                            </tr>
                                                                            <?php endforeach; endif; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                        </div>
                        <div class="tab-pane fade" id="diklat-jadwal" role="tabpanel">
                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                                <h5>Diklat & Atur Jadwal</h5>
                                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahDiklat">Tambah Diklat</button>
                                                        </div>
                                                        <div class="mb-3 row align-items-center">
                                                                                            <label class="col-sm-2 col-form-label">Filter Jenis Diklat</label>
                                                                                            <div class="col-sm-6">
                                                                                                <select class="form-select" id="filterJenisDiklat" onchange="filterJenisDiklatTable()">
                                                                                                    <option value="">Semua Jenis</option>
                                                                                                    <?php foreach ($jenis_diklat as $jd) : ?>
                                                                                                        <option value="<?= $jd->id ?>"><?= $jd->jenis_diklat ?></option>
                                                                                                    <?php endforeach; ?>
                                                                                                </select>
                                                                                            </div>
                                                        </div>
                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>ID Diklat</th>
                                        <th>Nama Diklat</th>
                                        <th>Jadwal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                        <?php if (!empty($diklat)) : foreach ($diklat as $dk) : ?>
                                                                        <tr class="row-diklat" data-jenis-id="<?= $dk->jenis_diklat_id ?>">
                                                                            <td><?= $dk->id ?></td>
                                                                            <td><?= $dk->nama_diklat ?></td>
                                                                                <td>
                                                                                    <?php if (!empty($dk->jadwal_list)) : ?>
                                                                                        <ul class="mb-0 ps-3">
                                                                                            <?php foreach ($dk->jadwal_list as $jadwal) : ?>
                                                                                                                                                                                                <li>
                                                                                                                                                                                                    <?php if (isset($jadwal->pelaksanaan_mulai) && isset($jadwal->pelaksanaan_selesai)) : ?>
                                                                                                                                                                                                        <b>Pelaksanaan:</b> <?= date('d-m-Y', strtotime($jadwal->pelaksanaan_mulai)) ?> s/d <?= date('d-m-Y', strtotime($jadwal->pelaksanaan_selesai)) ?><br>
                                                                                                                                                                                                    <?php endif; ?>
                                                                                                                                                                                                    <?php if (isset($jadwal->pendaftaran_mulai) && isset($jadwal->pendaftaran_selesai)) : ?>
                                                                                                                                                                                                        <b>Pendaftaran:</b> <?= date('d-m-Y', strtotime($jadwal->pendaftaran_mulai)) ?> - <?= date('d-m-Y', strtotime($jadwal->pendaftaran_selesai)) ?>
                                                                                                                                                                                                    <?php endif; ?>
                                                                                                                                                                                                    <?php if (empty($jadwal->pelaksanaan_mulai) && empty($jadwal->pendaftaran_mulai)) : ?>
                                                                                                                                                                                                        -
                                                                                                                                                                                                    <?php endif; ?>
                                                                                                                                                                                                </li>
                                                                                            <?php endforeach; ?>
                                                                                        </ul>
                                                                                    <?php else : ?>
                                                                                        -
                                                                                    <?php endif; ?>
                                                                                </td>
                                                                                <td>
                                                                                        <a href="<?= site_url('admin/delete_diklat/'.$dk->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus diklat ini?')">Hapus</a>
                                                                                </td>
                                                                        </tr>
                                                                        <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                            <!-- Modal Tambah Diklat -->
                            <div class="modal fade" id="modalTambahDiklat" tabindex="-1" aria-labelledby="modalTambahDiklatLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form method="post" action="<?= site_url('admin/tambah_diklat') ?>">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modalTambahDiklatLabel">Tambah Diklat</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="mb-2">
                                        <label>Nama Diklat</label>
                                        <input type="text" name="nama_diklat" class="form-control" required>
                                      </div>
                                      <div class="mb-2">
                                        <label>Jadwal</label>
                                        <input type="text" name="jadwal" class="form-control" required placeholder="Contoh: 2025-08-11 s/d 2025-08-15">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pendaftaran" role="tabpanel">
                            <h5>Pendaftaran</h5>
                            <p>Fitur pendaftaran akan ditambahkan di sini.</p>
                        </div>
                        <div class="tab-pane fade" id="laporan" role="tabpanel">
                            <h5>Laporan</h5>
                            <p>Fitur laporan akan ditambahkan di sini.</p>
                        </div>
                        <div class="tab-pane fade" id="kuesioner" role="tabpanel">
                            <h5>Kuesioner</h5>
                            <p>Fitur kuesioner akan ditambahkan di sini.</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('logoutBtn').addEventListener('click', function(e) {
    e.preventDefault();
    if (confirm('Apakah Anda yakin ingin logout?')) {
        window.location.href = this.href;
    }
});
</script>
<script>
function filterJenisDiklatTable() {
    var select = document.getElementById('filterJenisDiklat');
    var val = select.value;
    var rows = document.querySelectorAll('.row-diklat');
    rows.forEach(function(row) {
        if (!val || row.getAttribute('data-jenis-id') === val) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>
</body>
</html>
