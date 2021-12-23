<?php 
//external files included
// include 'include/header.php';
// include 'include/navbar.php';
// include 'include/side-bar.php';
// session_start();
$nameErr = $rollnoErr = $emailErr = $classErr = $sectionErr = $passErr = $cpassErr = "";

include 'connection/dbcon.php';
//check live for email exit or not
if (isset($_POST['check_Emailbtn'])) {
 	$email=$_POST['email'];
 	//for checking email 
		$checkemail="SELECT email FROM student WHERE email='$email'";
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
	$roll=$_POST['rollno'];
	$email=$_POST['email'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$pass=$_POST['password'];
	$conpass=$_POST['confirmpassword'];

	//for confirm password
	if($name=="" || $roll==" " || $email=="" || $class==" " || $section=="" || $pass==" " || $conpass==" "){
		
		$message = "<h5 style='color:red; text-align:center;'>Action could not perform because Some Feild ere empty</h5>";
		// header("Location: add_book.php");
		
		}else{
			$message = "<h5 style='color:green; text-align:center;'>Book added successfully</h5>";
	if($pass == $conpass){
		//for checking email 
		$checkemail="SELECT email FROM student WHERE email='$email'";
		$run_query=mysqli_query($conn,$checkemail);
		if(mysqli_num_rows($run_query)>0){
          //email already exist
			$_SESSION['status']="email already exist";
		    header("Location: add-student.php");
		    exit();
		}
		else{
			//Record nor found

		$sql="INSERT INTO student (name,rollno,email,class,section,password) VALUES ('$name','$roll','$email','$class','$section','$pass')";
	     $query=mysqli_query($conn,$sql);
	     if($query){
		 $_SESSION['status']="User added successfully";
		 header("Location: add-student.php");
	}
	else{
		$_SESSION['status']="User failed";
		header("Location: add-student.php");
	}
	}
	
	}
	else{
		$_SESSION['status']= "password and confirm password does not match";
		header("Location: add-student.php");

	}
}
}
//for updating form data
if(isset($_POST['updateuser'])){
	$id=$_POST['id'];
    $name=$_POST['name'];
	$roll=$_POST['rollno'];
	$email=$_POST['email'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$pass=$_POST['password'];
	
  $query="UPDATE student SET name='$name', rollno='$roll', email='$email', class='$class',section='$section',password='$pass' where id='$id'";
	$result=mysqli_query($conn,$query);
	if($query){
		$_SESSION['status']="Student Updated successfully";
		header("Location: add-student.php");
	}
	else{
		$_SESSION['status']="Student Updated failed";
		header("Location: add-student.php");
	}
	
	}

//for deleting data from student registered table 
if(isset($_POST['Deleteuserbtn'])){
	$userid=$_POST['delete_id'];
	$query="DELETE FROM student WHERE id='$userid'";
	$result=mysqli_query($conn,$query);
	if($query){
		$_SESSION['status']="Student Deleted successfully";
		header("Location: add-student.php");
	}
	else{
		$_SESSION['status']="Student Deleted failed";
		header("Location: add-student.php");
	}
}
?>