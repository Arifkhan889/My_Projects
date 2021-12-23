<?php 
//external files included
// include 'include/header.php';
// include 'include/navbar.php';
// include 'include/side-bar.php';
// session_start();

include 'connection/dbcon.php';
//check live for email exit or not
if (isset($_POST['check_Emailbtn'])) {
 	$email=$_POST['email'];
 	//for checking email 
		$checkemail="SELECT email FROM librarian WHERE email='$email'";
		$run_query=mysqli_query($conn,$checkemail);
		if(mysqli_num_rows($run_query)>0){
        echo "email already exist";
		}
		else{
          echo "it's not match";
		}
 } 
 $message = " ";
if(isset($_POST['addusers']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$pass=$_POST['password'];
	$conpass=$_POST['confirmpassword'];

	//for confirm password
	if($name=="" || $email==" " || $phone=="" || $pass==" " || $conpass=="" ){
		
		$message = "<h5 style='color:red; text-align:center;'>Action could not perform because Some Feild ere empty</h5>";
		// header("Location: add_book.php");
		
		}else{
			$message = "<h5 style='color:green; text-align:center;'>Book added successfully</h5>";
	if($pass == $conpass){
		//for checking email 
		$checkemail="SELECT email FROM librarian WHERE email='$email'";
		$run_query=mysqli_query($conn,$checkemail);
		if(mysqli_num_rows($run_query)>0){
          //email already exist
			$_SESSION['status']="email already exist";
		    header("Location: add-librarian.php");
		    exit();
		}
		else{
			//Record nor found

		$sql="INSERT INTO librarian (name,email,phone,password) VALUES('$name','$email','$phone','$pass')";
	     $query=mysqli_query($conn,$sql);
	     if($query){
		 $_SESSION['status']="librarian added successfully";
		//  header("Location: add-librarian.php");
	}
	else{
		$_SESSION['status']="librarian failed";
		header("Location: add-librarian.php");
	}
	}
	
	}
	else{
		$_SESSION['status']= "password and confirm password does not match";
		header("Location: add-librarian.php");

	}
}
}
//for updating form data
if(isset($_POST['updateuser'])){
	$id=$_POST['id'];
    $name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$pass=$_POST['password'];
	
  $query="UPDATE librarian SET name='$name', email='$email', phone='$phone',password='$pass' where id='$id'";
	$result=mysqli_query($conn,$query);
	if($query){
		$_SESSION['status']="librarian Updated successfully";
		header("Location: add-librarian.php");
	}
	else{
		$_SESSION['status']="librarian Updated failed";
		header("Location: add-librarian.php");
	}
	
	}

//for deleting data from Librarian registered table 
if(isset($_POST['Deleteuserbtn'])){
	$userid=$_POST['delete_id'];
	$query="DELETE FROM librarian WHERE id='$userid'";
	$result=mysqli_query($conn,$query);
	if($query){
		$_SESSION['status']="librarian Deleted successfully";
		header("Location: add-librarian.php");
	}
	else{
		$_SESSION['status']="librarian Record Deleted failed";
		header("Location: add-librarian.php");
	}
}
?>