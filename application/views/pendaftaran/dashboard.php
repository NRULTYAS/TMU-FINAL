<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-end mb-2">
        <a href="<?= site_url('login/logout') ?>" class="btn btn-danger btn-sm">Logout</a>
    </div>
    <h2 class="mb-4">Dashboard Pendaftar</h2>
    <h4>Data Pendaftaran Diklat Anda</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Diklat</th>
                <th>Status</th>
                <th>Persyaratan</th>
                <th>Upload</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($pendaftaran)) : foreach ($pendaftaran as $row) : ?>
            <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->nama_diklat ?></td>
                <td><?= $row->status_pendaftaran ?></td>
                <td>
                    <ul>
                    <?php if (!empty($persyaratan[$row->id])) : foreach ($persyaratan[$row->id] as $ps) : ?>
                        <li>
                            <?= $ps->persyaratan ?> - <?= $ps->status_validasi ? 'Tervalidasi' : 'Belum' ?>
                            <form action="<?= site_url('pendaftaran/upload_persyaratan') ?>" method="post" enctype="multipart/form-data" style="display:inline-block; margin-left:10px;">
                                <input type="hidden" name="pendaftaran_id" value="<?= $row->id ?>">
                                <input type="hidden" name="persyaratan_id" value="<?= $ps->id ?>">
                                <input type="file" name="berkas" required style="display:inline-block;width:180px;">
                                <button type="submit" class="btn btn-sm btn-success">Upload</button>
                            </form>
                        </li>
                    <?php endforeach; endif; ?>
                    </ul>
                </td>
            </tr>
        <?php endforeach; else: ?>
            <tr><td colspan="5" class="text-center">Tidak ada data</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<!-- Dashboard pendaftar dihapus sesuai permintaan -->
