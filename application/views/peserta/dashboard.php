<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-end mb-2">
        <a href="<?= site_url('login/logout') ?>" class="btn btn-danger btn-sm">Logout</a>
    </div>
    <h2 class="mb-4">Dashboard Peserta</h2>
    <h4>Selamat datang, <?= $this->session->userdata('nama') ?>!</h4>
    <div class="mb-4">
        <a href="<?= site_url('pendaftaran_new') ?>" class="btn btn-primary">Pendaftaran Diklat</a>
    </div>
    <!-- Tambahkan info lain sesuai kebutuhan peserta -->
</div>
</body>
</html>
<!-- Dashboard peserta dihapus sesuai permintaan -->
