<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Akun</title>
    <link rel="stylesheet" href="admin3.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Akun Baru</h3>
    </header>

    <form action="proses-pendaftaran.php" method="POST">

        <fieldset>
            <p>
                <label for="name">Nama: </label>
                <input type="text" name="name" placeholder="Nama Lengkap" />
            </p>
            <p>
                <label for="email">Email: </label>
                <input type="email" name="email" placeholder="Email">
            </p>
            <p>
                <label for="telp">No. Telfon: </label>
                <input type="number" name="telp" placeholder="Number Telephone">
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="text" name="password" placeholder="Password">
            </p>
            <button class="submit-button" type="submit" value="Daftar" name="daftar">Daftar</button>
        </fieldset>
    </form>
            <p>
                <button class="back">
                    <a href="admin.php">Back</a>
                </button>
            </p>
    </body>
</html>