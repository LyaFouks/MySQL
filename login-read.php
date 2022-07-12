<?php


	
		

		$connection = mysqli_connect('localhost', 'root', '', 'mydatabase');

		

		if ($connection) {
			echo "Database is connected";

			
		} else {
			die('Connection failed');
		}	

	// 	$query = "INSERT INTO users (id, user_name, email, password) VALUES ('$username', '$email', 'password');";

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
    
    <div class="container">

    	<div class="col-md-6">
    		<?php

    			// while ($row = mysqli_fetch_row($query_result)) {
    			// 	print_r($row);
    			// }

    			while ($row = mysqli_fetch_assoc($query_result)) {
    		?>

    				<pre>
    						<?php
    							print_r($row);

    						?>
    				</pre>
    			 	    			 

    		<?php
    			 	}




    		?>
    	</div>	

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>