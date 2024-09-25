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
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <?php
    include 'koneksi.php'; // Koneksi ke database

    // Dapatkan no_pengajuan pengajuan dari URL
    $no_pengajuan = $_GET['no_pengajuan'];

    // Pastikan koneksi ke database berhasil
    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Ambil data pengajuan dari database
    $query = "SELECT * FROM tb_pengajuan_lpj WHERE no_pengajuan='$no_pengajuan'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $pengajuan = mysqli_fetch_assoc($result);

    // Periksa apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['approve'])) {
            // Update status menjadi 'Approved'
            $update_query = "UPDATE tb_pengajuan_lpj SET status='Approved' WHERE no_pengajuan='$no_pengajuan'";
            if (mysqli_query($koneksi, $update_query)) {
                echo "Pengajuan telah disetujui.";
            } else {
                echo "Error updating record: " . mysqli_error($koneksi);
            }
        } elseif (isset($_POST['reject'])) {
            // Update status menjadi 'Rejected'
            $update_query = "UPDATE tb_pengajuan_lpj SET status='Rejected' WHERE no_pengajuan='$no_pengajuan'";
            if (mysqli_query($koneksi, $update_query)) {
                echo "Pengajuan telah ditolak.";
            } else {
                echo "Error updating record: " . mysqli_error($koneksi);
            }
        }
        exit;
    }
    ?>


    <h1>Detail Pengajuan</h1>
    <p><strong>NIP:</strong> <?php echo $pengajuan['nip']; ?></p>
    <p><strong>Nama:</strong> <?php echo $pengajuan['nama_pemohon']; ?></p> <!-- Perhatikan nama kolomnya sesuai dengan database -->
    <p><strong>Email:</strong> <?php echo $pengajuan['email']; ?></p>
    <p><strong>No Telp:</strong> <?php echo $pengajuan['no_telp']; ?></p>

    <form method="post">
        <button type="submit" name="approve" style="background-color: #007BFF; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Approve</button>
        <button type="submit" name="reject" style="background-color: #FF0000; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Reject</button>
    </form>
</body>

</html>

<!-- Footer -->
<?php include 'footer.php'; ?>

</body>

</html>