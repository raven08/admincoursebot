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
            <h1 class="m-2">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <?php
                  require '../config/db_connect.php';

                  $query =  "SELECT id FROM users ORDER BY id";
                  $query_run = mysqli_query($connection, $query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h3> '.$row.'</h1>';
                ?>

                <p>Admin & Operator</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="list_user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
		<?php
                  require '../config/db_connect.php';

                  $query =  "SELECT id FROM tbl_curriculum ORDER BY id";
                  $query_run = mysqli_query($connection, $query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h3> '.$row.'</h1>';
                ?>

		
                <p>Total kurikulum</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard"></i>
              </div>
              <a href="list_curriculum.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
                  require '../config/db_connect.php';

                  $query =  "SELECT email FROM tbl_students ORDER BY email";
                  $query_run = mysqli_query($connection, $query);

                  $row = mysqli_num_rows($query_run);
                  echo '<h3> '.$row.'</h1>';
                ?>

                <p>Total Student</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="list_student.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->



        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->

    </section>

  </div>