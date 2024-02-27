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
					<th style="text-align: center;">Delete</th>
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
						<td style="text-align: center;">
                             <form method="POST" action="../pages/history_delete.php">
							  <input type="hidden" name="email" value="<?php echo $row['email_user']; ?>">
							  <button type="button" name="delete_history" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-trash nav-icon"></i></button>
							  
							  <!-- Modal -->
							  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
								  <div class="modal-content">
									<div class="modal-header">
									  <h5 class="modal-title" id="exampleModalLabel">History Question</h5>
									  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
									  Do you want to delete this history?
									</div>
									<div class="modal-footer">
									  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									  <button type="submit" class="btn btn-danger">Yes</button>
									</div>
								  </div>
								</div>
							  </div>
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