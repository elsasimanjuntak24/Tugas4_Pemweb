<?php
session_start();

// Validasi input teks
$errors = [];
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'];
$dob = $_POST['dob'];

if (!$username || strlen($username) < 3 || strlen($username) > 50) {
    $errors[] = "Nama harus antara 3-50 karakter.";
}

if (!$email) {
    $errors[] = "Email tidak valid.";
}

if (strlen($password) < 6) {
    $errors[] = "Password minimal 6 karakter.";
}

if (empty($dob)) {
    $errors[] = "Tanggal lahir tidak boleh kosong.";
}

// Validasi file upload
if (isset($_FILES['textfile']) && $_FILES['textfile']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['textfile']['tmp_name'];
    $fileSize = $_FILES['textfile']['size'];
    $fileType = mime_content_type($fileTmpPath);

    if ($fileSize > 2 * 1024 * 1024) {
        $errors[] = "Ukuran file maksimal 2MB.";
    }

    if ($fileType !== 'text/plain') {
        $errors[] = "Hanya file teks (.txt) yang diizinkan.";
    }

    if (empty($errors)) {
        $fileContents = file_get_contents($fileTmpPath);
        $fileRows = explode(PHP_EOL, $fileContents);
    }
} else {
    $errors[] = "File teks tidak diunggah.";
}

// Jika ada error, simpan ke session dan redirect kembali ke form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: form.php");
    exit();
}

// Simpan data ke session untuk ditampilkan di result.php
$_SESSION['data'] = [
    'username' => $username,
    'email' => $email,
    'password' => $password,
    'dob' => $dob,
    'browser' => $_SERVER['HTTP_USER_AGENT'],
    'fileRows' => $fileRows ?? []
];

// Redirect ke result.php
header("Location: result.php");
exit();
?>