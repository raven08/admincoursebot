<?php
require_once '../pages/layout.php';
includeLayouts();
?>

<div class="content-wrapper" id="editstudent">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <br></br>
                    <h1 class="m-2">Edit Student</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <?php
    // Pastikan untuk mengganti informasi koneksi database sesuai dengan database Anda.
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_admin";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mendapatkan data mahasiswa berdasarkan reg_num
    $reg_num_to_edit = $_POST['edit_reg_num'];
    $sql_select = "SELECT * FROM tbl_students WHERE reg_num = '$reg_num_to_edit'";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        $row = $result_select->fetch_assoc();
    ?>
            <!-- Form edit start -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">Name</label>
                                <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                            </div>
                        </div>
                        <!-- Tambahkan input lainnya sesuai kebutuhan -->
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <input type="hidden" name="reg_num" value="<?php echo $reg_num_to_edit; ?>">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="list_students.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>

    <?php
            // Memproses pembaruan data jika formulir dikirim
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Mengambil data dari formulir
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                // Ambil input lainnya sesuai kebutuhan

                // Memperbarui data di tabel
                $sql_update = "UPDATE tbl_students SET fullname='$fullname', email='$email' WHERE reg_num='$reg_num_to_edit'";

                if ($conn->query($sql_update) === TRUE) {
                    echo "Student updated successfully";
                } else {
                    echo "Error updating student: " . $conn->error;
                }
            }
        } else {
            echo "Student not found";
        }

    // Menutup koneksi
    $conn->close();
    ?>
</div>
