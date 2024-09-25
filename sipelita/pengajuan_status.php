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
    <title>Pengajuan Page</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="style/style.css" />
</head>
<style>
    body {
        background-color: blue;
    }

    /* For tablets (768px to 991px width) */
    @media (min-width: 768px) and (max-width: 991px) {
        body {
            height: 100vh;
            /* For tablets */
        }
    }

    /* For larger devices (desktops and monitors) */
    @media (min-width: 992px) {
        body {
            height: 130vh;
            /* For monitors */
        }
    }

    .status-container {
        max-width: 700px;
        margin: 0 auto;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .status-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: white;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        cursor: pointer;
    }

    .status-header {
        display: flex;
        align-items: center;
    }

    .icon-status {
        font-size: 30px;
        color: #333;
    }

    .status-info {
        flex-grow: 1;
        margin-left: 20px;
    }

    .status-info p {
        margin: 0;
    }

    .status-info strong {
        display: block;
        font-size: 16px;
    }

    .status-text {
        font-weight: bold;
    }

    .status-pending {
        color: blue;
    }

    .status-approved {
        color: green;
    }

    .status-rejected {
        color: red;
    }

    .step-berikutnya {
        display: block;
        margin-top: 10px;
        color: green;
        font-weight: bold;
    }

    h1.text-center {
        margin-top: 75px;
        margin-bottom: 40px;
    }

    hr {
        border: 3px solid #333;
        margin: 20px 0;
    }
</style>

<body>

    <div class="status-container">
        <h1 class="text-center">STATUS PENGAJUAN</h1>

        <?php
        // Ambil data dari tabel tb_pengajuan_lpj, urutkan berdasarkan waktu_pengajuan terbaru
        $query = "SELECT no_pengajuan, waktu_pengajuan, status FROM tb_pengajuan_lpj ORDER BY waktu_pengajuan DESC";
        $result = mysqli_query($koneksi, $query);

        $last_date = null; // Untuk menyimpan tanggal terakhir yang ditampilkan

        // Loop untuk menampilkan setiap data pengajuan
        while ($row = mysqli_fetch_assoc($result)) {
            $no_pengajuan = $row['no_pengajuan'];
            // Menampilkan tanggal, jam, menit, dan detik
            $waktu_pengajuan = date('d/m/Y H:i:s', strtotime($row['waktu_pengajuan']));
            $tanggal_pengajuan = date('d/m/Y', strtotime($row['waktu_pengajuan'])); // Hanya tanggal
            $status_pengajuan = $row['status'];

            // Tentukan warna dan class status berdasarkan status pengajuan
            switch ($status_pengajuan) {
                case 'Pending':
                    $warna_status = 'status-pending';
                    break;
                case 'Approved':
                    $warna_status = 'status-approved';
                    break;
                case 'Rejected':
                    $warna_status = 'status-rejected';
                    break;
                default:
                    $warna_status = '';
                    break;
            }

            // Jika tanggal pengajuan berbeda dengan tanggal terakhir yang ditampilkan, tampilkan garis pemisah
            if ($last_date != $tanggal_pengajuan) {
                if ($last_date != null) {
                    // Jangan tampilkan <hr> sebelum pengajuan pertama
                    echo "<hr>";
                }
                echo "<h4>Tanggal: $tanggal_pengajuan</h4>";
                $last_date = $tanggal_pengajuan;
            }
        ?>

            <div class="status-card"
                onclick="<?php if ($status_pengajuan == 'Approved') {
                                echo "window.location.href='pelaporan.php?no_pengajuan=$no_pengajuan'";
                            } ?>">
                <div class="status-header">
                    <i class="fas fa-file-alt icon-status"></i> <!-- Icon kertas -->
                    <div class="status-info">
                        <p>Tanggal Pengajuan: <strong><?= $waktu_pengajuan ?></strong></p>
                        <p>No Pengajuan: <strong><?= $no_pengajuan ?></strong></p>
                    </div>
                    <span class="status-text <?= $warna_status ?>"><?= $status_pengajuan ?></span>
                </div>

                <?php if ($status_pengajuan == 'Approved') { ?>
                    <!-- Step Berikutnya muncul di bawah tulisan Approved -->
                    <a href="pelaporan.php?no_pengajuan=<?= $no_pengajuan ?>" class="step-berikutnya">Step Berikutnya</a>
                <?php } ?>
            </div>

        <?php } // Tutup loop 
        ?>
    </div>

    <!-- footer -->
    <?php
    include('footer.php');
    ?>
</body>

</html>