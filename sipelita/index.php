    <!-- NAVBAR -->
    <?php
        include('navbar.php');
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css"/>
</head>

<body>
    <!-- Dashboard -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h2>Dashboard</h2>
            <a href="buat_pengajuan.html" class="btn btn-danger">
                Buat Pengajuan&nbsp;<i class="fas fa-plus"></i>
            </a>
        </div>

        <!-- Banner Image -->
        <div class="my-3">
            <img src="./assets/grafikdata.jpg" class="img-fluid" style="width: 100%; max-height: 300px; object-fit: cover;" alt="Dashboard Image">
        </div>

        <div class="row text-center mt-5 mb-5">
            <div class="col-md-4 mb-4 mb-md-0"> <!-- mb-4 for mobile, and mb-0 for larger screens -->
                <div class="p-4 bg-danger text-white rounded">
                    <h5>RIWAYAT PELAPORAN</h5>
                    <p><strong>0</strong> Total</p>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="p-4 bg-success text-white rounded">
                    <h5>PELAPORAN DIPROSES</h5>
                    <p><strong>0</strong> Total</p>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="p-4 bg-primary text-white rounded">
                    <h5>Tracking Status</h5>
                    <p><strong>0</strong> Total</p>
                </div>
            </div>
        </div>



        <!-- Ringkasan -->
        <div class="mt-5">
            <h4>Ringkasan</h4>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="riwayat-tab" data-bs-toggle="tab" data-bs-target="#riwayat" type="button" role="tab" aria-controls="riwayat" aria-selected="true">RIWAYAT PELAPORAN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="diproses-tab" data-bs-toggle="tab" data-bs-target="#diproses" type="button" role="tab" aria-controls="diproses" aria-selected="false">PELAPORAN DIPROSES</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-3" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                    <!-- Data for Riwayat Pelaporan -->
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

  

        <!-- footer -->
        <?php
        include('footer.php');
        ?>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</body>

</html>