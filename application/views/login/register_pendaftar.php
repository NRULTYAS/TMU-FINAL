<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-sm p-4" style="width: 450px;">
        <h4 class="text-center mb-4 text-primary">Registrasi Pendaftar</h4>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('login/proses_register_pendaftar') ?>" autocomplete="on">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="alert alert-info py-2" style="font-size:14px;">Password default untuk akun pendaftar adalah <b>123</b></div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <a href="<?= site_url('login_user') ?>" class="btn btn-link">Kembali ke Login</a>
        </div>
    </div>
</div>
</body>
</html>
