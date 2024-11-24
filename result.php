<?php
session_start();
if (!isset($_SESSION['data'])) {
    header("Location: form.php");
    exit();
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Data Pendaftaran</h1>
        <table border="1" cellpadding="10">
            <tr><th>Field</th><th>Value</th></tr>
            <tr><td>Nama</td><td><?= htmlspecialchars($data['username']) ?></td></tr>
            <tr><td>Email</td><td><?= htmlspecialchars($data['email']) ?></td></tr>
            <tr><td>Password</td><td><?= htmlspecialchars($data['password']) ?></td></tr>
            <tr><td>Tanggal Lahir</td><td><?= htmlspecialchars($data['dob']) ?></td></tr>
            <tr><td>Browser</td><td><?= htmlspecialchars($data['browser']) ?></td></tr>
        </table>

        <h2>Isi File:</h2>
        <table border="1" cellpadding="10">
            <?php foreach ($data['fileRows'] as $line): ?>
                <tr><td><?= htmlspecialchars($line) ?></td></tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
<?php
// Bersihkan session setelah data ditampilkan
session_unset();
session_destroy();
?>