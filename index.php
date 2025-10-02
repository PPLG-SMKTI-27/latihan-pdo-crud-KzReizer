<?php
require_once "dokter.php";

$dokter = new Dokter();

// Create
if(isset($_POST['tambah'])) {
    $dokter->tambah($_POST['nama'], $_POST['spesialisasi'], $_POST['jam_praktik']);
    header("Location: index.php");
}

// Update
if(isset($_POST['ubah'])) {
    $dokter->ubah($_POST['id_dokter'], $_POST['nama'], $_POST['spesialisasi'], $_POST['jam_praktik']);
    header("Location: index.php");
}

// Delete
if(isset($_GET['hapus'])) {
    $dokter->hapus($_GET['hapus']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Dokter</title>
</head>
<body>
    <h2>Data Dokter</h2>

    <!-- Form Tambah -->
    <form method="post">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="spesialisasi" placeholder="Spesialisasi" required>
        <input type="text" name="jam_praktik" placeholder="Jam Praktik (08:00-12:00)" required>
        <button type="submit" name="tambah">Tambah</button>
    </form>

    <br><hr><br>

    <!-- Tabel Data -->
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th><th>Nama</th><th>Spesialisasi</th><th>Jam Praktik</th><th>Aksi</th>
        </tr>
        <?php
        $data = $dokter->tampil();
        while($row = $data->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$row['id_dokter']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['spesialisasi']}</td>
                <td>{$row['jam_praktik']}</td>
                <td>
                    <form method='post' style='display:inline-block'>
                        <input type='hidden' name='id_dokter' value='{$row['id_dokter']}'>
                        <input type='text' name='nama' value='{$row['nama']}' required>
                        <input type='text' name='spesialisasi' value='{$row['spesialisasi']}' required>
                        <input type='text' name='jam_praktik' value='{$row['jam_praktik']}' required>
                        <button type='submit' name='ubah'>Ubah</button>
                    </form>
                    <a href='index.php?hapus={$row['id_dokter']}' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
