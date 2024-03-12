<input type="hidden" name="edit_email" value="<?php echo $row['email']; ?>"><?php

require_once '../pages/layout.php';
includeLayouts();

?>
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
    $email = $_POST['edit_email'];
    $fullname = $_POST['fullname'];
    $registration_number = $_POST['registration_number'];
    // Add other fields based on your database columns

    $query = "UPDATE tbl_students SET fullname='$fullname', reg_num='$registration_number' WHERE email='$email'";
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

<!-- HTML form for editing data -->
<form action="" method="POST">
    <div class="form-group">
        <label for="fullname">Full Name:</label>
        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" required>
    </div>

    <div class="form-group">
        <label for="registration_number">Registration Number:</label>
        <input type="text" class="form-control" id="registration_number" name="registration_number" value="<?php echo $row['reg_num']; ?>" required>
    </div>

    <!-- Add other form fields as needed, based on your database columns -->

    <input type="hidden" name="edit_email" value="<?php echo $row['email']; ?>">
    <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
</form>

<!-- Your existing PHP code for update and delete -->

<?php
    // ...
?>
