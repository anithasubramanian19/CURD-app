<?php
session_start();
require 'config.php';

//initialize
$name = $email = $website = $comment = $gender = " ";
$name_err = $email_err = $website_err = $comment_err = $gender_err = " ";
if($_SERVER['REQUEST_METHOD'] == "POST"){
	//validate name
  $input_name = trim($_POST['name']);
  if(empty($input_name)){
	  $name_err = "Please enter a name";
  }elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=> array("regexp"=>"/^[a-zA-Z\s]+$/")))){
	  $name_err = "Please enter a valid name";
  }else{
	  $name = $input_name;
  }
  //validate email
  $input_email = trim($_POST['email']);
  if(empty($input_email)){
	  $email_err = "Please enter an email";
  }elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
	  $email_err = "Invalid email";
  }else{
	  $email = $input_email;
  }
  // validate website
  $input_website = trim($_POST['website']);
  if(empty($input_website)){
	  $website_err = "Please enter a website";
  }elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i" , $input_website)){
	  $website_err = "Invalid website";
  }else{
	  $website = $input_website;
  }
  // validate comment
  $input_comment = trim($_POST['comment']);
  if(empty($input_comment)){
	  $comment_err = "Please enter a comment";
  }else{
	  $comment = $input_comment;
  }
  // validate gender
  $input_gender = trim($_POST['gender']);
  if(empty($input_gender)){
	  $gender_err = "Please enter a gender";
  }else{
	  $gender = $input_gender;
  }
  //check error before enter into database
  if(empty($name_err) && empty($email_err) && empty($website_err) && empty($comment_err) && empty($gender_err)){
	  $sql = "INSERT INTO `form_validation`.`user_details`(name, email, website, comment, gender) VALUES (?,?,?,?,?)";
    if($stmt = mysqli_prepare($con_DB, $sql)){
		//bind variables to prepared statement as parameters
		mysqli_stmt_bind_param($stmt, "sssss", $param_name, $para_email, $param_website, $param_comment, $param_gender);
		// set parameters
		$param_name = $name;
		$para_email = $email;
		$param_website = $website;
		$param_comment = $comment;
		$param_gender = $gender;
		
		//attempt to exexute statement
		if(mysqli_stmt_execute($stmt)){
       // create successfully redirect to header		
		header("location: table.php");
		exit();
		}else{
			echo"Ooops something went wrong. Please try again later";
		}
	}

	mysqli_stmt_close($stmt);
  }
 mysqli_close($con_DB); 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<meta name = "viewport"content = "width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<title>create</title>
<style>
.wrapper{
	width: 600px;
	margin:0 auto;
}
</style>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>
<body>
<div class = "wrapper">
<div class = "container-fluid">
<div class = "row">
<div class = "col-md-12">
<h2 class = "mt-5 text-success">Create Record</h2>
<p class = "text-warning">Please fill this form and submit to add user record to the database.</p>
<form action = "table.php" method = "POST">
<div class = "form-group">
<label>Name</label>
<input type = "text" name = "name" class ="form-control <?php echo !(empty($name_err)) ? 'is invalid' : ''; ?>" value = "<?php echo $name;?>">
<span class = "Invalid-feedback"><?php echo $name_err;?></span>
</div>
<div class = "form-group">
<label>Email</label>
<input type = "text" name = "email" class ="form-control <?php echo !(empty($email_err)) ? 'is invalid' : ''; ?>" value = "<?php echo $email;?>">
<span class = "Invalid-feedback"><?php echo $email_err;?></span>
</div>
<div class = "form-group">
<label>Website</label>
<input type = "text" name = "website" class ="form-control <?php echo !(empty($website_err)) ? 'is invalid' :'' ; ?>" value = "<?php echo $website;?>">
<span class = "Invalid-feedback"><?php echo $website_err;?></span>
</div>
<div class = "form-group">
<label>Comment</label>
<input type = "text" name = "comment" class ="form-control <?php echo !(empty($comment_err)) ? 'is invalid' : ''; ?>" value = "<?php echo $comment;?>">
<span class = "Invalid-feedback"><?php echo $comment_err;?></span>
</div>
<div class = "form-group">
<label>Gender</label>
<input type = "text" name = "gender" class ="form-control <?php echo !(empty($gender_err)) ? 'is invalid' : ''; ?>" value = "<?php echo $gender;?>">

<span class = "Invalid-feedback"><?php echo $gender_err;?></span>
</div>
<input type = "submit" class = "btn btn-primary mt-5" value = "submit">
<a href = "table.php" class = "btn btn-secondary ml-2 mt-5">Cancel</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>