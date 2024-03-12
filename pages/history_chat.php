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
            <h1 class="m-2">History Question</h1>
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
    
                  <br></br>
                  <?php
                   require '../config/db_connect.php';

                    $query = "SELECT * FROM tbl_history_chat";
                    $query_run = mysqli_query($connection, $query);
                    $no = 1;
                  ?>
                  <tr>
					          <th style="text-align: center;">No</th>
                    <th style="text-align: center;">User</th>
                    <th style="text-align: center;">Category</th>
                   	<th style="text-align: center;">Question</th>
                    <th style="text-align: center;">Answer</th>
					          <th style="text-align: center;">Threshold</th>
                    <th style="text-align: center;">Date</th>
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
                        <td><?php echo $row['email_user']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['user_question']; ?></td>
                        <td><?php echo $row['chatbot_answer']; ?></td>
						            <td><?php echo number_format($row['decision_threshold'], 2) . '%'; ?></td>
						            <td><?php echo $row['created_at']; ?></td>
						            
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