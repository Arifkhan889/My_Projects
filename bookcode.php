<?php 
//external files included
// include 'include/header.php';
// include 'include/navbar.php';
// include 'include/side-bar.php';
// session_start();

// include 'connection/dbcon.php';
// //check live for email exit or not
// if (isset($_POST['check_Emailbtn'])) {
//  	$email=$_POST['email'];
//  	//for checking email 
// 		$checkemail="SELECT email FROM student WHERE email='$email'";
// 		$run_query=mysqli_query($conn,$checkemail);
// 		if(mysqli_num_rows($run_query)>0){
//         echo "email already exist";
// 		}
// 		else{
//           echo "it's not match";
// 		}
//  } 
$message = " ";
if(isset($_POST['addusers']))
{
	$author=$_POST['author'];
	$title=$_POST['title'];
	$place=$_POST['published-place'];
	$year=$_POST['publish-year'];
	$location=$_POST['location'];
	$copies=$_POST['copies'];
	$status=$_POST['status'];
	if($author=="" || $title==" " || $place=="" || $year==" " || $location=="" || $copies==" " || $status==" "){
		
    $message = "<h5 style='color:red; text-align:center;'>Action could not perform because Some Feild ere empty</h5>";
	// header("Location: add_book.php");
	
	}else{

$sql="INSERT INTO `books` (`author`, `title`, `published-place`, `publish-year`, `location`, `copies`, `status`) VALUES ('$author','$title','$place','$year','$location','$copies','$status')";

	     $query=mysqli_query($conn,$sql);
	     if($query){
		 $_SESSION['status']="User added successfully";
		//  header("Location: add_book.php");
		$message = "<h5 style='color:green; text-align:center;'>Book added successfully</h5>";
	}
	else{
		$_SESSION['status']="User failed";
		header("Location: add_book.php");
	}
	
	
	}
}
	//for dropdown field
// if(isset($_POST['addusers']))
// {
// if(!empty($_POST['status'])){
// 	$selected=$_POST['status'];
// 	echo 'you have choosen'.$selected;
// }
// else{
// 	echo "please select the value";
// }}
//for updating form data
if(isset($_POST['updateuser'])){
	$id=$_POST['id'];
	$author=$_POST['author'];
	$title=$_POST['title'];
	$place=$_POST['published-place'];
	$year=$_POST['publish-year'];
	$location=$_POST['location'];
	$copies=$_POST['copies'];
	$status=$_POST['status'];
	
  $query="UPDATE `books` SET `author`='$author',`title`='$title',`published-place`='$place',`publish-year`='$year',`location`='$location',`copies`='$copies',`status`='$status' where id='$id'";
	$result=mysqli_query($conn,$query);
	if($query){
		$_SESSION['status']="Record Updated successfully";
		header("Location: manage-book.php");
	}
	else{
		$_SESSION['status']="Record Updated failed";
		header("Location: add_book.php");
	}
	
	}

//for deleting data from Record registered table 
if(isset($_POST['Deleteuserbtn'])){
	$userid=$_POST['delete_id'];
	$query="DELETE FROM books WHERE id='$userid'";
	$result=mysqli_query($conn,$query);
	if($query){
		$_SESSION['status']="Record Deleted successfully";
		header("Location: add_book.php");
	}
	else{
		$_SESSION['status']="Record Deleted failed";
		header("Location: add_book.php");
	}
}
?>