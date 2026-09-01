<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $conn->real_escape_string($_POST['nama']);
    $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);
    $pendidikan = $conn->real_escape_string($_POST['pendidikan_terakhir']);
    $usia = (int)$_POST['usia'];

    $sql = "INSERT INTO pegawai (nama, jenis_kelamin, pendidikan_terakhir, usia) VALUES ('$nama', '$jenis_kelamin', '$pendidikan', $usia)";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: pegawai.php?msg=saved");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}

include 'includes/header.php';
?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 class="card-title">Tambah Data Pegawai</h2>
    
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama lengkap">
        </div>
        
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <select name="pendidikan_terakhir" class="form-control" required>
                <option value="">Pilih Pendidikan</option>
                <option value="SMA">SMA/SMK Sederajat</option>
                <option value="D3">Diploma (D3)</option>
                <option value="S1">Sarjana (S1)</option>
                <option value="S2">Magister (S2)</option>
                <option value="S3">Doktor (S3)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Usia (Tahun)</label>
            <input type="number" name="usia" class="form-control" required min="18" max="70" placeholder="Masukkan usia">
        </div>

        <div class="form-group" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save"></i> Simpan Data</button>
            <a href="pegawai.php" class="btn" style="width: 100%; text-align: center; margin-top: 10px; color: var(--text-muted);">Batal</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
