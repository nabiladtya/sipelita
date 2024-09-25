<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" />

    <style>
        /* Warna hover ketika kursor di atas menu */
        .navbar-nav .nav-link:hover {
            color: blue !important;
            /* Warna biru saat hover */
            font-weight: bold;
            /* Membuat teks bold saat hover */
        }

        /* Warna ketika item menu aktif (halaman sedang dibuka) */
        .navbar-nav .nav-link.active {
            color: blue !important;
            /* Warna biru saat item menu aktif */
            font-weight: bold;
            /* Membuat teks bold untuk menu aktif */
        }

        /* Efek transisi saat hover untuk perubahan warna */
        .nav-item a {
            transition: color 0.3s ease;
            font-weight: bold;
            /* Membuat semua teks menu bold secara default */
        }

        /* Menampilkan dropdown saat hover */
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Menambahkan simbol panah di menu dropdown */
        .dropdown-toggle::after {
            content: " ▼";
        }

        /* Aturan dasar untuk dropdown, tersembunyi dan dengan efek transisi */
        .dropdown-menu {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
            /* Transisi animasi */
            transform: translateY(-10px);
            /* Efek turun saat dibuka */
        }

        /* Menampilkan dropdown dengan animasi saat hover */
        .dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
            /* Reset posisi dropdown */
        }

        /* Desain tambahan untuk dropdown, seperti bayangan dan radius */
        .dropdown-menu {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
        }

        /* Warna background biru saat hover dan ketika item aktif */
        .dropdown-item:hover,
        .dropdown-item.active {
            background-color: blue !important;
            /* Warna background biru */
            color: white !important;
            /* Warna teks putih */
            font-weight: bold;
            /* Membuat teks dropdown bold saat hover atau aktif */
        }
    </style>
</head>

<body>

    <!-- Navbar Sticky (tetap di atas saat halaman di-scroll) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <!-- Logo SIPELITA -->
            <a class="navbar-brand" href="#">
                <img src="./assets/sipelita.jpg" alt="SIPELITA Logo"> <!-- Ganti dengan path gambar asli -->
            </a>

            <!-- Tombol toggle untuk versi mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Isi menu navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Menu Home -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>

                    <!-- Menu Buat Pengajuan -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'pengajuan.php' ? 'active' : ''; ?>" href="pengajuan.php">Buat Pengajuan</a>
                    </li>

                    <!-- Dropdown Menu untuk Status -->
                    <li class="nav-item dropdown">
                        <!-- Jika halaman status pengajuan atau pelaporan terbuka, maka menu status akan aktif (warna biru) -->
                        <a class="nav-link dropdown-toggle 
                            <?php echo (basename($_SERVER['PHP_SELF']) == 'pengajuan_status.php' || basename($_SERVER['PHP_SELF']) == 'pelaporan_status.php') ? 'active' : ''; ?>"
                            href="#" id="statusDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </a>

                        <!-- Isi dari dropdown status -->
                        <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                            <!-- Status Pengajuan -->
                            <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'pengajuan_status.php' ? 'active' : ''; ?>" href="pengajuan_status.php">Status Pengajuan</a></li>
                            <!-- Status Pelaporan -->
                            <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'pelaporan_status.php' ? 'active' : ''; ?>" href="pelaporan_status.php">Status Pelaporan</a></li>
                        </ul>
                    </li>

                    <!-- Menu Rekapitulasi -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'rekapitulasi.php' ? 'active' : ''; ?>" href="rekapitulasi.php">Rekapitulasi</a>
                    </li>

                    <!-- Menu Kontak Kami -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak Kami</a>
                    </li>

                    <!-- Menu Profile -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>