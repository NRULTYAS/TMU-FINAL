<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Operator Loket</title>
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
        <span class="navbar-brand fw-bold text-primary">Dashboard Operator Loket</span>
        <div class="d-flex ms-auto">
            <a href="#" id="logoutBtn" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>
</nav>
<div class="container mt-5">
</div>
<script>
    document.getElementById('logoutBtn').addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Apakah Anda yakin ingin keluar?')) {
            window.location.href = '<?= site_url('logout') ?>';
        }
    });
</script>
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="card shadow-lg">
                <div class="card-body text-center" style="background: linear-gradient(90deg, #ffb347 0%, #ffcc33 100%);">
                    <div class="profile-img mb-2">
                        <img src="https://img.icons8.com/ios-filled/100/1976d2/policeman-male.png" alt="Operator">
                    </div>
                    <h5 class="mb-0">Login as :</h5>
                    <h3 class="fw-bold">Operator Loket</h3>
                </div>
                <div class="card-body">
                    <h5 class="mb-4">Data Pendaftaran Diklat</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pendaftar</th>
                                <th>Diklat</th>
                                <th>Status</th>
                                <th>Persyaratan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($pendaftaran)) : foreach ($pendaftaran as $row) : ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->nama_pendaftar ?></td>
                                <td><?= $row->nama_diklat ?></td>
                                <td><?= $row->status_pendaftaran ?></td>
                                <td>
                                    <ul class="mb-0">
                                    <?php if (!empty($persyaratan[$row->id])) : foreach ($persyaratan[$row->id] as $ps) : ?>
                                        <li>
                                            <?= $ps->persyaratan ?> -
                                            <?php if ($ps->status_validasi) : ?>
                                                <span class="badge bg-success">Tervalidasi</span>
                                            <?php else : ?>
                                                <span class="badge bg-warning text-dark">Belum Validasi</span>
                                                <a href="<?= site_url('operator/validasi_persyaratan/'.$ps->id) ?>" class="btn btn-success btn-sm ms-2">Validasi</a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; endif; ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end bg-white">
                    <button class="btn btn-success">Hubungi Admin</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
