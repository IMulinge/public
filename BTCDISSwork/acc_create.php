<?php
              require("header.php");
			  $apiKey = "5867-e32a-0dfd-9c7e";
			  $version = 2; // API code called I must give it the following attributes which is the APIkey, Version and pin whcih is all assigned to variable block_io
			  $pin = "RaspberryDark111111";
			  $block_io = new BlockIo($apiKey, $pin, $version);
			?>
            <center>
			<h1> Crypto RFID portal software</h1> 
			 <h2> Create an Account </h2> 
					<?php
		
//above statemeent call connection of database

//if statement is triggered when submit is pressed which runs an insert of the username email and password which is hashed and the Usercode which is the RFID number 
				if (isset($_POST['submit'])) {
					$stmt = $pdo->prepare('INSERT INTO Person1 (username, password, email, Usercode)
					 VALUES (:username, :password, :email, :Usercode)
					');
					$values = [
					 'username' => $_POST['username'],
					 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
					 'email' => $_POST['email'],
					 'Usercode' => $_POST['Usercode']			
					 ];
					$stmt->execute($values);
					//Block.io API is summoned and it will create a new address using the posted usercode/RFID number
					$block_io->get_new_address(array('label' => $_POST['Usercode']));
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
					<label>RFID Tag scan:</label>
					<input type="text" name="Usercode" />
					<input type="submit" name="submit" value="Submit" />
					</form>
					<?php
					}
					
					
					

				
				?>



</center>

<?php
              require("footer.php");
			?>
