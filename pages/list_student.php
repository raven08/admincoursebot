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
            <h1 class="m-2">List Student</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                  <thead>
                  <a href="../pages/add_student.php" class="btn btn-primary"><i class="fas-solid fa-plus"></i> Add Student</a>
                  <br></br>
                  <?php
                   require '../config/db_connect.php';

                    $query = "SELECT * FROM tbl_students";
                    $query_run = mysqli_query($connection, $query);
                    $no = 1;
                  ?>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Registration Number</th>
                    <th style="text-align: center;">NIM</th>
                    <th style="text-align: center;">Faculty</th>
                    <th style="text-align: center;">Program Study</th>
                    <th style="text-align: center;">Curriculum</th>
                    <th style="text-align: center;">Email</th>
                    <th style="text-align: center;">Update</th>
                    <th style="text-align: center;">DELETE</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
                      while($row = mysqli_fetch_assoc($query_run))
                      {
                  ?>
                  <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['reg_num']; ?></td>
                        <td><?php echo $row['nim']; ?></td>
                        <td><?php echo $row['faculty']; ?></td>
                        <td><?php echo $row['prog_study']; ?></td>
                        <td><?php echo $row['curriculum_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <form action="edit_student.php" method="POST" >
                            <input type="hidden" name="edit_email" value="<?php echo $row['email']; ?>">
                              <button type="submit" name="editbtn" class="btn btn-success btn-sm"><i class="fas fa-edit nav-icon"></i>EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="edit_student.php" method="POST">
                            <input type="hidden" name="delete_email" value="<?php echo $row['email']; ?>">
                              <button type="submit" name="deletebtn" class="btn btn-danger btn-sm"><i class="fas fa-trash nav-icon"></i>DELETE</button>
                            </form>
                        </td>
                    <?php
                      }
                    }
                    else {
                      echo "No Data Found";
                    }
                  ?>
                  <tbody>
                </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>