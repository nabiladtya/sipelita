<?php
include 'koneksi.php'; // Koneksi ke database

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Atur zona waktu sesuai dengan lokasi Anda (misal: Asia/Jakarta untuk Waktu Indonesia Barat)
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi apakah semua field terisi
    if (
        !empty($_POST['namaPemohon']) && !empty($_POST['nip']) && !empty($_POST['noTelepon']) &&
        !empty($_POST['email']) && !empty($_POST['tanggalKegiatan']) && !empty($_POST['tanggalKegiatanSelesai']) &&
        !empty($_POST['kegiatan']) && !empty($_POST['uraianKegiatan'])
    ) {

        // Ambil data dari form dan lakukan sanitasi
        $nama_pemohon = mysqli_real_escape_string($koneksi, $_POST['namaPemohon']);
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $no_telp = mysqli_real_escape_string($koneksi, $_POST['noTelepon']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $tgl_kegiatan = mysqli_real_escape_string($koneksi, $_POST['tanggalKegiatan']);
        $tgl_kegiatan_selesai = mysqli_real_escape_string($koneksi, $_POST['tanggalKegiatanSelesai']);
        $kegiatan = mysqli_real_escape_string($koneksi, $_POST['kegiatan']);
        $uraian_kegiatan = mysqli_real_escape_string($koneksi, $_POST['uraianKegiatan']);
        $status = 'Pending'; // Set status default menjadi Pending
        $waktu_pengajuan = date('Y-m-d H:i:s'); // Ambil waktu pengajuan sesuai dengan zona waktu yang diatur

        // Simpan data ke dalam tabel tb_pengajuan_lpj
        $query = "INSERT INTO tb_pengajuan_lpj (nama_pemohon, nip, no_telp, email, tgl_kegiatan, tgl_kegiatan_selesai, kegiatan, uraian_kegiatan, status, waktu_pengajuan) 
                VALUES ('$nama_pemohon', '$nip', '$no_telp', '$email', '$tgl_kegiatan', '$tgl_kegiatan_selesai', '$kegiatan', '$uraian_kegiatan', '$status', '$waktu_pengajuan')";

        if (mysqli_query($koneksi, $query)) {
            $no_pengajuan = mysqli_insert_id($koneksi); // Mendapatkan ID terakhir yang disisipkan

            // Kirim email ke admin
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'pblpolibatam@gmail.com';
                $mail->Password = 'cvcyswsaniintymr';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Email dan nama pengirim
                $mail->setFrom('pblpolibatam@gmail.com', 'pblpolibatam');
                // Tambahkan penerima
                $mail->addAddress('nabiladitya2203@gmail.com', 'Admin');

                // Konten email
                $judul = "Pengajuan Pelatihan Baru";
                $approval_link = "http://localhost/sipelita/admin.php?no_pengajuan=$no_pengajuan"; // Link untuk approve
                $gambar_url = "https://www.polibatam.ac.id/wp-content/uploads/2022/01/poltek-2048x1821.png"; // URL gambar

                $pesan = "
                    <div style='text-align: center;'>
                        <img src='$gambar_url' alt='Gambar Pengajuan' style='max-width: 30%; height: auto; margin-bottom: 20px;'>
                        <p><strong>Ada Pengajuan Baru! Silahkan <b>Konfirmasi Pengajuan Pelatihan</b> dengan memilih tombol di bawah ini:</strong></p>
                        <p>
                            <a href='$approval_link' target='_blank' style='display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #007BFF; text-decoration: none; border-radius: 5px;'>
                                Approve Pengajuan
                            </a>
                        </p>
                    </div>
                ";

                $mail->isHTML(true); // Mengatur format email ke HTML
                $mail->Subject = $judul;
                $mail->Body = $pesan;
                $mail->AltBody = 'Ada Pengajuan Baru! Silahkan Konfirmasi Pengajuan Pelatihan.';

                $mail->send();
                echo 'Pengajuan berhasil, menunggu persetujuan dari admin.';
            } catch (Exception $e) {
                echo "Pengiriman email gagal: {$mail->ErrorInfo}";
            }

            // Redirect ke halaman sukses setelah berhasil kirim data
            header("Location: pengajuan_status.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Data tidak lengkap! Silakan isi semua field.";
    }
} else {
    echo "Invalid request method.";
}
