<?php
//connecting to the class "database" and the database
require_once 'connection/conn.php';

$coursenameErr = $coursedescriptionErr = $courseinstructorErr = " ";
//$coursenameErr = $coursecodeErr = $coursedescriptionErr = $coursedeptErr = $semesterErr = $academicyearErr = $courseinstructorErr = $gradeErr = " ";
$good = " ";

//$coursenameErr && $coursecodeErr && $coursedescriptionErr && $coursedeptErr && $semesterErr && $academicyearErr && $courseinstructorErr && $gradeErr = " ";

/*
$coursenameErr = 
$coursecodeErr = 
$coursedescriptionErr =
$coursedeptErr =
$semesterErr = 
$academicyearErr = 
$courseinstructorErr =
$gradeErr =


$coursename = 
$coursecode = 
$coursedescription =
$coursedept =
$semester = 
$academicyear = 
$courseinstructor =
$grade =
*/

//$firstnameErr = $middlenameErr = $surnameErr = $usernameErr =  $passwordErr = $emailErr = $mobileErr = " "; 

//if(isset($_POST['submit'])){
if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){

//retrieve or fetch the form data
$coursename = $_POST['coursename'];
$coursecode = $_POST['coursecode'];
$coursedescription = $_POST['coursedescription'];
$coursedept = $_POST['coursedept'];
$semester = $_POST['semester'];
$academicyear = $_POST['academicyear'];
$courseinstructor = $_POST['courseinstructor'];
$grade = $_POST['grade'];


if(empty($coursename)) {
    $coursenameErr = "* Course Name is Required";
}elseif(strlen($coursename)>30 ){
    $coursenameErr =  "Course name cannot exceed 30 characters.";
}




if(empty($coursedescription)) {
    $coursedescriptionErr = "* Course Description is Required";    
}elseif(strlen($coursedescription)>50 ){
    $coursedescriptionErr =  "Course Description cannot exceed 50 characters.";
}


if(empty($courseinstructor)) {
    $courseinstructorErr = "* Course Instructor is Required";    
}elseif(strlen($courseinstructor)>30 ){
    $courseinstructorErr =  "Course Instructor cannot exceed 30 characters.";
}




/*
elseif(strlen($password)>30 ){
    $passwordErr =  "<br>"." Course name cannot exceed 30 characters.";
  }
*/



//if(empty($passwordErr && $emailErr)){ 
//if(empty($coursenameErr && $coursecodeErr && $coursedescriptionErr && $coursedeptErr && $semesterErr && $academicyearErr && $courseinstructorErr && $gradeErr)){ 
//if(empty($coursenameErr && $coursedescriptionErr && $courseinstructorErr)){ 
if($coursenameErr == " " && $coursedescriptionErr == " " && $courseinstructorErr == " "){ 



    $sql="INSERT INTO coursedata (coursename, coursecode, coursedescription, coursedepartment, semester, academicyear, courseinstructor, grade)
    VALUES ('$coursename', '$coursecode', '$coursedescription', '$coursedept', '$semester', '$academicyear', '$courseinstructor', '$grade')";
                            
			
			//check if the query for the statement to "Insert Data" in the table was successful
			if($conn->query($sql)===TRUE) {
				//echo "<br>Registered Successfully";

                $good = "Course Registered Successfully";
            //header('Location: CoursesAdmin.php');
           // exit();
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



    table{
        border-spacing:5px;
        border:black;
        margin-left:auto;
        margin-right:auto;
        text-align:center;
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
        background-color: rgb(195, 194, 194);
        font-size:16px;
        font-family: cambria;
        border:1.5px solid cornflowerblue;
        border-radius: 10px;
        padding:5px;
    }

    .title{
        font-weight: 1000;   
    font-family: calibri;
    text-align:center;
    font-size: 20px;
    font-style: italic;
    color: Red;
/*
    color:cornflowerblue;*/
    }
 .error {
color: Red;
}
.good {
color: green;
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

    <h2> Welcome Administrator Hashim  </h2>

<p class="title">Courses Information </p>
	
    <?php
    $sql = "SELECT coursename, coursecode, coursedescription, coursedepartment, semester, academicyear, courseinstructor, grade FROM coursedata";

    $result = $conn->query($sql);
    
    if($result->num_rows >0) {
        echo "<table border='1'> 
    <tr> 
     <th>Course name</th>             
    <th>Course Code</th> 
    <th>Course Description</th> 
    <th>Course Department</th> 
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


<br>
<br>
<br>
<br>
<span class="good" style="position: relative; left:565px;">  <?php echo $good; ?> </span>

<p> Register Courses Information</p>


<div class="form-container-register">
<form method="POST" action="CoursesAdmin.php">
    <br>
    <label for="coursename">Course name</label>
    <input type="text" id="coursename" placeholder="Enter your Coursename" name="coursename" 
    style="height:20px;width:60%; position: relative; left:75px;"><br>
    <span class="error" style="position: relative; left:176px;">  <?php echo $coursenameErr; ?> </span><br>

    <label for="coursecode">Course Code</label>
    <select id="coursecode" name="coursecode" 
    style="height:25px;width:61%; position: relative; left:78px;" required>
	<option value="CS151"> CS151 </option>
	<option value="CL111"> CL111 </option>
	<option value="MT100"> MT100 </option>
	<option value="DS112"> DS112 </option>
	<option value="CS174"> CS174 </option>
	<option value="IS162"> IS162 </option>

    <option value="CS173"> CS173 </option>
    <option value="CS175"> CS175 </option>
    <option value="IS171"> IS171 </option>
    <option value="IS181"> IS181 </option>
    <option value="IS143"> IS143 </option>
    <option value="IS158"> IS158 </option>
    <option value="DS113"> DS113 </option>

    </select>
   

    <br><br>

    <label for="coursedescription"> Course Description </label>
	<br>
	<textarea id="coursedescription" name="coursedescription"  placeholder="Enter Course Description" rows="3" cols="30"
    style="height:60px;width:60%; position: relative; left:170px;"></textarea>
    <span class="error" style="position: relative; left:176px;"> <br>
     <?php echo $coursedescriptionErr ?> </span><br>
	<br><br>

    <label for="coursedept"> Offering Department</label>
    <select id="coursedept" name="coursedept"  style="height:25px;width:68%; position: relative; left:17px;" required>
	<option value="CSE"> Department of Computer Science and Engineering </option>
	<option value="ETE"> Department of Electronics and Telecomunication Engineering </option>
	<option value="COH"> Center of Humanities </option>
	<option value="IDS"> Institute of Development Studies </option>
	<option value="MATH"> Department of MATHEMATICS </option>
    </select>
    <br><br>

    <label for="semester"> Semester</label>
    <select id="semester" name="semester"  style="height:25px;width:61.5%; position: relative; left:98px;" required>
	<option value="1"> Semester 1</option>
	<option value="2"> Semester 2 </option>
    </select>
    <br><br>

    <label for="academicyear"> Academic year</label>
    <select id="academicyear" name="academicyear" style="height:25px;width:61.5%; position: relative; left:57px;" required>
	<option value="2023-2024"> 2023 - 2024</option>
	<option value="2024-2025"> 2024 - 2025</option>
	<option value="2025-2026"> 2025 - 2026</option>
    </select>
    <br><br>
    
    <label for="courseinstructor"> Course Instructor</label>
    <input type="text" id="courseinstructor" placeholder="Course Instructor" name="courseinstructor" 
    style="height:20px;width:60.5%; position: relative; left:35px;">
    <span class="error" style="position: relative; left:176px;">  <?php echo $courseinstructorErr ?> </span><br>
    <br><br>
    

    <label for="grade">  Results (Grade)</label>
    <select id="grade" name="grade" style="height:25px;width:61.5%; position: relative; left:53px;" required>
	<option value="A"> A</option>
	<option value="B+"> B+</option>
	<option value="B"> B</option>
	<option value="C"> C</option>
	<option value="D"> D</option>
	<option value="E"> E</option>
    </select>
    <br><br>
	
    
    <input type="submit" name="submit" value="Submit"
     style="height:26px;width:61.5%; position:relative; left:167px; ">
     <br><br>
     <br><br>
</form>
</div>

<br><br><br><br>

<button style="height:35px; width:10%; font-size:18px; text-align:center;" onclick="window.location.href='Courses.php';">
LOGOUT
</button>

<br><br><br><br>

    

</body>
</html>


