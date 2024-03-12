<?php
// Koneksi ke database (gantilah dengan informasi koneksi Anda)
$servername = "localhost";
$username = "unklabcb";
$password = "Coursebot08";
$dbname = "db_admin";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan curriculum_name dari tbl_student (gantilah sesuai kebutuhan)
$email = $_GET['email']; // Sesuaikan dengan cara Anda mendapatkan nim dari mobile app

$sql_student = "SELECT curriculum_name FROM tbl_students WHERE email = '$email'";
$result_student = $conn->query($sql_student);

if ($result_student->num_rows > 0) {
    // Jika data mahasiswa ditemukan
    $row_student = $result_student->fetch_assoc();
    $curriculum_name = $row_student['curriculum_name'];

    // Mengambil data curriculum dari tbl_curriculum berdasarkan curriculum_name
    $sql_curriculum = "SELECT * FROM tbl_curriculum WHERE curriculum_name = '$curriculum_name'";
    $result_curriculum = $conn->query($sql_curriculum);

    // Mengonversi hasil query menjadi array JSON
    $curriculum_data = array();
    while ($row_curriculum = $result_curriculum->fetch_assoc()) {
        $curriculum_data[] = $row_curriculum;
    }

    // Mengirim data sebagai response JSON
    header('Content-Type: application/json');
    echo json_encode($curriculum_data);
} else {
    // Jika data mahasiswa tidak ditemukan
    echo "Data mahasiswa tidak ditemukan";
}

// Menutup koneksi database
$conn->close();
?>
