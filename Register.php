<?php
//connecting to the class "database" and the database
require_once 'connection/conn.php';

$firstnameErr = $middlenameErr = $surnameErr = $usernameErr =  $passwordErr = $emailErr = $mobileErr = " "; 

$good = " ";

$bad = " ";

if(isset($_POST['Submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
//if($_SERVER["REQUEST_METHOD"] == "POST") 

    /*
$nameErr= $emailErr = $genderErr = $websiteErr = " ";
$name = $email =  $website = $comment = $gender = " ";
*/


	//retrieve or fetch the form data
	$firstname= $_POST['fname'];
    $middlename= $_POST['lname'];
    $surname= $_POST['sname'];
    $username= $_POST['uname'];
    $password= $_POST['password'];
    
    $email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$facebook = $_POST['facebook'];
	$instagram = $_POST['instagram'];
	$twitter = $_POST['twitter'];
    
		/*
  if(empty($firstname)||!ctype_alpha($firstname)) {
		$firstnameErr = "* FirstName is required";
	} 
  

   if(empty($middlename)||!ctype_alpha($middlename)) {
    $middlenameErr = "* middleName is required";
		
	} 

  
   if(empty($surname)||!ctype_alpha($surname)) {
		$surnameErr = "* surName is required";
	} 

   
  if(empty($username)||!ctype_alpha($username)) {
		$usernameErr = "* userName is required";
	} 
  */

     /*  not used
  if(empty($password)||strlen($password)<10 || 
    !preg_match('/[A-Za-z]/',$password) ||
    !preg_match('/[0-9]/',$password) ||
    !preg_match('/[\W_]/',$password)) {
    $passwordErr = "* Password is required";
}
*/
  
if(empty($password)) {
  $passwordErr = "* Password is Required";
}elseif(strlen($password)<10 ){
$passwordErr =  "<br>"."* Password should be at least 10 characters long";
}elseif(!preg_match('/[A-Za-z]/',$password) ||
!preg_match('/[0-9]/',$password) ||
!preg_match('/[\W_]/',$password)){
$passwordErr = "<br>"."* Password should contain both alphanumeric & special characters";
}

/*
if (strlen($course_name) > 30) {
  $errors[] = "Course name cannot exceed 30 characters.";
}

if(strlen($password)>30 ){
  $passwordErr =  "<br>"." Course name cannot exceed 30 characters.";
}*/

/* not used
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "* Invalid email format";
  }
*/

//check if the email address is not empty & is well formed
  if(empty($email)) {
    $emailErr = "* Email is Required";
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $emailErr = "* Invalid email format";
}

/*
  if(empty($mobile)||!ctype_digit($mobile)) {
    $mobileErr = "* mobile digits is required";
		
	} 
*/

  //last
//if(empty($firstnameErr && $middlenameErr && $surnameErr && $usernameErr &&  $passwordErr && $emailErr && $mobileErr)){ 



/*

  if(empty($_POST["fname"])){
		$nameErr = "Name is required";
	} else{		
	$firstname = test_input($_POST["name"]);
	
	//check if name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
		$nameErr = "Only letters and whitespace allowed";
		}
	}
    */
	/*
	
	if(empty($_POST["email"])){
		$emailErr = "Email is required";
	} else{	
	$email = test_input($_POST["email"]); 
	
	//check if the email address is well formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
		}
	}
	
	if(empty($_POST["website"])){
		$website = " ";
	} else{	
	$website = test_input($_POST["website"]);
	}
	
	
	if(empty($_POST["comment"])){
		$comment = " ";
	} else{	
	$comment = test_input($_POST["comment"]);
	}
	
	
	if(empty($_POST["gender"])){
		$genderErr = "Gender is required";
	} else{	
	$gender = test_input($_POST["gender"]);
	}
	
}


function test_input($data) {
	$data =trim($data);
	$data= stripslashes($data);
	$data=htmlspecialchars($data);
	
	return $data;
}

  if($email === 'admin' && $password === 'admin'){
*/

//if(empty empty($passwordErr && $emailErr)){ 
if( $passwordErr == " " && $emailErr == " "){ 
 

	//SQL Statement to Insert Data into the Table
	$sql="INSERT INTO users (firstname, middlename, surname, username, password, email, mobile, facebook, instagram, twitter)
	VALUES ('$firstname', '$middlename', '$surname', '$username', '$password', '$email', '$mobile', '$facebook', '$instagram', '$twitter')";
				
			//check if the query for the statement to "Insert Data" in the table was successful
			if($conn->query($sql)===TRUE) {
			//	echo "Registered Successfully";
       $good = "Registered Successfully, Please proceed to Courses and Login";

           
			}else{	
				echo "Error: " .$conn->error;
			}
			
			

			}
}

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title> 
    Official Site of Hashim Khalfan
</title>
  <link rel="stylesheet" href="css/edit.css"> 
  <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="description" content="Official Site of Hashim Khalfan">
    <meta name="keywords" content="Online,University,College,Student,Voting,System">
    <meta name="author" content="Hashim Khalfan"> 
    <meta name=viewport content="width=device-width,initial-scale=1.0">

    <style>
.error {
color: Red;
}
.good{
  color: green;
}
.bad{
  color: Red;
}


body {

    background-color: white;
}

label{
    
    font-size:14px;
    font-weight: 100;
   
}
input[type=text],select,
       textarea {
          
          /* font-style: italic;*/
       }
       input[type=email],select,
       textarea {
          /* font-style: italic;*/
          
       }
       .form-container-register label {
            font-size:16px;
            font-family: cambria;
    }

.br{
  display: block;
  margin-bottom: 0.5em;
}


.brtwo{
  display: block;
  margin-bottom: -.2em;
}


.brtree{
  display: block;
  margin-bottom: -.4em;
}

</style>


</head>

<body>  

<ul>
   <a href="index.php"> Home</a>
   <a href="AboutMe.php">  About Me</a>
	<a class="active" href="Register.php"> Register</a>
  <a href="Courses.php"> Courses</a> 
  <a href="CV.php"> CV</a> 
  <a href="Contacts.php"> Contacts</a> 
</ul>
<br>
<br>

<br>
<h2>Create an Account</h2> 
<span class="good" style="position: relative; left:485px;">  <?php echo $good; ?> </span>


<span class="brtree"></span>

<p>Welcome, user! Please create an account to get access to specific parts of the website. </p> 
<span class="brtree"></span>
<span class="brtree"></span>

<p> <span class="error">
<span class="brtree">
<!--
*required field --></span> 
</span></p>

<?php
/*
<span class="good" style="position: relative; left:105px;">  <?php echo $surnameErr; ?> </span>


if(empty($firstnameErr && $middlenameErr && $surnameErr && $usernameErr &&  $passwordErr && $emailErr && $mobileErr)){ 
?>

<p> <span class="error"> *required  </span> </p>

<?php
}else{
?>
<p> <span class="error"> *required field </span> </p>
<?php

}*/
?>

<div class="form-container-register">
<form method="POST" action="Register.php">
    
    <label for="firstname" style="position: relative; left:25px;">First name</label> 
    <label for="middlename" style="position: relative; left:155px;">Middle name</label>
    <label for="surname" style="position: relative; left:273px;">Surname</label>
    <br>

    <input type="text" id="firstname" placeholder="Enter your Firstname" name="fname" 
    style="height:20px;width:30%; position: relative; left:25px;">
  
    <input type="text" id="middlename" placeholder="Enter your Middlename" name="lname" 
    style="height:20px;width:30%; position: relative; left:25px;">
    
    <input type="text" id="surname" placeholder="Enter your Surname" name="sname" 
    style="height:20px;width:30%; position: relative; left:25px;">
    <!--<br>

    <span class="error" style="position: relative; left:30px;">  <?php /*echo $firstnameErr; ?> </span>
    <span class="error" style="position: relative; left:75px;">  <?php echo $middlenameErr; ?> </span>
    <span class="error" style="position: relative; left:105px;">  <?php echo $surnameErr; */?> </span>
 <span class="br"></span>
  <br> -->
 
  


    <label for="username" style="position: relative; left:25px;">Username</label>
    <input type="text" id="username" placeholder="Enter your username" name="uname" 
    style="height:20px;width:45%; position: relative; left: 55px;">
    <span class="error" style="position: relative; left:60px;">  <?php echo $usernameErr; ?> </span><br>
  

    <label for="password" style="position: relative; left:25px;">Password</label>
    <input type="password" id="password" placeholder="Enter your Password" name="password"
    style="height:20px;width:45.5%; position: relative; left: 55px; "> 
    <span class="error" style="position: relative; left:65px;"> <?php echo $passwordErr; ?> </span> <br>
    <span class="br"></span>

    <label for="cv" style="position: relative; left:25px;">CV</label>
    <input type="file" id="cv" placeholder="upload your CV" name="cv" accept="application/pdf"
    style="height:20px;width:46%; position: relative; left:102px;">
    <span class="br"></span>

    <label for="contacts" style="position: relative; left:25px;">Contacts:</label>
    <br>
    <input type="email" id="email" placeholder="Enter your email address" name="email" 
    style="height:20px;width:65%; position: relative; left:25px;">
    <span class="error" style="position: relative; left:30px;">  <?php echo $emailErr; ?> </span>

    <input type="text" id="mobilenumber" placeholder="Enter your mobile number" name="mobile" 
    style="height:20px;width:65%; position: relative; left:25px;">
    <span class="error" style="position: relative; left:30px;">  <?php echo $mobileErr; ?> </span>
    
    <input type="text" id="facebookacc" placeholder="Enter your Facebook account" name="facebook" 
    style="height:20px;width:65%; position: relative; left:25px;">
    
    <input type="text" id="instagramacc" placeholder="Enter your Instagram account" name="instagram" 
    style="height:20px;width:65%; position: relative; left:25px;">

    <input type="text" id="twitterac" placeholder="Enter your Twitter account" name="twitter" 
    style="height:20px;width:65%; position: relative; left:25px;">
    
    <input type="submit" name="Submit" value="Submit"
     style="height:26px;width:50.5%; position:relative; left:122.5px; ">
</form>
</div>
<br>
<!--<span class="good" style="position: relative; left:575px;">  <?php //echo $good; ?> </span>
-->
<!--
<button style="height:35px; width:10%; font-size:18px; text-align:center;" onclick="window.location.href='Reg.php';">
GO REG
</button>
-->
</body>
</html>


