<?php
include 'koneksi.php'; // Sambungkan dengan database

// Ambil data dari tabel tb_pengajuan_lpj
$query = "SELECT no_pengajuan, waktu_pengajuan, status FROM tb_pengajuan_lpj";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- External CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f7f7f7;
        }
        .status-container {
            max-width: 600px;
            margin: 0 auto;
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
    </style>
</head>
<body>

    <div class="status-container">
        <h1 class="text-center">STATUS</h1>

        <?php
        // Loop untuk menampilkan setiap data pengajuan
        while ($row = mysqli_fetch_assoc($result)) {
            $no_pengajuan = $row['no_pengajuan'];
            $waktu_pengajuan = date('d/m/Y', strtotime($row['waktu_pengajuan']));
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
        ?>

        <div class="status-card" 
             onclick="<?php if ($status_pengajuan == 'Approved') { echo "window.location.href='next_step.php?no_pengajuan=$no_pengajuan'"; } ?>">
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
                <a href="next_step.php?no_pengajuan=<?= $no_pengajuan ?>" class="step-berikutnya">Step Berikutnya</a>
            <?php } ?>
        </div>

        <?php } // Tutup loop ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
