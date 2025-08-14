<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Operator Loket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h4 class="text-center mb-4 text-primary">Login Operator Loket</h4>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo site_url('login/proses_operator'); ?>">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login Operator</button>
        </form>
        <hr>
        <div class="text-center mt-3">
            <span>Belum punya akun operator?</span><br>
            <a href="<?php echo site_url('login/register'); ?>" class="btn btn-outline-success mt-2">
                <i class="bi bi-person-plus"></i> Daftar Akun Operator
            </a>
        </div>
    </div>
</div>
</body>
</html>
