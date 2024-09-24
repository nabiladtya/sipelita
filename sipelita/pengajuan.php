<!-- KONEKSI -->
<?php include 'koneksi.php';?>
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
            /* Set the background image and make it responsive */
            body {
                background-image: url('./assets/backround-form.jpg');
                /* Replace with your image URL */
                background-size: cover;
                /* Ensures the background covers the entire area */
                background-position: center;
                /* Centers the image */
                background-repeat: no-repeat;
                /* Prevents the image from repeating */
                margin: 0;
            }

            /* Default setting for mobile (150vh height) */
            body {
                height: 150vh;
                /* For mobile devices */
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

            /* Ensure the form container stands out */
            .form-container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color:white;
                /* Transparent white background */
                border-radius: 5px;
                box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.5);
                /* Thick shadow at the bottom */
                position: relative;
            }

            .form-header-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .form-label {
                font-weight: bold; /* Set the font to bold */
            }


            .form-header {
                font-size: 24px;
                font-weight: bold;
                color: red;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .btn-container {
                margin-top: 50px;
                display: flex;
                justify-content: space-between;
            }

            .close-icon a {
                color: #000;
                text-decoration: none;
                font-size: 35px;
            }

            .close-icon a:hover {
                color: red;
            }

            @media (max-width: 575.98px) {
                .close-icon a {
                    font-size: 30px;
                }
            }

        </style>


<body>

<div class="container">
    <div class="form-container">
        <div class="form-header-container">
            <!-- Form title -->
            <div class="form-header">Formulir Pengajuan</div>

            <!-- Close icon (X) that links to index.php -->
            <div class="close-icon">
                <a href="index.php"><i class="fas fa-times"></i></a>
            </div>
        </div>

        <!-- Form that sends data to proses_pengajuan.php -->
        <form action="proses_pengajuan.php" method="POST">
            <div class="form-group">
                <label for="namaPemohon" class="form-label">Nama Pemohon</label>
                <input type="text" class="form-control" id="namaPemohon" name="namaPemohon" placeholder="Masukkan Nama Pemohon" required>
            </div>

            <div class="form-group">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
            </div>

            <div class="form-group">
                <label for="noTelepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="noTelepon" name="noTelepon" placeholder="Masukkan No Telepon" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
            </div>

            <!-- Grid system for tanggal kegiatan and tanggal kegiatan selesai -->
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="tanggalKegiatan" class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggalKegiatan" name="tanggalKegiatan" onchange="setMinTanggalSelesai()" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="tanggalKegiatanSelesai" class="form-label">Tanggal Kegiatan Selesai</label>
                    <input type="date" class="form-control" id="tanggalKegiatanSelesai" name="tanggalKegiatanSelesai" disabled required>
                </div>
            </div>

            <div class="form-group">
                <label for="kegiatan" class="form-label">Kegiatan</label>
                <input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Masukkan Kegiatan" required>
            </div>

            <div class="form-group">
                <label for="uraianKegiatan" class="form-label">Uraian Kegiatan</label>
                <textarea class="form-control" id="uraianKegiatan" name="uraianKegiatan" rows="3" placeholder="Masukkan Uraian Kegiatan" required></textarea>
            </div>

            <div class="btn-container">
                <button type="reset" class="btn btn-danger"><b>Batal</b></button>
                <button type="submit" class="btn btn-primary"><b>Kirim</b></button>
            </div>
        </form>

    </div>
</div>

<script>
function setMinTanggalSelesai() {
    const tanggalKegiatan = document.getElementById('tanggalKegiatan');
    const tanggalKegiatanSelesai = document.getElementById('tanggalKegiatanSelesai');

    if (tanggalKegiatan.value) {
        tanggalKegiatanSelesai.min = tanggalKegiatan.value;
        tanggalKegiatanSelesai.disabled = false;
    } else {
        tanggalKegiatanSelesai.disabled = true;
    }
}

</script>

        <!-- footer -->
        <?php
        include('footer.php');
        ?>
</body>

</html>