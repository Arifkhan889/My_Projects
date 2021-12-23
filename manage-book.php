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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="bookcode.php">
      <div class="modal-body">
      <div class="form-group"> 
        <label>Author Name</label>
      <input type="text" class="form-control" name="author" placeholder="Author Name">
      </div>
       <div class="form-group"> 
        <label>Book Title</label>
    <input type="text" class="form-control" name="title" placeholder="Book Title">
      </div>
      <div class="form-group"> 
        <label>Published Place</label>

      <input type="text" class="form-control email_id" name="published-place" placeholder="Published Place">
      </div>
       <div class="form-group"> 
        <label>Publication Year</label>

        <label class="email_erro"></label>
      <input type="text" class="form-control email_id" name="publish-year" placeholder="Your class">
      </div>
      <div class="form-group"> 
        <label>Location of Library</label>

        <label class="email_erro"></label>
      <input type="text" class="form-control email_id" name="location" placeholder="Location of Library">
      </div>
     <div class="row">
        <div class="col-md-6">
        <div class="form-group"> 
        <label>Copies of Book</label>
      <input type="text" class="form-control" name="copies" placeholder="Copies of Book">
      </div>
      </div>
      <div class="col-md-6">
      <label>Status</label><br>
      <select name="status" class="form-control">
        <option   value="Active">Active</option>
        <option  value="Deactive">Deactive</option>
      </select>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="bookcode.php">
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
              <li class="breadcrumb-item active">Added Books</li>
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
                <h3 class="card-title">Added Books </h3>
 <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm float-right">Add Book</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">                                             
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Author Name</th>
                    <th>Title of Book</th>
                    <th>Published Place</th>
                    <th>Publication Year</th>
                     <th>Location of Library</th>
                     <th>Creation Date</th>
                    <th>Copies of Book</th>
                    <th>Status</th>
                    <th>Updation Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                  $query="SELECT * FROM books ";
                  $result=mysqli_query($conn,$query);
                  if(mysqli_num_rows($result)>0)
                   {
                     foreach ($result as $row) {
                       // code...

                      ?>
                            <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['published-place']; ?></td>
                    <td><?php echo $row['publish-year']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['RegDate']; ?></td>
                    <td><?php echo $row['copies']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['UpdationDate']; ?></td>
                    <td>
                      <a href="edit-book.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm">Edit &nbsp</a>
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

<!-- <script>
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
</script> -->
<script>
  //for deleting data from books registered table
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