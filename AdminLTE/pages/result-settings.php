<?php 
    include_once("myclass.php");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Result Setup</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include ('nav.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Result Setup</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Result Setup</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <!-- Row -->
        <div class="row">
                    <div class="col-md-4 col-12">
                                <div class="card card-secondary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title ">
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                            Continous Assesment Scores
                                        </h3>
                                    </div>
                                        <div class="card-body pb-0">
                                            <form method="POST" id="createClassCategory">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>CA 1</label>
                                                            <input type="text" name="ca1" class="form-control" placeholder="CA 1">
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>CA 2</label>
                                                            <input type="text" name="ca2" class="form-control" placeholder="CA 2">
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>CA 3</label>
                                                            <input type="text" name="ca3" class="form-control" placeholder="CA 2">
                                                        </div>

                                                    </div>
                                                    </div>
                                                <div class="row d-flex justify-content-between">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Exam</label>
                                                            <input type="text" name="exam" class="form-control" placeholder="70">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group float-right">
                                                      <button class="btn btn-secondary createClassCategory" name="AddResult">Save</button>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </form>
                                           
                                        </div>
                                </div>
                    </div>
                    
                    <div class="col-md-5 col-12">
                                <div class="card card-secondary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title ">
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                            Grades Setup
                                        </h3>
                                    </div>
                                    
                                        <div class="card-body pb-0">
                                                <table id="example1" class="table  table-striped">
                                                    <thead>
                                                        <th>CA1</th>
                                                        <th>CA2</th>
                                                        <th>CA3</th>
                                                        <th>Exam</th>
                                                        <th>Grade</th>
                                                        <th>Remarks</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php echo $ca1; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ca2; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ca3; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $exam; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $grades['grade']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $remarks['remark']; ?>
                                                        </td>
                                                        </tr>     
                                                    </tbody>

                                                </table>
                                        </div>
                                </div>
                    </div>
        </div>
       
          <!-- /.card-body -->
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
       
        <!-- /.card -->

        <!-- /.card -->

      
        <!-- /.row -->
      
        <!-- /.row -->
       
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include ('footer.php'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
