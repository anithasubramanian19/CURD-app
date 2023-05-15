<?php
session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<link href= "stylex.css" rel = "stylesheet">
<html lang = "en">
 <meta charset="utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class = "container bg-dark">
<div class = "container-md pt-5 my-5 bg-light text-dark">
<table>
<th  >
<tr class = "row">
<td class = "col-sm-3">Id</td>
<td class = "col-sm-3">Name</td>
<td class = "col-sm-3">Email</td>
<td class = "col-sm-3">Website</td>
<td class = "col-sm-3">Comment</td>
<td class = "col-sm-3">Gender</td>
</tr>
</th>
</table>
</div>
</body>
</html>