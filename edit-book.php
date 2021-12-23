<?php 
//external files included
session_start();
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
              <li class="breadcrumb-item active"> Edit Registered Books</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
  <div class="row">
    
    <div class="col-md-12">
    
   
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Edit Registered Books</h3>
 <a href="add_book.php" class="btn btn-primary btn-sm float-right">Back</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">                                             
             <div class="row">
               <div class="col-md-6">
       <form method="post" action="bookcode.php">
      <div class="modal-body">
        <?php 
        if(isset($_GET['id'])){
        $user_id=$_GET['id'];
         $query="SELECT * FROM books where id='$user_id'";
  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result) > 0){
        foreach($result as $row){
          ?>
     <input type="text" name="id" value="<?php echo $row['id'] ?>">
   <div class="form-group"> 
        <label>Author Name</label>
      <input type="text" class="form-control" name="author" value="<?php echo $row['author'] ?>">
      </div>
       <div class="form-group"> 
        <label>Book Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>">
      </div>
      <div class="form-group"> 
        <label>Published Place</label>

        <label class="email_erro"></label>
      <input type="text" class="form-control email_id" name="published-place" value="<?php echo $row['published-place'] ?>">
      </div>
       <div class="form-group"> 
        <label>Publication Year</label>

        <label class="email_erro"></label>
      <input type="text" class="form-control email_id" name="publish-year" value="<?php echo $row['publish-year'] ?>">
      </div>
      <div class="form-group"> 
        <label>Location of Library</label>
        <label class="email_erro"></label>
      <input type="text" class="form-control email_id" name="location" value="<?php echo $row['location'] ?>">
      </div>
     <div class="row">
        <div class="col-md-6">
        <div class="form-group"> 
        <label>Copies of Book</label>
      <input type="text" class="form-control" name="copies" value="<?php echo $row['copies'] ?>">
      </div>
      </div>
       <div class="col-md-6">
      <label>Status</label><br>
      <select name="status" class="form-control">
        <option  value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
        <option value="Active"  value="<?php echo $row['status'] ?>">Active</option>
        <option value="Deactive" value="<?php echo $row['status'] ?>">Deactive</option>
      </select>
      </div>
          <?php 
        }
  }
  else{
    echo "<h4>No Record Found</h4>";
      }
    
        }
        ?>
     
      <div class="modal-footer">
     
        <button type="submit" name="updateuser" class="btn btn-info">Update</button>
   </div> </form>
              </div>
          </div>
             </div>
             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
             </div>
  </div>
</section>
    </div>
    <?php 
// footer is included
include 'include/script.php';
include 'include/footer.php';
?>