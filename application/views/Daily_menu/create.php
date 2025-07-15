<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu Harian</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/menu_sehat.css') ?>">
</head>
<body>
    <h2>Tambah Menu Harian</h2>
    <form method="post" action="<?= site_url('daily_menu/store') ?>">
        Menu:
        <select name="menu_id" required>
            <?php foreach($menus as $m): ?>
                <option value="<?= $m->id ?>"><?= htmlspecialchars($m->name) ?> (<?= $m->calories ?> kalori)</option>
            <?php endforeach; ?>
        </select><br>
        Hari:
        <input type="text" name="day" required placeholder="Misal: Monday"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
