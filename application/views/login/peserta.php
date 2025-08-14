<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Login Peserta Diklat</h4>
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
                    <?php endif; ?>
                    <form method="post" action="<?= site_url('login/proses_peserta') ?>">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username / Email / No HP</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password / Tanggal Lahir</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
