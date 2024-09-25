<!-- KONEKSI -->
<?php include 'koneksi.php'; ?>
<!-- LOADER -->
<?php include 'loader.php'; ?>
<!-- NAVBAR -->
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hompage Page</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="style/style.css"/>
</head>

<style>
    /* General styles */
    .count-box {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }

    /* Applying the SVG wave effect as a background */
    .count-box::before,
    .count-box::after {
        content: '';
        position: absolute;
        bottom: 50%;
        left: 50%;
        width: 320%;
        /* Ukuran tetap */
        height: 320%;
        /* Tinggi tetap */
        border-radius: 75% 50% 45% 50%;
        /* Bentuk gelombang tetap */
        transform: translate(-50%, 0);
        box-shadow: 0 0 0 33vw rgba(84, 202, 255, 0.6);
        /* Besar shadow tetap */
        animation: sway 3s infinite ease-in-out;
        /* Durasi tetap */
        z-index: 0;
    }

    .count-box::after {
        border-radius: 45% 50% 50% 55%;
        /* Variasi bentuk gelombang tetap */
        animation: sway 4s infinite ease-in-out reverse;
    }

    @keyframes sway {
        0% {
            transform: translate(-50%, 3px) translateX(50px);
            /* Turun sedikit, hanya 3px */
        }

        50% {
            transform: translate(-50%, -10px) translateX(-50px);
            /* Naik sedikit, hanya -10px */
        }

        100% {
            transform: translate(-50%, 3px) translateX(50px);
            /* Kembali turun sedikit */
        }
    }


    .count-box-content {
        position: relative;
        z-index: 1;
    }

    /* Style the inner content */
    .count-box h4,
    .count-box h5 {
        z-index: 1;
        position: relative;
    }

    /* For each specific box, you can define colors like this */
    .bg-success {
        background-color: rgba(40, 167, 69, 0.8);
        /* Slight opacity */
    }

    .bg-primary {
        background-color: rgba(0, 123, 255, 0.8);
        /* Slight opacity */
    }

    .bg-danger {
        background-color: rgba(220, 53, 69, 0.8);
        /* Slight opacity */
    }


    .status-pending {
        color: grey !important;
        font-weight: 700;
    }

    .status-approved {
        color: green !important;
        font-weight: 700;
    }

    .status-rejected {
        color: red !important;
        font-weight: 700;
    }

    /* Responsive table for mobile view */
    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
            /* Membuat tabel dapat di-scroll ke samping */
            -webkit-overflow-scrolling: touch;
            /* Memastikan scroll halus pada perangkat iOS */
        }

        .table thead,
        .table tbody {
            white-space: nowrap;
            /* Membuat kolom tidak wrap ke bawah, tetap satu baris */
        }
    }

    thead {
        background-color: black;
        /* Warna latar belakang hitam */
        color: white;
        /* Warna teks putih */
    }

    /* Warna default untuk tab yang tidak aktif */
    .nav-link {
        color: black !important;
        /* Tidak aktif menjadi hitam */
        transition: color 0.3s ease;
    }

    /* Warna tab saat di-hover */
    .nav-link:hover {
        color: blue !important;
        /* Hover berubah jadi biru */
    }

    /* Warna tab yang aktif */
    .nav-link.active {
        color: blue !important;
        /* Aktif menjadi biru */
}
</style>

<?php
// Query untuk menghitung jumlah pengajuan dengan status 'Pending'
$query_pending = "SELECT COUNT(*) AS total_pending FROM tb_pengajuan_lpj WHERE status = 'Pending'";
$result_pending = mysqli_query($koneksi, $query_pending);
$row_pending = mysqli_fetch_assoc($result_pending);
$total_pending = $row_pending['total_pending'];

// Query untuk menghitung jumlah pengajuan dengan status 'Approved'
$query_approved = "SELECT COUNT(*) AS total_approved FROM tb_pengajuan_lpj WHERE status = 'Approved'";
$result_approved = mysqli_query($koneksi, $query_approved);
$row_approved = mysqli_fetch_assoc($result_approved);
$total_approved = $row_approved['total_approved'];

// Query untuk menghitung jumlah pengajuan dengan status 'Rejected'
$query_rejected = "SELECT COUNT(*) AS total_rejected FROM tb_pengajuan_lpj WHERE status = 'Rejected'";
$result_rejected = mysqli_query($koneksi, $query_rejected);
$row_rejected = mysqli_fetch_assoc($result_rejected);
$total_rejected = $row_rejected['total_rejected'];
?>


<body>


    <!-- Dashboard -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h1>Dashboard</h1>
            <a href="buat_pengajuan.html" class="btn btn-primary">
                Buat Pengajuan&nbsp;<i class="fas fa-plus"></i>
            </a>
        </div>

        <!-- Banner Image -->
        <div class="my-3">
            <img src="./assets/grafikdata.jpg" class="img-fluid" style="width: 100%; max-height: 300px; object-fit: cover;" alt="Dashboard Image">
        </div>

        <div class="row text-center mt-5 mb-5">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="p-4 bg-success text-white rounded count-box">
                    <div class="count-box-content">
                        <h4>PENGAJUAN DIPROSES</h4>
                        <hr>
                        <h5 class="count" data-target="<?php echo $total_pending; ?>">0</h5> <!-- Angka akan mulai dari 0 -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="p-4 bg-primary text-white rounded count-box">
                    <div class="count-box-content">
                        <h4>PENGAJUAN DITERIMA</h4>
                        <hr>
                        <h5 class="count" data-target="<?php echo $total_approved; ?>">0</h5> <!-- Angka akan mulai dari 0 -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="p-4 bg-danger text-white rounded count-box">
                    <div class="count-box-content">
                        <h4>PENGAJUAN DITOLAK</h4>
                        <hr>
                        <h5 class="count" data-target="<?php echo $total_rejected; ?>">0</h5> <!-- Angka akan mulai dari 0 -->
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery Script for Count Up Animation -->
        <script>
            $(document).ready(function() {
                // Function to count up to the target number
                $('.count').each(function() {
                    var $this = $(this);
                    var target = parseInt($this.attr('data-target')); // Get the target number
                    var count = 0;
                    var speed = 500; // Adjust speed (in ms)

                    // Create a function to increment the number
                    var increment = setInterval(function() {
                        count++;
                        $this.text(count);

                        // Stop the interval once the count reaches the target
                        if (count >= target) {
                            clearInterval(increment);
                        }
                    }, speed);
                });
            });
        </script>

        <!-- Ringkasan -->
        <div class="mt-5">
            <h1>Ringkasan</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="riwayat-tab" data-bs-toggle="tab" data-bs-target="#riwayat" type="button" role="tab" aria-controls="riwayat" aria-selected="true">RIWAYAT PENGAJUAN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="diproses-tab" data-bs-toggle="tab" data-bs-target="#diproses" type="button" role="tab" aria-controls="diproses" aria-selected="false">PELAPORAN DIPROSES</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-3" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                    <!-- Data for Riwayat Pelaporan -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NO&nbsp;PENGAJUAN</th>
                                    <th>NAMA&nbsp;PEMOHON</th>
                                    <th>NIP</th>
                                    <th>NO&nbsp;TELP</th>
                                    <th>EMAIL</th>
                                    <th>TANGGAL&nbsp;KEGIATAN</th>
                                    <th>TANGGAL&nbsp;KEGIATAN&nbsp;SELESAI</th>
                                    <th>KEGIATAN</th>
                                    <th>URAIAN&nbsp;KEGIATAN</th>
                                    <th>STATUS</th>
                                    <th>WAKTU&nbsp;PENGAJUAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM tb_pengajuan_lpj ORDER BY waktu_pengajuan DESC";
                                $result = mysqli_query($koneksi, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $no = 1;

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $no++ . '</td>';
                                        echo '<td>' . htmlspecialchars($row['no_pengajuan']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['nama_pemohon']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['nip']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['no_telp']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['tgl_kegiatan']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['tgl_kegiatan_selesai']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['kegiatan']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['uraian_kegiatan']) . '</td>';
                                        echo '<td class="';

                                        // Menentukan kelas berdasarkan status
                                        if (trim($row['status']) == 'Pending') {
                                            echo 'status-pending';
                                        } elseif (trim($row['status']) == 'Approved') {
                                            echo 'status-approved';
                                        } elseif (trim($row['status']) == 'Rejected') {
                                            echo 'status-rejected';
                                        }
                                        echo '">' . htmlspecialchars($row['status']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['waktu_pengajuan']) . '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="12">Tidak ada data pengajuan ditemukan.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade p-3" id="diproses" role="tabpanel" aria-labelledby="diproses-tab">
                    <!-- Data for Pelaporan Diproses -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul Pelaporan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Populate dynamically with PHP/JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>

</html>