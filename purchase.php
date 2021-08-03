<?php
              require("header.php");
			?>

            <center> <h1> Create an Account </h1> 

            



					<?php


			
				require 'csy2028data.php';
//above statemeent call connection of database

//if statement is triggered when submit is pressed which runs an insert of the username email and password which is hashed
				if (isset($_POST['submit'])) {
					$stmt = $pdo->prepare('INSERT INTO Person1 (username, password, email)
					 VALUES (:username, :password, :email)
					');
					$values = [
					 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
					 'email' => $_POST['email']
					 ];
					$stmt->execute($values);

					
//form
					}
					else {
					?>
					<form action="acc_create.php" method="POST">
					<label>Username:</label>
					<input type="text" name="username" />
					<label>Password:</label>
					<input type="text" name="password" />
					<label>Email:</label>
					<input type="text" name="email" />
					<input type="submit" name="submit" value=”Submit” />
					</form>
					<?php
					}
					
					
					

				
				?>



</center>

<?php
              require("footer.php");
			?>