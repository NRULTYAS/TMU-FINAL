<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <?php if (isset($this) && $this->session->flashdata('error')): ?>
        <div class="alert alert-danger w-100 text-center mb-3"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    <?php if (isset($this) && $this->session->flashdata('success')): ?>
        <div class="alert alert-success w-100 text-center mb-3"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h4 class="text-center mb-4 text-primary">Registrasi User (Admin/Operator)</h4>
        <form method="post" action="<?= site_url('login/proses_register_user') ?>" autocomplete="on">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" id="nip" name="nip" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Role</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="A">Admin</option>
                    <option value="OL">Operator Loket</option>
                    <option value="OK">Operator Kesehatan</option>
                    <option value="OP">Operator Pelatihan</option>
                    <option value="OA">Operator Akademik</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>
    </div>
</div>
</body>
</html>
