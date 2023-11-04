<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <?php
    include 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
    ?>
    <form action="update_process.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
    <table>
        <tr>
            <td><label for="nim">NIM:</label></td>
            <td><input type="text" id="nim" name="nim" value="<?php echo $row["nim"]; ?>" required></td>
        </tr>
        <tr>
            <td><label for="nama">Nama:</label></td>
            <td><input type="text" id="nama" name="nama" value="<?php echo $row["nama"]; ?>" required></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>" required></td>
        </tr>
        <tr>
            <td><label for="jurusan">Jurusan:</label></td>
            <td><input type="text" id="jurusan" name="jurusan" value="<?php echo $row["jurusan"]; ?>"></td>
        </tr>
        <tr>
            <td><label for="angkatan">Angkatan:</label></td>
            <td><input type="text" id="angkatan" name="angkatan" value="<?php echo $row["angkatan"]; ?>"></td>
        </tr>
        <tr>
            <td><label for="alamat">Alamat:</label></td>
            <td><textarea id="alamat" name="alamat"><?php echo $row["alamat"]; ?></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="Simpan Perubahan">
</form>

    <?php
        } else {
            echo "Data tidak ditemukan.";
        }
    } else {
        echo "Permintaan tidak valid.";
    }
    ?>
</body>
</html>
