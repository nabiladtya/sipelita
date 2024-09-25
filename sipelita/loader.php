<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    /* Loader Styles */
    #loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        /*background-color: rgba(255, 255, 255, 0.8);  Background semi transparan */       
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.5s ease;
    }

    /* Spinner Styles */
    #loader:before {
        content: "";
        display: block;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 10px solid #007bff;
        /* Border biru */
        border-top-color: transparent;
        /* Bagian atas transparan */
        animation: spin 1s linear infinite;
        /* Animasi berputar */
    }

    /* Keyframes for spinning animation */
    @keyframes spin {
        to {
            transform: rotate(360deg);
            /* Rotasi 360 derajat */
        }
    }

    /* Hide the content until the loader is finished */
    .content {
        display: none;
    }
</style>

<body>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Saat semua resource halaman selesai dimuat (termasuk gambar, CSS, dll.)
            window.addEventListener("load", function() {
                const loader = document.getElementById("loader");
                const content = document.querySelector(".content");

                // Setelah 1 detik, fade-out loader dan tampilkan konten
                setTimeout(function() {
                    loader.style.opacity = "0"; // Fade-out loader
                    loader.style.transition = "opacity 0.5s ease"; // Smooth transition

                    // Setelah fade-out selesai, sembunyikan loader dan tampilkan konten
                    setTimeout(function() {
                        loader.style.display = "none"; // Sembunyikan loader
                        content.style.display = "block"; // Tampilkan konten halaman
                    }, 500); // Tunggu 500ms agar transisi fade-out selesai
                }, 1500); // Loader akan terlihat selama setidaknya 1 detik
            });
        });
    </script>

    <!-- Loader -->
    <div id="loader"></div>

</body>

</html>