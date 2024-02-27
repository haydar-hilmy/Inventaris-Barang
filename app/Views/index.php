<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a502a8bc22.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <link rel="shortcut icon" href="assets/img/goods.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
    <title>App - Login</title>
</head>

<body>

    <div class="all-content">
        <form method="post">
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
                <p><?php if(isset($salah_password)){echo "Username atau Password tidak ditemukan";} ?></p>
            </div>

            <div>
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>

</body>

</html>