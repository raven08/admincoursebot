<?php

require_once '../pages/layout.php';
includeLayouts();

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <br></br>
            <h1 class="m-2">Edit Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <?php
        require '../config/db_connect.php';
        if(isset($_POST['edit_btn']))
        {
          $id = $_POST['edit_id'];

          $query = "SELECT * FROM users WHERE id='$id' ";
          $query_run = mysqli_query($connection, $query);

          foreach($query_run as $row)
          {
      ?>
    </div>

    <form action="edit_code.php" method="POST">
          <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" value="<?php echo $row['name']?>" class="form-control" id="" name="edit_name" placeholder="Enter email" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Email Address</label>
                  <input type="email" value="<?php echo $row['email']?>" class="form-control" id="" name="edit_email" placeholder="Enter email" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department</label>
                  <select value="<?php echo $row['department']?>" class="form-control selected2bs4" name="edit_department" style="width: 100%">
                    <option selected="selected">--Choose Department--</option>
                    <option>Fakultas Ilmu Komputer</option>
                    <option>Fakultas Ekonomi dan Bisnis</option>
                    <option>Fakultas Keperawatan</option>
                    <option>Fakultas Filsafat</option>
                    <option>Fakultas Pertanian</option>
                    <option>Fakultas Pendidikan</option>
                    <option>ASMIK</option>
                    <option>Departemen Keuangan</option>
                    <option>Departemen Registrar</option>
                    <option>Departemen Kemahasiswaan</option>
                    <option>Departemen Akademik</option>
                    <option>Departemen Informasi</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" value="<?php echo $row['password']?>" class="form-control" name="edit_password" id="" placeholder="Password" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Role</label>
                  <select value="<?php echo $row['role']?>" class="form-control selected2bs4" name="edit_role" style="width: 100%">
                    <option selected="selected">--Choose Role--</option>
                    <option value="admin">Admin</option>
                    <option value="operator">Operator</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input type="password" class="form-control" name="cpassword" id="" placeholder="Password">
                </div>
              </div>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <button type="submit" name="updatebtn" class="btn btn-primary mr-2">Update</button>
            <button type="submit" href="../pages/list_user.php" class="btn btn-danger">Cancel</button>
          </div>
      </form>

      <?php
          }
        }
      ?>

</div>