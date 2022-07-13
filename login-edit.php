<?php

	include "db-connection.php";


	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$username = $_POST['userName'];
		$id = $_POST["id"];

		$update_query = "UPDATE users SET user_name = '$username', email = '$email',  password = '$password' WHERE id = $id";


		$update_query = 'UPDATE users SET'; 
		$update_query .= " user_name = '$username',";
		$update_query .= " email = '$email',";
		$update_query .= " password = '$password'";
		$update_query .= " WHERE id = $id";
		
		$update_query_result = mysqli_query($connection, $update_query);

		if (!$update_query_result) {
			die('Query failed '.mysqli_error());
		}

	}

	$query = 'SELECT * FROM users;';

		$query_result = mysqli_query($connection, $query);

		if (!$query_result) {
			die('Query failed '.mysqli_error());
		}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <form action="login-edit.php" method="post">
      <div class="mb-3">
	    <label for="exampleInputUserName1" class="form-label">User Name</label>
	    <input type="text" class="form-control" name="userName" id="exampleInputUserName1" aria-describedby="nameHelp" placeholder="Enter your name">
	    <div id="nameHelp" class="form-text">We'll never share your email with anyone else.
	  </div>	
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Email address</label>
	    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
	    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1" class="form-label">Password</label>
	    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
	  </div>
	  <div class="mb-3 form-check">
	    <select name="id">
	    	<?php


	    			while ($row = mysqli_fetch_assoc($query_result)) {
	    						$id = $row['id'];
	    						echo "<option value='id'>$id</option>";

	    			}


	    	?>	
	    </select>
	  </div>
	  <button type="submit" class="btn btn-primary" name="submit">Edit</button>
	</form>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>