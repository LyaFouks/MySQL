<?php
	
	session_start();
	// echo $_SESSION['user_name'];


	include "db-connection.php";


	if (isset($_POST['submit'])) {


		if (!$_POST['email'] OR !$_POST['password']) {
				echo "You must input email and password";

		} else {

					$email = mysqli_real_escape_string($connection, $_POST['email']);
					$password = mysqli_real_escape_string($connection, $_POST['password']);
					$password = password_hash($password, PASSWORD_DEFAULT);
					$username = mysqli_real_escape_string($connection, $_POST['userName']);
					

					$select_query = "SELECT * FROM users WHERE email = '$email'";
					$select_query_result = mysqli_query($connection, $select_query);
					if(mysqli_num_rows($select_query_result) > 0) {
						echo "This email already exists, please input another email";
					} else {
						$query = "INSERT INTO users (user_name, email, password) VALUES ('$username', '$email', '$password');";

							$query_result = mysqli_query($connection, $query);

							if (!$query_result) {
								die('Query failed '.mysqli_error());
							} else {
								// $_SESSION['email'] = $email;
								// header("Location: session-and-cookies.php");
								echo "You are signed up";
							}
					}

					
		}
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
    <form action="login-task.php" method="post">
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
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div>
	  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>