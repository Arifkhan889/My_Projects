<?php 
//external files included

include 'include/header.php';
include 'include/navbar.php';
include 'include/side-bar.php';
include 'connection/dbcon.php';
include 'code.php';
// $nameErr = $rollnoErr = $emailErr = $classErr = $sectionErr = $passErr = $cpassErr = "";
// $name = $rollno = $email = $class = $section = $pass = $cpass = "";
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (empty($_POST["name"])) {
//     $nameErr = "Name is required";
//   } else {
//     $name = test_input($_POST["name"]);
//   }

//    if (empty($_POST["rollno"])) {
//     $rollnoErr = "Roll NO is required";
//   } else {
//     $rollno = test_input($_POST["rollno"]);
//   }

//  if (empty($_POST["email"])) {
//     $emailErr = "Email is required";
//   } else {
//     $email = test_input($_POST["email"]);
//   }

//    if (empty($_POST["class"])) {
//     $classErr = "Class is required";
//   } else {
//     $class = test_input($_POST["class"]);
//   }

//    if (empty($_POST["section"])) {
//     $sectionErr = "section is required";
//   } else {
//     $section = test_input($_POST["section"]);
//   }

//     if (empty($_POST["password"])) {
//     $passErr = "section is required";
//   } else {
//     $$pass = test_input($_POST["password"]);
//   }
//     if (empty($_POST["confirmpassword"])) {
//     $cpassErr = "section is required";
//   } else {
//     $cpass = test_input($_POST["confirmpassword"]);
//   } }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="add-student.php ">
      <div class="modal-body">
      <div class="form-group"> 
        <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Your Name">
      </div>
      <span class="error">* <?php echo $nameErr;?></span>
       <div class="form-group"> 
        <label>Roll No</label>
    <input type="text" class="form-control" name="rollno" placeholder="Your Roll No">
      </div>
      <span class="error">* <?php echo $rollnoErr;?></span>
      <div class="form-group"> 
        <label>Email</label>

        <label class="email_erro"></label>
      <input type="Email" class="form-control email_id" name="email" placeholder="Your  E-Mail">
      <span class="error">* <?php echo $emailErr;?></span>
      </div>
       <div class="form-group"> 
        <label>Class</label>

        <label class="email_erro"></label>
      <input type="text" class="form-control" name="class" placeholder="Your class">
      </div>
      <span class="error">* <?php echo $classErr;?></span>
      <div class="form-group"> 
        <label>Section</label>

        <label class="email_erro"></label>
      <input type="text" class="form-control " name="section" placeholder="Class Section">
      </div>
     <div class="row">
        <div class="col-md-6">
        <div class="form-group"> 
        <label>Password</label>
      <input type="Password" class="form-control" name="password" placeholder="Enter Password">
      <span class="error">* <?php echo $passErr;?></span>
      </div>
      </div>
      <div class="col-md-6">
        <div class="form-group"> 
        <label>Confirm Password</label>
      <input type="Password" class="form-control" name="confirmpassword" placeholder="Enter Password">
      <span class="error">* <?php echo $cpassErr;?></span>
      </div>
      </div>
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addusers" class="btn btn-primary">Save</button>
      </div></form>
    </div>
  </div>
</div>
<!-- For deleting user from the user registered table  -->
<div class="modal fade" id="DeleteId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="code.php">
      <div class="modal-body">
        <input type="hidden" name="delete_id" class="delete_user_id">
        <p>Are you sure you want to delete data.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="Deleteuserbtn" class="btn btn-primary">Yes, Delete</button>
      </div></form>
    </div>
  </div>
</div>
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
              <li class="breadcrumb-item active">Registered Student</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <!-- /.card -->
<div class="container">
  <div class="row">
    
    <div class="col-md-12">
      <?php 
     if(isset($_SESSION['status'])){
       echo "<h4> ".$_SESSION['status']."</h4>";
       unset($_SESSION['status']);
     }

      ?>
   
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Student</h3>
 <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm float-right">Add Student</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">       
              <?php  echo $message; ?>                                         
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Email</th>
                    <th>Class</th>
                     <th>Section</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                  $query="SELECT * FROM student ";
                  $result=mysqli_query($conn,$query);
                  if(mysqli_num_rows($result)>0)
                   {
                     foreach ($result as $row) {
                       // code...

                      ?>
                            <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['rollno']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td>
                      <a href="edit-student.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm">Edit &nbsp</a>
                      <button type="button" value="<?php echo $row['id'];?>" class="btn btn-danger btn-sm deletebtn">
                        Delete &nbsp</button>
                      
                    </td>
                  </tr>
                      <?php 
                     }
                   }
                  else{
                  ?>  
                  <tr>
                    <td>No Record Found</td>
                  </tr>
                  <?php 
                  }
                    ?>
                  
            
                  </tfoot>
                   </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
             </div>
  </div>
</div>
   </div>

<?php 
// footer is included
include 'include/script.php';
?>

<script>
  //for live checking email exit or not
  $(document).ready(function(){ 
   $('.email_id').keyup(function(e){
    var email = $('.email_id').val();
    // console.log(email);
    $.ajax({
      type: "POST",
      url: "code.php",
      data: {
      'check_Emailbtn':1,
      'email':email,
      },
       success: function (response){
        $('.email_error').text(response);
       }

    });

   });
   
  });
</script>
<script>
  //for deleting data from student registered table
$(document).ready(function(){
  $('.deletebtn').click(function(e){
     e.preventDefault();
     var id=$(this).val();
     //console.log(id);
    $('.delete_user_id').val(id);
    $('#DeleteId').modal('show');
  });
});
</script>
<?php 
 
include 'include/footer.php';
?>