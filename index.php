<!DOCTYPE html>
<html>
<head>
<link href = "style.css" rel = "stylesheet">
<meta name="viewport" content="width=device-width, user-scalable=no" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<title>CRUD app</title>
</head>
<body>
<h2>Form validation</h2>
<form method = "post" action = "index.php">
<label>Name</label>
 <input type = "text" name = "name" checked = "checked">
<label>E-mail</label>

 <input type = "text" name = "email" >
<label>Website</label>

<input type = "text" name = "website">
<label>Comment</label>

<textarea  name = "comment" rows = "5" cols = "40"></textarea>
<label>Gender</label>

<div class = "checkbox">
<label>Female</label>
<input type = "radio" name = "gender" value  = "Female"> 
<label>Male</label>
<input type = "radio" name = "gender" value  = "male"> 
<label>Other</label>
<input type = "radio" name = "gender" value  = "other"> 
</div>
<br><br>
<input onclick = "submit()" type = "submit" name = "submit" value  = "submit"> 
</form>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php

$con_DB = mysqli_connect("localhost","root", "Vennimuthu1992","form_validation");
if(!$con_DB){

	die("ERROR: Connection could not found" . mysqli_connect_error());
}
$name = " ";
$email = " ";
$website = " ";
$comment = " ";
$gender = " ";
if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['website']) || isset($_POST['comment']) || isset($_POST['gender'])){
$name = $_POST['name'];
$website = $_POST['website'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$gender = $_POST['gender'];
 $mysql = "INSERT INTO `form_validation`.`user_details` (name, email, website, comment, gender)  VALUES ('$name', '$email', '$website', '$comment', '$gender')";
 if(mysqli_query($con_DB, $mysql)){
	echo '<script type = "text/javascript">alert("New data store")</script>';
 }else{
	 echo "Error: ". $mysql . "<br>". mysqli_error($con_DB);
 }
    	
}
 mysqli_close($con_DB);
?>

</body>
</html>