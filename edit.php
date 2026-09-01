<?php
require_once 'config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $conn->real_escape_string($_POST['nama']);
    $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);
    $pendidikan = $conn->real_escape_string($_POST['pendidikan_terakhir']);
    $usia = (int)$_POST['usia'];

    $sql = "UPDATE pegawai SET nama='$nama', jenis_kelamin='$jenis_kelamin', pendidikan_terakhir='$pendidikan', usia=$usia WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: pegawai.php?msg=saved");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}

// Fetch current data
$result = $conn->query("SELECT * FROM pegawai WHERE id=$id");
if($result->num_rows == 0) {
    header("Location: pegawai.php");
    exit;
}
$data = $result->fetch_assoc();

include 'includes/header.php';
?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 class="card-title">Edit Data Pegawai</h2>
    
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required value="<?= htmlspecialchars($data['nama']) ?>">
        </div>
        
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <select name="pendidikan_terakhir" class="form-control" required>
                <option value="SMA" <?= $data['pendidikan_terakhir'] == 'SMA' ? 'selected' : '' ?>>SMA/SMK Sederajat</option>
                <option value="D3" <?= $data['pendidikan_terakhir'] == 'D3' ? 'selected' : '' ?>>Diploma (D3)</option>
                <option value="S1" <?= $data['pendidikan_terakhir'] == 'S1' ? 'selected' : '' ?>>Sarjana (S1)</option>
                <option value="S2" <?= $data['pendidikan_terakhir'] == 'S2' ? 'selected' : '' ?>>Magister (S2)</option>
                <option value="S3" <?= $data['pendidikan_terakhir'] == 'S3' ? 'selected' : '' ?>>Doktor (S3)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Usia (Tahun)</label>
            <input type="number" name="usia" class="form-control" required min="18" max="70" value="<?= $data['usia'] ?>">
        </div>

        <div class="form-group" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save"></i> Update Data</button>
            <a href="pegawai.php" class="btn" style="width: 100%; text-align: center; margin-top: 10px; color: var(--text-muted);">Batal</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
