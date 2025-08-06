<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Pendaftar</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>NIP</th>
                <th>Username</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pendaftar_list)): ?>
                <?php foreach ($pendaftar_list as $pendaftar): ?>
                    <tr>
                        <td><?= htmlspecialchars($pendaftar->id) ?></td>
                        <td><?= htmlspecialchars($pendaftar->nama_lengkap) ?></td>
                        <td><?= htmlspecialchars($pendaftar->nip) ?></td>
                        <td><?= htmlspecialchars($pendaftar->username) ?></td>
                        <td><?= htmlspecialchars($pendaftar->created_at ?? '-') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">Tidak ada data pendaftar.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
