<?php
require_once '../pages/layout.php';
includeLayouts();
?>

<div class="content-wrapper" id="addstudent">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <br></br>
            <h1 class="m-2">Add Student</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Form start -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fullname">Name</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter Fullname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reg_num">Registration Number</label>
                        <input type="text" class="form-control" name="reg_num" placeholder="Enter registration number" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" placeholder="Enter nim" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="faculty">Faculty</label>
                        <select class="form-control selected2bs4" name="faculty" style="width: 100%">
                            <option selected="selected">--Choose Faculty--</option>
                            <option>Fakultas Ilmu Komputer</option>
                            <option>Fakultas Ekonomi dan Bisnis</option>
                            <option>Fakultas Keperawatan</option>
                            <option>Fakultas Filsafat</option>
                            <option>Fakultas Pertanian</option>
                            <option>Fakultas Pendidikan</option>
                            <option>ASMIK</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prog_study">Program Study</label>
                        <select class="form-control selected2bs4" name="prog_study" style="width: 100%">
                            <option selected="selected">--Choose Program Study--</option>
                            <option>Informatika</option>
                            <option>Management</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="curriculum_name">Curriculum Name</label>
                        <select class="form-control selected2bs4" name="curriculum_name" style="width: 100%">
                            <option selected="selected">--Choose Curriculum--</option>
                            <option>Informatika 2020-2024</option>
                            <option>Management 2020</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
    </form>

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

    // Memproses data jika formulir dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari formulir
        $fullname = $_POST['fullname'];
        $reg_num = $_POST['reg_num'];
        $nim = $_POST['nim'];
        $faculty = $_POST['faculty'];
        $prog_study = $_POST['prog_study'];
        $curriculum_name = $_POST['curriculum_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Menyisipkan data ke dalam tabel
        $sql = "INSERT INTO tbl_students (fullname, reg_num, nim, faculty, prog_study, curriculum_name, email, password)
                VALUES ('$fullname', '$reg_num', '$nim', '$faculty', '$prog_study', '$curriculum_name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Student added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Menutup koneksi
    $conn->close();
    ?>
</div>
