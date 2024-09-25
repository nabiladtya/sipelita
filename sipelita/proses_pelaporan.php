<?php
// koneksi.php: Database connection
$koneksi = mysqli_connect("localhost", "root", "", "sipelita");
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Function to send email
function sendEmail($no_pengajuan, $email) {
    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Your email
        $mail->Password = 'your-email-password'; // Your email password or app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email details
        $mail->setFrom('your-email@gmail.com', 'Your Name');
        $mail->addAddress($email, 'Admin'); // Admin email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Pengajuan Pelatihan Baru";
        $approval_link = "http://localhost/sipelita/admin.php?no_pengajuan=$no_pengajuan"; 
        $pesan = "
            <div style='text-align: center;'>
                <p><strong>Ada Pengajuan Baru! Silahkan konfirmasi pengajuan pelatihan.</strong></p>
                <p>
                    <a href='$approval_link' target='_blank' style='display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #007BFF; text-decoration: none; border-radius: 5px;'>
                        Approve Pengajuan
                    </a>
                </p>
            </div>
        ";
        $mail->Body = $pesan;
        $mail->AltBody = 'Ada Pengajuan Baru! Silahkan Konfirmasi Pengajuan Pelatihan.';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Pengiriman email gagal: {$mail->ErrorInfo}";
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize an array to collect missing fields
    $missing_fields = [];

    // Sanitize input data and check for empty fields
    $nama_pemohon = !empty($_POST['namaPemohon']) ? mysqli_real_escape_string($koneksi, $_POST['namaPemohon']) : $missing_fields[] = 'namaPemohon';
    $nip = !empty($_POST['nip']) ? mysqli_real_escape_string($koneksi, $_POST['nip']) : $missing_fields[] = 'nip';
    $no_telp = !empty($_POST['noTelepon']) ? mysqli_real_escape_string($koneksi, $_POST['noTelepon']) : $missing_fields[] = 'noTelepon';
    $email = !empty($_POST['email']) ? mysqli_real_escape_string($koneksi, $_POST['email']) : $missing_fields[] = 'email';
    $tgl_kegiatan = !empty($_POST['tanggalKegiatan']) ? mysqli_real_escape_string($koneksi, $_POST['tanggalKegiatan']) : $missing_fields[] = 'tanggalKegiatan';
    $tgl_kegiatan_selesai = !empty($_POST['tanggalKegiatanSelesai']) ? mysqli_real_escape_string($koneksi, $_POST['tanggalKegiatanSelesai']) : $missing_fields[] = 'tanggalKegiatanSelesai';
    $kegiatan = !empty($_POST['kegiatan']) ? mysqli_real_escape_string($koneksi, $_POST['kegiatan']) : $missing_fields[] = 'kegiatan';
    $uraian_kegiatan = !empty($_POST['uraianKegiatan']) ? mysqli_real_escape_string($koneksi, $_POST['uraianKegiatan']) : $missing_fields[] = 'uraianKegiatan';
    $status = 'Pending';
    $waktu_pengajuan = date('Y-m-d H:i:s');

    // Handle file upload
    if (isset($_FILES['buktifisik']) && $_FILES['buktifisik']['error'] == 0) {
        $buktifisik = $_FILES['buktifisik']['tmp_name'];
        $bukti_fisik_content = addslashes(file_get_contents($buktifisik));
    } else {
        $missing_fields[] = 'buktifisik';
    }
    

// Pastikan no_pengajuan valid ada di tabel tb_pengajuan_lpj
$no_pengajuan_valid = mysqli_query($koneksi, "SELECT no_pengajuan FROM tb_pengajuan_lpj WHERE no_pengajuan = '$no_pengajuan'");

if (mysqli_num_rows($no_pengajuan_valid) > 0) {
    // Lakukan insert jika no_pengajuan valid
    $query = "INSERT INTO tb_pelaporan_lpj (nama_pemohon, nip, no_telp, email, tgl_kegiatan, 
                  tgl_kegiatan_selesai, kegiatan, uraian_kegiatan, status, waktu_pengajuan, bukti_fisik) 
                  VALUES ('$nama_pemohon', '$nip', '$no_telp', '$email', '$tgl_kegiatan', 
                          '$tgl_kegiatan_selesai', '$kegiatan', '$uraian_kegiatan', '$status', 
                          '$waktu_pengajuan', '$bukti_fisik_content')";

    if (mysqli_query($koneksi, $query)) {
        // Berhasil
        header("Location: pelaporan_sukses.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Error: no_pengajuan tidak valid.";
}

}
?>
