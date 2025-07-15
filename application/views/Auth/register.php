<!DOCTYPE html>
<html>
<head>
    <title>Register Akun Baru</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/menu_sehat.css') ?>">
</head>
<body>
    <div class="register-box">
        <h2>Register</h2>
        <?php if($this->session->flashdata('error')): ?>
            <div class="error"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('success')): ?>
            <div class="success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('auth/do_register') ?>">
            <label>Username:</label><br>
            <input type="text" name="username" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br>
            <label>Ulangi Password:</label><br>
            <input type="password" name="password2" required><br><br>
            <button type="submit">Register</button>
        </form>
        <p>Sudah punya akun? <a href="<?= site_url('auth/login') ?>">Login</a></p>
    </div>
</body>
</html>
