<?php
require '../config/db_connect.php';

// Fetch data for editing
if(isset($_POST['edit']))
{
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM tbl_curriculum WHERE id='$id'";
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
    $id = $_POST['edit_id'];
    $curriculum_name = $_POST['curriculum_name'];
    $semester = $_POST['semester'];
    $code= $_POST['code'];
    $subject_name = $_POST['subject_name'];
    $sks = $_POST['sks'];
    $pre_requisite = $_POST['pre_requisite'];
    $type = $_POST['type'];
    // Update the email address in other related tables if needed

    $query = "UPDATE tbl_curriculum SET  curriculum_name='$curriculum_name', semester='$semester', code='$code', subject_name='$subject_name', sks='$sks', pre_requisite='$pre_requisite', type='$type' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script>alert("Data Updated Successfully");</script>';
        header('Location: list_curriculum.php');
    }
    else
    {
        echo '<script>alert("Error Updating Data");</script>';
    }
}

// Delete data from the database
if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM tbl_curriculum WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script>alert("Data Deleted Successfully");</script>';
        header('Location: list_curriculum.php');
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
            <h1 class="m-2">Edit Curriculum</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<form action="" method="POST">
<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
            	<div class="form-group">
                     <label for="curriculum_name">Curriculum Name</label>
		     <select class="form-control selected2bs4" name="curriculum_name" style="width: 100%">
                    	<option selected="selected">--Choose Curriculum Name--</option>
                    	<option <?php if ($row['curriculum_name'] == 'Informatika 2020-2024') echo 'selected'; ?>>Informatika 2020-2024</option>
			<option <?php if ($row['curriculum_name'] == 'Sistem Informasi 2020-2024') echo 'selected'; ?>>Sistem Informasi 2020-2024</option>
                    	<option <?php if ($row['curriculum_name'] == 'Management 2020') echo 'selected'; ?>>Management 2020</option>
                     </select>
            	</div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select class="form-control selected2bs4" name="semester" id="semester" style="width: 100%">
                        <option selected="selected">--Choose Semester--</option>
                        <option <?php if ($row['semester'] == 'Prerequisite') echo 'selected'; ?>>Prerequisite</option>
                        <option <?php if ($row['semester'] == 'Semester 1') echo 'selected'; ?>>Semester 1</option>
                        <option <?php if ($row['semester'] == 'Semester 2') echo 'selected'; ?>>Semester 2</option>
                        <option <?php if ($row['semester'] == 'Semester 3') echo 'selected'; ?>>Semester 3</option>
                        <option <?php if ($row['semester'] == 'Semester 4') echo 'selected'; ?>>Semester 4</option>
                        <option <?php if ($row['semester'] == 'Semester 5') echo 'selected'; ?>>Semester 5</option>
                        <option <?php if ($row['semester'] == 'Semester 6') echo 'selected'; ?>>Semester 6</option>
			<option <?php if ($row['semester'] == 'Semester 7') echo 'selected'; ?>>Semester 7</option>
                        <option <?php if ($row['semester'] == 'Semester 8') echo 'selected'; ?>>Semester 8</option>
                        <option <?php if ($row['semester'] == 'Semester 9') echo 'selected'; ?>>Semester 9</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="<?php echo $row['code']; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subject_name">Subject Name</label>
                    <input type="subject_name" class="form-control" id="subject_name" name="subject_name" value="<?php echo $row['subject_name']; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sks">SKS</label>
                    <input type="text" class="form-control" id="sks" name="sks" value="<?php echo $row['sks']; ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control selected2bs4" name="type" style="width: 100%">
                        <option selected="selected">--Choose Program Study--</option>
                        <option <?php if ($row['type'] == 'Prerequisite') echo 'selected'; ?>>Prerequisite</option>
                        <option <?php if ($row['type'] == 'General') echo 'selected'; ?>>General</option>
			<option <?php if ($row['type'] == 'Basic') echo 'selected'; ?>>Basic</option>
                        <option <?php if ($row['type'] == 'Major') echo 'selected'; ?>>Major</option>
			<option <?php if ($row['type'] == 'Elective') echo 'selected'; ?>>Elective</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pre_requisite">Pre-requisite</label>
                    <input type="text" class="form-control" id="pre_requisite" name="pre_requisite" value="<?php echo $row['pre_requisite']; ?>" required>
                </div>
            </div>

        </div>
    </div>
    <div class="card-footer d-flex justify-content-center">
        <button type="submit" name="updatebtn" class="btn btn-primary mr-2">Update</button>
        <button type="submit" href="../pages/list_curriculum.php" class="btn btn-danger">Cancel</button>
    </div>
    
</form>
</div>

<!-- Your existing PHP code for update and delete -->

<?php
    // ...
?>
