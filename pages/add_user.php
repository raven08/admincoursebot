<?php

require_once '../pages/layout.php';
includeLayouts();

?>

<div class="content-wrapper" id="addadmin">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <br></br>
            <h1 class="m-2">Add Admin</h1>
            <?php

                if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                {
                  echo '<h2> '.$_SESSION['success'].' </h2>';
                  unset($_SESSION['success']);
                }

                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                {
                  echo '<h2 class="bg-info"> '.$_SESSION['status'].' </h2>';
                  unset($_SESSION['status']);
                }

                ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



              <!-- form start -->
              <form method="POST" action="../pages/add_code.php">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" class="form-control" id="" name="name" placeholder="Enter email" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Email Address</label>
                          <input type="email" class="form-control" id="" name="email" placeholder="Enter email" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Department</label>
                          <select class="form-control selected2bs4" name="department" style="width: 100%">
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
                          <input type="password" class="form-control" name="password" id="" placeholder="Password" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Role</label>
                          <select class="form-control selected2bs4" name="role" style="width: 100%">
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
                    <button type="submit" name="btnsubmit" id="#addadmin" class="btn btn-primary mr-2">Submit</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                  </div>
              </form>

</div>


