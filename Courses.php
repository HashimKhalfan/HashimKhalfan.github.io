<?php
//connecting to the class "database" and the database
require_once 'connection/conn.php';

$emailErr = " "; 


//if(isset($_POST['login'])){
	
    if(isset($_POST['login']) && $_SERVER["REQUEST_METHOD"] == "POST"){

	//retrieve or fetch the form data
    $email= $_POST['login_email'];
    $password= $_POST['login_password'];

    if($email === 'admin' && $password === 'admin'){
        header("Location: CoursesAdmin.php");
        exit();

    //}elseif($username === '$_POST["login_username"]' && $password === '$_POST["login_password"]')

     }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql= "SELECT * FROM users WHERE email = '$email' and password ='$password' ";
    //$result=$this->conn->query($sql);   
    $result= $conn->query($sql);
    if($result->num_rows === 1){

        header("Location: CoursesUser.php");
        exit();
    }else{
       // echo "Wrong email or password ";
        $emailErr = "Wrong Email or Password";
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

body {
  
    background-color: white;
}
.form-container-register{
    border: 1.5px solid grey;
    width: 35%;
    border-color:#ccc;
    border-radius: 5px;
    margin-left:auto;
    margin-right:auto;
    padding: 5px;
    }

    .error {
color: Red;
}

</style>

</head>

<body>  
<ul>
   <a href="index.php"> Home</a>
   <a href="AboutMe.php">  About Me</a>
	<a href="Register.php"> Register</a>
  <a class="active" href="Courses.php"> Courses</a> 
  <a href="CV.php"> CV</a> 
  <a href="Contacts.php"> Contacts</a> 
</ul>
<br>
<br>
<br>


    <br>
   
    <br>
    <h2> Login</h2>

    <p> Please Login to
    display
    information about the various courses
</p>


<div class="form-container-register">
<form method="POST" action="Courses.php">

        <br><label for="email">Email</label>
        <input type="text" id="email" placeholder="Enter your Email" name="login_email" 
        style="height:20px;width:60%; position: relative; left:53px;" required><br><br>

        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your Password" name="login_password"
        style="height:20px;width:60%; position: relative; left: 26px; " required> <br><br>
        
        <input type="submit" name="login" value="Login"
         style="height:26px;width:61.5%; position:relative; left:99px; ">
<br>
<br>

        </form>
</div>
<br>

<span class="error" style="position: relative; left:575px;">  <?php echo $emailErr; ?> </span>
<br><br>
     <br><br><br><br>
     <br><br>

    

</body>
</html>


