<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    $angkatan = $_POST["angkatan"];
    $alamat = $_POST["alamat"];

    $query = "UPDATE users SET nim='$nim', nama='$nama', email='$email', jurusan='$jurusan', angkatan=$angkatan, alamat='$alamat' WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
