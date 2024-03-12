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
                    <h1 class="m-2">List Curriculum</h1>
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
                            <form action="" method="POST">
                                <label for="select_id">Select Curriculum:</label>
                                <select name="selected_id" id="select_id" class="form-control">
                                    <option value="Informatika 2020-2024">Informatika 2020-2024</option>
                                    <option value="Sistem Informasi 2020-2024">Sistem Informasi 2020-2024</option>
				    <option value="Management 2020">Management 2020</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-primary" name="select_btn"><i class="fa-solid fa-check"></i> Select</button>
                            </form>
                            <br>

                            <table id="" class="table table-bordered table-hover">
                                <thead>
                                    <a href="../pages/add_curriculum.php" class="btn btn-primary"><i class="fas-solid fa-plus"></i> Add Curriculum</a>
                                    <br></br>
                                    <?php
                                    require '../config/db_connect.php';

                                    // Tambahkan kondisi pemilihan berdasarkan ID
                                    if (isset($_POST['select_btn'])) {
                                        $selected_id = $_POST['selected_id'];
                                        $query = "SELECT * FROM tbl_curriculum WHERE curriculum_name = '$selected_id'";
                                    } else {
                                        $query = "SELECT * FROM tbl_curriculum";
                                    }

                                    $query_run = mysqli_query($connection, $query);
                                    $no = 1;
                                    ?>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Curriculum Name</th>
                                        <th style="text-align: center;">Semester</th>
                                        <th style="text-align: center;">Code</th>
                                        <th style="text-align: center;">Subject Name</th>
                                        <th style="text-align: center;">SKS</th>
                                        <th style="text-align: center;">Type</th>
                                        <th style="text-align: center;">Pre-requisite</th>
                                        <th style="text-align: center;">Update</th>
                                        <th style="text-align: center;">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['curriculum_name']; ?></td>
                                                <td><?php echo $row['semester']; ?></td>
                                                <td><?php echo $row['code']; ?></td>
                                                <td><?php echo $row['subject_name']; ?></td>
                                                <td><?php echo $row['sks']; ?></td>
                                                <td><?php echo $row['type']; ?></td>
                                                <td><?php echo $row['pre_requisite']; ?></td>
                                                <td>
                                                    <form action="edit_curriculum.php" method="POST">
                                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="edit" class="btn btn-success btn-sm"><i class="fas fa-edit nav-icon"></i>EDIT</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="edit_curriculum.php" method="POST">
                                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash nav-icon"></i>DELETE</button>
                                                    </form>
                                                </td>
                                    <?php
                                        }
                                    } else {
                                        echo "No Data Found";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
