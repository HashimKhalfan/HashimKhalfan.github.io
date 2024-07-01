<?php
//echo "lllL";
//connecting to the class "database" and the database
require_once 'connection/conn.php';

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
    <meta name="description" content="Hashim Khalfan Website">
    <meta name="keywords" content="Online,University,College,Student,Voting,System">
    <meta name="author" content="Hashim Khalfan"> 
    <meta name=viewport content="width=device-width,initial-scale=1.0">

    <style>

body {
 
   background-color: white;
  /*background-color:rgb(221, 215, 215);*/
}

.h1{
    font-family:cambria;
    font-style: italic;
    text-align:center;
    font-size:25px;
    padding-top: 1px;
    color:red;
  
    }
    td{
      background-color:rgb(236, 234, 234);
    
    }
</style>
</head>

<body>  
<ul>
   <a class="active" href="index.php"> Home</a>
   <a href="AboutMe.php">  About Me</a>
	<a href="Register.php"> Register</a>
  <a href="Courses.php"> Courses</a> 
  <a href="CV.php"> CV</a> 
  <a href="Contacts.php"> Contacts</a> 
</ul>

<br>
<br>
<br>
<h1 style="color:cornflowerblue;">Hashim Khalfan Website</h1>

<h2 style="color:grey;"> Welcome Dear Visitors !
</h2>
<br>




<!--
<h2>This is Home</h2>
This is my general Information 
<h2> Welcome Dear Visitors To the Official Site of Hashim Khalfan </h2>
<ul>
  <li> <a class="active" href="index.php"> Home</a></li>
   <li> <a href="AboutMe.php">  About Me</a></li>
	<li><a href="Register.php"> Register</a></li>
    <li><a href="Courses.php"> Courses</a> </li>
    <li><a href="CV.php"> CV</a> </li>
    <li><a href="Contacts.php"> Contacts</a> </li>
</ul>
This is my general information, Welcome!
-->


<table width="50%";>
<tr>
		<td width="48%"> 
    <p class="h1"> General Information </p>
		<p style="color:black;"> 
		
    Hello Visitors, welcome to my Website. My name is Hashim Khalfan Iddi.                  
I am a student software engineer and system administrator. Currently, I am studying
a bachelor of <br> science in Computer Science at the University of Dar Es Salaam. 
I am competent <br>in Programming languages of JavaScript, PHP, Java, C, and C++. <br>
My website is about registering a visitor's credentials, and then 
loging in to see my <br> course details.
<a href="AboutMe.php" style="color:black; text-decoration:none;">  Read More about me...</a>

  </p> 
		</td>	
</table>

<p> 



</p>
    

</body>
</html>


