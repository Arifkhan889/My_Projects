<?php 
//external files included
include 'include/header.php';
include 'include/navbar.php';
include 'include/side-bar.php';
include 'connection/dbcon.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <?php 
             include 'message.php';
            ?>
          </div>
       
          <!-- ./col -->
       
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        </section>
   </div>

<?php 
// footer is included
include 'include/script.php';
include 'include/footer.php';
?>