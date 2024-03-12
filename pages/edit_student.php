<?php
require '../config/db_connect.php';

// Fetch data for editing
if(isset($_POST['editbtn']))
{
    $email = $_POST['edit_email'];
    $query = "SELECT * FROM tbl_students WHERE email='$email'";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $row = mysqli_fetch_assoc($query_run);
    }
    else
    {
        echo "No Record Found!";
    }
}

// Update data in the database
if(isset($_POST['updatebtn']))
{
    $old_email = $_POST['edit_email'];
    $new_email = $_POST['email']; // Updated email field
    $fullname = $_POST['fullname'];
    $registration_number = $_POST['registration_number'];
    $nim = $_POST['nim'];
    $faculty = $_POST['faculty'];
    $prog_study = $_POST['prog_study'];
    $curriculum_name = $_POST['curriculum_name'];
    $password = $_POST['password'];

    // Update the email address in other related tables if needed

    $query = "UPDATE tbl_students SET email='$new_email', fullname='$fullname', reg_num='$registration_number', nim='$nim', faculty='$faculty', prog_study='$prog_study', curriculum_name='$curriculum_name', password='$password' WHERE email='$old_email'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script>alert("Data Updated Successfully");</script>';
        header('Location: list_student.php');
    }
    else
    {
        echo '<script>alert("Error Updating Data");</script>';
    }
}

// Delete data from the database
if(isset($_POST['deletebtn']))
{
    $email = $_POST['delete_email'];

    $query = "DELETE FROM tbl_students WHERE email='$email'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script>alert("Data Deleted Successfully");</script>';
        header('Location: list_student.php');
    }
    else
    {
        echo '<script>alert("Error Deleting Data");</script>';
    }
}
?>

<?php

require_once '../pages/layout.php';
includeLayouts();

?>

<!-- HTML form for editing data -->
<div class="content-wrapper">
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
<form action="" method="POST">
<input type="hidden" name="edit_email" value="<?php echo $row['email']; ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullname">Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="registration_number">Registration Number</label>
                    <input type="text" class="form-control" id="registration_number" name="registration_number" value="<?php echo $row['reg_num']; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="faculty">Faculty:</label>
                    <select class="form-control selected2bs4" name="faculty" id="faculty" style="width: 100%">
                        <option selected="selected">--Choose Faculty--</option>
                        <option <?php if ($row['faculty'] == 'Fakultas Ilmu Komputer') echo 'selected'; ?>>Fakultas Ilmu Komputer</option>
                        <option <?php if ($row['faculty'] == 'Fakultas Ekonomi dan Bisnis') echo 'selected'; ?>>Fakultas Ekonomi dan Bisnis</option>
                        <option <?php if ($row['faculty'] == 'Fakultas Keperawatan') echo 'selected'; ?>>Fakultas Keperawatan</option>
                        <option <?php if ($row['faculty'] == 'Fakultas Filsafat') echo 'selected'; ?>>Fakultas Filsafat</option>
                        <option <?php if ($row['faculty'] == 'Fakultas Pertanian') echo 'selected'; ?>>Fakultas Pertanian</option>
                        <option <?php if ($row['faculty'] == 'Fakultas Pendidikan') echo 'selected'; ?>>Fakultas Pendidikan</option>
                        <option <?php if ($row['faculty'] == 'ASMIK') echo 'selected'; ?>>ASMIK</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prog_study">Program Study</label>
                    <select class="form-control selected2bs4" name="prog_study" style="width: 100%">
                        <option selected="selected">--Choose Program Study--</option>
                        <option <?php if ($row['prog_study'] == 'Informatika') echo 'selected'; ?>>Informatika</option>
			<option <?php if ($row['prog_study'] == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
                        <option <?php if ($row['prog_study'] == 'Management') echo 'selected'; ?>>Management</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="curriculum_name">Program Study</label>
                    <select class="form-control selected2bs4" name="curriculum_name" style="width: 100%">
                        <option selected="selected">--Choose Program Study--</option>
                        <option <?php if ($row['curriculum_name'] == 'Informatika 2020-2024') echo 'selected'; ?>>Informatika 2020-2024</option>
			<option <?php if ($row['curriculum_name'] == 'Sistem Informasi 2020-2024') echo 'selected'; ?>>Sistem Informasi 2020-2024</option>
                        <option <?php if ($row['curriculum_name'] == 'Management 2020') echo 'selected'; ?>>Management 2020</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>
                </div>
            </div>

        </div>
    </div>
    <div class="card-footer d-flex justify-content-center">
        <button type="submit" name="updatebtn" class="btn btn-primary mr-2">Update</button>
        <button type="submit" href="../pages/list_student.php" class="btn btn-danger">Cancel</button>
    </div>
    
</form>
</div>

<!-- Your existing PHP code for update and delete -->

<?php
    // ...
?>
