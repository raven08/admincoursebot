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
            <h1 class="m-2">Knowledge Data</h1>
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
				  <form method="POST" action="../pages/knowledge_code.php">
							  <button type="button" name="addknowledge" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">Add Knowledge<i class="fas fa-plus nav-icon"></i></button>
							  <!-- Modal -->
							  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
								  <div class="modal-content">
									<div class="modal-header">
									  <h5 class="modal-title" id="exampleModalLabel">Add Chatbot Knowledge</h5>
									  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
										<div class="modal-body">
										<div class="form-group">
										  <label>Category</label>
										  <select class="form-control" name="category" style="width: 100%">
											<option selected="selected">--Choose Category--</option>
											<option>keuangan</option>
											<option>pendaftaran</option>
											<option>filkom</option>
											<option>greetings</option>
											<option>asrama</option>
											<option>fasilitas</option>
											<option>sejarah</option>
											<option>pendaftaran</option>
											<option>lokasi</option>
											<option>ubs</option>
											<option>filsafat</option>
											<option>fkip</option>
											<option>organisasi</option>
											<option>labor</option>
										  </select>
										</div>
										<div class="form-group">
										  <label for="">Question</label>
										  <input type="text" class="form-control" id="" name="question" placeholder="Input Question" required>
										</div>
										<div class="form-group">
										  <label for="">Answer</label>
										  <input type="text" class="form-control" id="" name="answer" placeholder="Input Answer" required>
										</div>
									</div>
									<div class="modal-footer">
									  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									  <button type="submit" name="submit_knowledge" class="btn btn-primary">Submit</button>
									</div>
								  </div>
								</div>
							  </div>
							</form>
                  <br></br>
                  <?php
                   require '../config/db_connect.php';

                    $query = "SELECT * FROM tbl_chatbot_knowledge";
                    $query_run = mysqli_query($connection, $query);
                    $no = 1;
                  ?>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Category</th>
                    <th style="text-align: center;">Question</th>
                    <th style="text-align: center;">Answer</th>
                    <th style="text-align: center;">Date</th>
					<th style="text-align: center;">Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(mysqli_num_rows($query_run) > 0)  {
					
						// konversi hasil query menjadi array asosiatif
						$rows = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
						
						// balik urutan baris
						$rows = array_reverse($rows);
						
						
                      foreach($rows as $row) {
                  ?>
                  <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['question']; ?></td>
                        <td><?php echo $row['answer']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
						<td style="text-align: center;">
                             <form method="POST" action="">
							  <input type="hidden" name="email" value="">
							  <button type="button" name="delete_knowledge" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-trash nav-icon"></i></button>
							  
							  <!-- Modal -->
							  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
								  <div class="modal-content">
									<div class="modal-header">
									  <h5 class="modal-title" id="exampleModalLabel">Knowledge Data</h5>
									  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
									  Do you want this knowledge?
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