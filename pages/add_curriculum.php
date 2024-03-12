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
            <h1 class="m-2">Add Curriculum</h1>
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
                        <label for="curriculum_name">Curriculum Name</label>
                        <select class="form-control selected2bs4" name="curriculum_name" style="width: 100%">
                            <option selected="selected">--Choose Curriculum--</option>
                            <option>Informatika 2020-2024</option>
			    <option>Sistem Informasi 2020-2024</option>
                            <option>Management 2020</option>
                        </select>
                    </div>
                </div>
		<div class="col-md-6">
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control selected2bs4" name="semester" style="width: 100%">
                            <option selected="selected">--Choose Semester--</option>
			    <option>Prerequisite</option>
                            <option>Semester 1</option>
                            <option>Semester 2</option>
                            <option>Semester 3</option>
                            <option>Semester 4</option>
                            <option>Semester 5</option>
                            <option>Semester 6</option>
                            <option>Semester 7</option>
			    <option>Semester 8</option>
                            <option>Semester 9</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" name="code" placeholder="Enter Subject Code" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subject_name">Subject Name</label>
                        <input type="text" class="form-control" name="subject_name" placeholder="Enter Subject Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="text" class="form-control" name="sks" placeholder="Enter the Credit Weight" required>
                    </div>
                </div>
		<div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control selected2bs4" name="type" style="width: 100%">
                            <option selected="selected">--Choose Type--</option>
                            <option>Prerequisite</option>
                            <option>General</option>
			    <option>Basic</option>
			    <option>Major</option>
			    <option>Elective</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pre_requisite">Pre-requisite</label>
                        <input type="text" class="form-control" name="pre_requisite" placeholder="Enter Pre-requisite Subject" required>
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
    $servername = "localhost:3306";
    $username = "unklabcb";
    $password = "Coursebot08";
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
	$curriculum_name = $_POST['curriculum_name'];
        $semester = $_POST['semester'];
        $code = $_POST['code'];
        $subject_name = $_POST['subject_name'];
        $sks = $_POST['sks'];
        $pre_requisite = $_POST['pre_requisite'];
	$type = $_POST['type'];
        

        // Menyisipkan data ke dalam tabel
        $sql = "INSERT INTO tbl_curriculum (curriculum_name, semester, code, subject_name, sks, pre_requisite, type)
                VALUES ('$curriculum_name', '$semester', '$code', '$subject_name', '$sks', '$pre_requisite', '$type')";

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
