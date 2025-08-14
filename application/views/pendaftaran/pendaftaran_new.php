
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Baru - Dashboard Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: #f5f6fa; }
        .card { border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .nav-tabs .nav-link.active { background: #1976d2; color: #fff !important; }
        .info-label { font-size: 0.85rem; color: #6c757d; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-value { font-size: 1.1rem; font-weight: 600; color: #2c3e50; }
    </style>
</head>
<body>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Diklat Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-end mb-2">
        <a href="<?= site_url('login/logout') ?>" class="btn btn-danger btn-sm">Logout</a>
    </div>
    <h2 class="mb-4">Pendaftaran Diklat Peserta</h2>
    <form method="post" action="<?php echo site_url('login/proses_peserta'); ?>">
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No. Telepon</label>
            <input type="tel" class="form-control" id="no_telepon" name="no_telepon" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
            <select class="form-select" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                <option value="">-- Pilih Pendidikan --</option>
                <option value="SMA/SMK">SMA/SMK</option>
                <option value="D1">Diploma 1</option>
                <option value="D2">Diploma 2</option>
                <option value="D3">Diploma 3</option>
                <option value="D4/S1">Diploma 4 / Sarjana</option>
                <option value="S2">Magister</option>
                <option value="S3">Doktor</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
        </div>
        <div class="mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agreement" name="agreement" required>
                <label class="form-check-label" for="agreement">
                    Saya menyetujui syarat dan ketentuan yang berlaku. <span class="text-danger">*</span>
                </label>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="javascript:history.back()" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-paper-plane me-2"></i>Daftar Sekarang
            </button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
