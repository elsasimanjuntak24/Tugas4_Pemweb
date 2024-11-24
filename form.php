<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Form Pendaftaran</h1>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <label for="username">Nama Lengkap:</label>
            <input type="text" id="username" name="username" required minlength="3" maxlength="50">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required minlength="6">

            <label for="dob">Tanggal Lahir:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="textfile">Upload File (Teks):</label>
            <input type="file" id="textfile" name="textfile" accept=".txt" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>