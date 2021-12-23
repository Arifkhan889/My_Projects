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
              <li class="breadcrumb-item active"> Edit Registered Student</li>
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
                <h3 class="card-title"> Edit Registered Student</h3>
 <a href="add-student.php" class="btn btn-primary btn-sm float-right">Back</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">                                             
             <div class="row">
             	 <div class="col-md-6">
       <form method="post" action="code.php">
      <div class="modal-body">
      	<?php 
      	if(isset($_GET['id'])){
      	$user_id=$_GET['id'];
         $query="SELECT * FROM student where id='$user_id'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0){
        foreach($result as $row){
        	?>
     <input type="text" name="id" value="<?php echo $row['id'] ?>">
   <div class="modal-body">
      <div class="form-group"> 
        <label>Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
      </div>
       <div class="form-group"> 
        <label>Roll No</label>
    <input type="text" class="form-control" name="rollno" value="<?php echo $row['rollno'] ?>">
      </div>
      <div class="form-group"> 
        <label>Email</label>

        <label class="email_erro"></label>
      <input type="Email" class="form-control email_id" name="email"value="<?php echo $row['email'] ?>">
      </div>
       <div class="form-group"> 
        <label>Class</label>

        <label class="email_erro"></label>
      <input type="text" class="form-control email_id" name="class" value="<?php echo $row['class'] ?>">
      </div>
      <div class="form-group"> 
        <label>Section</label>

        <label class="email_erro"></label>
      <input type="text" class="form-control email_id" name="section" value="<?php echo $row['section'] ?>">
      </div>
     
      <div class="form-group"> 
        <label>Password</label>
      <input type="Password" class="form-control"  value="<?php echo $row['password'] ?>" name="password" placeholder="Enter Password">
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