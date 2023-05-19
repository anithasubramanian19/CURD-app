
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
 <input type = "text" name = "name" <?php echo !empty() ?> required>
<label>E-mail</label>

 <input type = "text" name = "email" required>
<label>Website</label>

<input type = "text" name = "website" required>
<label>Comment</label>

<textarea  name = "comment" rows = "5" cols = "40"></textarea>
<label>Gender</label>

<div class = "checkbox" required>
<label>Female</label>
<input type = "radio" name = "gender" value  = "Female"> 
<label>Male</label>
<input type = "radio" name = "gender" value  = "male" > 
<label>Other</label>
<input type = "radio" name = "gender" value  = "other"> 
</div>
<br><br>
<input type = "submit" value = "Submit" class = "submit-btn">
</form>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php

session_start();
require 'config.php';
$name = " ";
$email = " ";
$website = " ";
$comment = " ";
$gender = " ";
if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['website']) || isset($_POST['comment']) || isset($_POST['gender'])){
	if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['website']) || empty($_POST['comment']) || empty($_POST['gender'])){
		echo '<script type = "text/javascript">alert("Please enter the fields")</script>';
	}else{
$name = $_POST['name'];
$website = $_POST['website'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$gender = $_POST['gender'];
 $sql = "SELECT * FROM `form_validation`.`user_details` WHERE name = '$name' ";
 $query_run = mysqli_query($con_DB, $sql);
 if(mysqli_num_rows($query_run) > 0){
	 echo '<script type = "text/javascript">alert("already have that name")</script>';
 }else{
	 
 $mysql = "INSERT INTO `form_validation`.`user_details` (name, email, website, comment, gender)  VALUES ('$name', '$email', '$website', '$comment', '$gender')";
 
 if(mysqli_query($con_DB, $mysql)){
	echo '<script type = "text/javascript">alert("New data store")</script>';
 }else{
	 echo "Error: ". $mysql . "<br>". mysqli_error($con_DB);
	 
 }

	}
}
}
 mysqli_close($con_DB);
?>

</body>
</html>