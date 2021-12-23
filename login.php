<?php 
session_start();
//external files included
include 'include/header.php';
include 'connection/dbcon.php';
if(isset($_SESSION['auth'])){
	$_SESSION['status']="You are already Logged in";
	header("Location: index.php");
}
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $query="SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $run_query=mysqli_query($conn, $query);
    if (mysqli_num_rows($run_query) > 0 ) {
    	echo "workong";
    	foreach ($run_query as $row) {
    		// code...
    		$user_id=$row['id'];
    		$user_name=$row['name'];
    		$user_email=$row['email'];
    		$user_phone=$row['phone'];

    	}
            
             $_SESSION['auth'] = true;
             $_SESSION['auth_user'] = [
             	'user_id'=>$user_id,
             	'user_name'=>$user_name,
             	'user_email'=>$user_email,
             	'user_phone'=>$user_phone

             ];
             $_SESSION['status']="Logged In successfully";
			    header("Location: index.php");
    }
    else{
				$_SESSION['status']="Email or password does not match";
			    header("Location: login.php");
    }
}

?>
<div class="section">
	<div class="container"> 
    <div class="row justify-content-center"> 
     <div class="col-md-5 my-5">
     	<div class=" card my-5">
     	<div class="card-header bg-light">
     	<h5>Login Please</h5>
     	</div>
     	<div class="card-body">
     		<?php 
             include('message.php');
            ?>
     	<form method="post" action="">
     	<div class="form-group">
     	<label for="">Email Id</label>
     	<input type="Email" name="email" class="form-control" placeholder="Email Id">
     	</div>
     	<div class="form-group">
     	<label for="">Password</label>
     	<input type="Password" name="password" class="form-control" placeholder="password">
     	</div>
     	<hr>
     	<div class="form-group">
     		<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
     	</div>
     	</form>
     	</div>
     	</div>
     </div>
    </div>
	</div>

</div>

<?php 
// footer is included
include 'include/script.php';
include 'include/footer.php';
?>