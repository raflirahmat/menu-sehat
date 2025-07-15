<!DOCTYPE html>
<html>
<head>
    <title>Login Menu Sehat</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/menu_sehat.css') ?>">
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if($this->session->flashdata('error')): ?>
            <div class="error"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('auth/do_login') ?>">
            <label>Username:</label><br>
            <input type="text" name="username" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="<?= site_url('auth/register') ?>">Register</a></p>

    </div>
</body>
</html>
