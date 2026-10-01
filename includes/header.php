<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT YOI CODE - Data Pegawai</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>PT YOI CODE</h3>
            <a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
            <a href="pegawai.php" class="<?= in_array(basename($_SERVER['PHP_SELF']), ['pegawai.php', 'tambah.php', 'edit.php']) ? 'active' : '' ?>">
                <i class="fas fa-users"></i> Data Pegawai
            </a>
            <a href="logout.php" id="logout-btn" style="margin-top: auto; color: #ff6b6b;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.getElementById('logout-btn');
            if(logoutBtn) {
                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Yakin ingin keluar?',
                        text: "Anda harus login kembali untuk masuk ke sistem.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ff6b6b',
                        cancelButtonColor: '#8a8a97',
                        confirmButtonText: 'Ya, Logout',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = this.href;
                        }
                    });
                });
            }
        });
        </script>
        
        <!-- Main Content -->
        <div class="main-content">
