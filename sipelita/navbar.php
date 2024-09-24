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
        /* Hover Effect */
        .navbar-nav .nav-link:hover {
            color: blue !important; /* Change to the desired hover color */
        }

        /* Active state - when a nav-link is clicked */
        .navbar-nav .nav-link.active {
            color: blue !important; /* Change to the desired active color */
        }

        /* Active class on default page load */
        .nav-item a {
            transition: color 0.3s ease;
        }
    </style>
</head>

<body>

    <!-- Sticky Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./assets/sipelita.jpg" alt="SIPELITA Logo"> <!-- Replace this with the actual image path -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'pengajuan.php' ? 'active' : ''; ?>" href="pengajuan.php">Buat Pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'rekapitulasi.php' ? 'active' : ''; ?>" href="rekapitulasi.php">Rekapitulasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>
