<!DOCTYPE html>
<html>
<head>
    <title>Daftar Menu Harian</title>
      <link rel="stylesheet" href="<?= base_url('assets/css/menu_sehat.css') ?>">
</head>
<body>
    <div class="topbar">
    <div class="topbar-user">
        👤 <?= $this->session->userdata('username'); ?>
    </div>
    <a href="<?= site_url('logout') ?>" class="logout-btn">Logout</a>
</div>
    <h2>Daftar Menu Harian</h2>
    <a href="<?= site_url('daily_menu/create') ?>">Tambah Menu Harian</a>
    <table>
    <tr>
        <th>ID</th>
        <th>Menu</th>
        <th>Kalori</th>
        <th>Hari</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($daily_menus as $dm): ?>
    <tr>
        <td><?= $dm->id ?></td>
        <td><?= htmlspecialchars($dm->menu_name) ?></td>
        <td><?= $dm->calories ?></td>
        <td><?= htmlspecialchars($dm->day) ?></td>
        <td>
            <a href="<?= site_url('daily_menu/delete/'.$dm->id) ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
