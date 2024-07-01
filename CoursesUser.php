<?php
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
    text-align:center;
}

    table{
        border-spacing:5px;
        border:black;
        margin-left:auto;
        margin-right:auto;
    }
    td{
        border:1 px solid black;
        border-style:solid;
        border-radius:10px;
        padding:5px;
        font-size:15px;
        font-family: cambria;
        border:1.5px solid cornflowerblue;
        border-radius: 10px;
        background-color: white;
       
    }
    th{
        background-color: whitesmoke;
        font-size:16px;
        font-family: cambria;
        border:1.5px solid cornflowerblue;
        border-radius: 10px;
        padding:5px;
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

  
    <h2> Welcome Dear Visitor</h2>
    
    <h2>This is Courses Display for Registered Visitors</h2>
    <!--
<ul>
  <li> <a href="index.php"> Home</a></li>
   <li> <a href="AboutMe.php">  About Me</a></li>
	<li><a href="Register.php"> Register</a></li>
    <li><a class="active" href="Courses.php"> Courses</a> </li>
    <li><a href="CV.php"> CV</a> </li>
    <li><a href="Contacts.php"> Contacts</a> </li>
</ul>
-->

<h2>VIEW DATA OF DATABASE </h2>
	
    <?php
    
    $sql = "SELECT coursename, coursecode, coursedescription, coursedepartment, semester, academicyear, courseinstructor, grade FROM coursedata";

    $result = $conn->query($sql);
    
    if($result->num_rows >0) {
        echo "<table border='1'> 
    <tr> 
     <th>Course name</th>             
    <th>Course Code</th> 
    <th>Course Description</th> 
    <th>Course Dept</th> 
    <th>Semester </th> 
    <th>Academic year</th> 
    <th>Course Instructor</th> 
    <th>Grade</th> 
    </tr>
    ";


        //output data of each row
        while($row = $result->fetch_assoc()){

            echo " <tr> <td> " . $row["coursename"]. 
            " </td><td> " . $row["coursecode"]. 
            " </td><td> " . $row["coursedescription"]. 
            " </td><td> " . $row["coursedepartment"]. 
            " </td><td> " . $row["semester"]. 
            " </td><td> " . $row["academicyear"]. 
            " </td><td> " . $row["courseinstructor"]. 
            " </td><td> " . $row["grade"]. 
            "</td></tr>";

    } 
    echo"</table>";
    
    }else {
        echo " <p>0 (ZERO) DATA Registered </p>";	
    }
    
    ?>

<br><br><br><br>

<button style="height:35px; width:10%; font-size:18px; text-align:center;" onclick="window.location.href='Courses.php';">
LOGOUT
</button>
	


<br><br><br><br>

    

</body>
</html>


