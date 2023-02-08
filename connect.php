<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];


$conn=mysqli_connect('localhost', 'root', '', 'portfolio');


$sql="insert into registration set firstname='$firstname', lastname='$lastname', email='$email', subject='$subject', message='$message'";
$query = mysqli_query($conn,$sql);
if($query){
	echo "Submitted Successfully";
}else{
	echo "Cannot Submit";
}


$firstnameErr = $lastnameErr = $emailErr = $subjectErr = $messageErr ="";
$firstname = $lastname = $email = $subject = $messsage ="";

//Firstname
if($_SERVER["REQUEST_METHOD"] =="POST"){ 
	if (empty($_POST["firstname"])) {
		$firstnameErr = "*";
	}else{
		$firstname = test_input($_POST["firstname"]);
		// check if it is only characters
		if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
			$firstnameErr = "Invalid";
		}
	}
	}


//Lastname
if($_SERVER["REQUEST_METHOD"] =="POST"){ 
	if (empty($_POST["lastname"])) {
		$lastnameErr = "*";
	}else{
		$lastname = test_input($_POST["lastname"]);
		// check if it is only characters
		if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
			$lastnameErr = "Invalid";
		}
	}
	}	

//Email
if (empty($_POST["email"])) {
	$emailErr = "Email is required";
	}else{
	$email = test_input($_POST["email"]);
	
	// check if e-mail address is well-formed
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
		$emailErr = "Invalid Email format";
	}
	}


//Subject
if($_SERVER["REQUEST_METHOD"] =="POST"){ 
    if (empty($_POST["subject"])) {
        $subjectErr = "*";
    }else{
        $subject = test_input($_POST["subject"]);
        // check if it is only characters
        if (!preg_match("/^[a-zA-Z ]*$/", $subject)) {
            $subjectErr = "Invalid";
        }
    }
    }

//Message
if($_SERVER["REQUEST_METHOD"] =="POST"){ 
if (empty($_POST["message"])) {
	$messageErr = "*";
}else{
	$message = test_input($_POST["message"]);
	// check if it is only characters
	if (!preg_match("/^[a-zA-Z ]*$/", $message)) {
		$messageErr = "Invalid";
	}
}
}

function test_input($data) {
		$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}


?>
