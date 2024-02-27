<?= $this->extend('template/login/main') ?>


<?= $this->section('content') ?>

<div class="all-content">
    <form action="login/auth" method="post">
        <h2>Login</h2>
        <div>
            <input placeholder="Username" autofocus autocomplete="on" type="text" id="username" name="username">
            <label for="username">Username</label>
        </div>

        <div>
            <input placeholder="Password" type="password" id="password" name="password">
            <label for="password">Password</label>
        </div>

        <div>
            <p><?php if (isset($salah_password)) {
                    echo "Username atau Password tidak ditemukan";
                } ?></p>
        </div>

        <div>
            <button type="submit" name="login">Login</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>