
<!DOCTYPE html>
<html>
<head>
<link href= "stylex.css" rel = "stylesheet">
<html lang = "en">
 <meta charset="utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <title>table</title>
  <style>
  .wrapper{
	  min-width:min-max(20rem, 75%, 600px);
	  margin:0 auto;
  }
  table tr td:last-child{
	  width:120px;
  }
  </style>
  <script>
  $(document).ready(function(){
	  $('[data-toggle = "tooltip"]').tooltip();
  });
  </script>
</head>
<body>
<div class = "wrapper">
<div class = "container-fluid">
<div class = "row">
<div class = "col-md-12">
<div class = "mt-5 mb-3 clearfix">
<h2 class = "pull-left">User details</h2>
<a href = "index.php" class = "btn btn-success pull-right"><i class="fa-solid fa-plus mx-2"></i>Add Users</a>
</div>

<?php
session_start();
require 'config.php';

//query part
$sql = "SELECT * FROM `form_validation`.`user_details`";
if($sql_query = mysqli_query($con_DB, $sql)){
if(mysqli_num_rows($sql_query) > 0){
	echo '<table class = "table table-border-striped">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>#</th>';
	echo '<th>Name</th>';
	echo '<th>Email</th>';
	echo '<th>Website</th>';
	echo '<th>Comment</th>';
	echo '<th>Gender</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	while($row = mysqli_fetch_array($sql_query)){
	echo '<tr>';
	echo "<td>".$row['id'] ."</td>";
	echo "<td>".$row['name'] ."</td>";
	echo "<td>".$row['email'] ."</td>";
	echo "<td>".$row['website'] ."</td>";
	echo "<td>".$row['comment'] ."</td>";
	echo "<td>".$row['gender'] ."</td>";
	echo "<td>";
	echo '<a href = read.php?id='.$row['id'].' "class = "mr-3" title = "View Record" data-toggle = "tooltip"><span class ="fa fa-eye"></span></a>';
	echo '<a href = update.php?id='.$row['id'].' "class = "mr-3" title = "Update Record" data-toggle = "tooltip"><span class ="fa fa-pencil"></span></a>';
	echo '<a href = delete.php?id='.$row['id'].' "title = "Delete Record" data-toggle = "tooltip"><span class ="fa fa-trash"></span></a>';
	echo "</td>";
	echo '</tr>';
		
	}
	echo "</tbody>";
	echo "</table>";
	// free set
	mysqli_free_result($sql_query);
}else{
	echo '<div class = "alert alert-danger"><em>No record were found.</em></div>';
}
}else{
	echo "Something went wrong. Please try again later";
}
mysqli_close($con_DB);
?>
</div>
</div>
</div>
</div>
</body>
</html>