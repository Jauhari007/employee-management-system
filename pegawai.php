<?php
require_once 'config.php';
include 'includes/header.php';
?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 class="card-title" style="margin: 0;">Data Pegawai</h2>
        <a href="tambah.php" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pegawai</a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                    <th>Usia</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM pegawai ORDER BY id DESC");
                $no = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['jenis_kelamin']}</td>
                            <td>{$row['pendidikan_terakhir']}</td>
                            <td>{$row['usia']} Tahun</td>
                            <td>
                                <div class='action-btns'>
                                    <a href='edit.php?id={$row['id']}' class='btn btn-success btn-sm'><i class='fas fa-edit'></i> Edit</a>
                                    <button class='btn btn-danger btn-sm' onclick='hapusData({$row['id']})'><i class='fas fa-trash'></i> Hapus</button>
                                </div>
                            </td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center;'>Data pegawai belum tersedia.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function hapusData(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data pegawai akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f72585',
        cancelButtonColor: '#4361ee',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        background: '#27293d',
        color: '#fff'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'hapus.php?id=' + id;
        }
    })
}

// Show success message if redirected with ?msg=success
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('msg') === 'deleted') {
    Swal.fire({
        title: 'Terhapus!',
        text: 'Data pegawai berhasil dihapus.',
        icon: 'success',
        background: '#27293d',
        color: '#fff',
        confirmButtonColor: '#4361ee'
    });
} else if (urlParams.get('msg') === 'saved') {
    Swal.fire({
        title: 'Berhasil!',
        text: 'Data pegawai berhasil disimpan.',
        icon: 'success',
        background: '#27293d',
        color: '#fff',
        confirmButtonColor: '#4361ee'
    });
}
</script>

<?php include 'includes/footer.php'; ?>
