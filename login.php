<?php
    ob_start();
    require 'config/config.php';
    require 'registration.php';
    require 'includes/handlers/Login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href = 'assets/css/bootstrap.min.css'></link>
    <link rel='stylesheet' href = 'assets/css/registration.css'></link>
    <title>Log-in</title>
</head>
<body>
    <!--Create the login form -->
	<div class = "loginHeader px-3 py-3 need-validation">
		<form class = "form-inline" method="POST">
			<div class ="navbar-brand">
				<img  src="" ><span class = "text-light"> Chronicles <span>
			</div>
			<div class="form-row ml-auto">
				<div class = "col-sm-5">
				<input class = "form-control" type="email" name="email" placeholder="Email" value="<?php if (isset($_SESSION['email'])){
					echo $_SESSION['email'];
					} ?>" required>
				</div>
				<div class ="col-sm-5">
					<input class = "form-control" type="password" name="password" placeholder="Password" required>
				</div>
				<div class ="col-sm-2">
					<input class = "form-control" type="submit" name = "login">
				</div>
			</div>
		</form>
	</div>
	<div class="text-danger d-flex justify-content-end mr-2">
		<?php 
			if (in_array("Incorrect email and password, please try again!", $error_array)){
				echo "Incorrect email and password, please try again!";
            }
            if (in_array("Email address not found, please try again!", $error_array)){
				echo "Email address not found, please try again!";
            }
		?>
	</div>

	<!--Create the registration form -->
	<div class="row mt-3">
		<div class = "col-md-6">
		
		</div>
		<div class = "col-md-6">
			<h3 class = "text-black-50"> Create New Account </h3>
			<form action="registration.php" method="POST">
				<div class = "form-row">
					<div class = "form-group col-md-5">
						<input class = "form-control" type="text" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])){
							echo $_SESSION['reg_fname'];
						} ?>" required>
						<?php 
							if (in_array("First name must be between 2 to 25 characters<br/>", $error_array)){
								echo "<span class ='required_field'>First name must be between 2 to 25 characters</span>";
							}
						?>
					</div>
					<div class ="form-group col-md-5">
						<input class = "form-control" type="text" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])){
							echo $_SESSION['reg_lname'];
						} ?>" required>
						<?php 
							if (in_array("Last name must be between 2 to 25 characters<br/>",$error_array)){
								echo "<span class ='required_field'>Last name must be between 2 to 25 characters</span>";
							}
						?>
					</div>
				
					<div class = "form-group col-md-5">
						<input class="form-control" type="email" name="reg_email" placeholder="Email" value="<?php if (isset($_SESSION['reg_email'])){
							echo $_SESSION['reg_email'];
						} ?>" required>
						<?php
							if (in_array("Email already in use<br/>", $error_array)){
								echo "<span class ='required_field'>Email already in use</span>";
							}
							if(in_array("Invalid email format<br/>", $error_array)){
								echo "<span class ='required_field'>Invalid email format</span>";
							}
						?>
					</div>

					<div class = "form-group col-md-5">
						<input class = "form-control" type="text" name="reg_email2" placeholder="Email Confirmation" value="<?php if (isset($_SESSION['reg_email2'])){
							echo $_SESSION['reg_email2'];
						} ?>" required>
						<?php 
							if (in_array("Emails do not match<br/>", $error_array)){
								echo "<span class ='required_field'>Emails do not match</span>";
							}
						?>
					</div>
					<div class="form-group col-md-3">
						<span>Gender:</span> 
					</div>
						<div class ="form-group col-md-2">
							<input class ="form-check-input" type="radio" name="reg_gender" value ="m" checked>
							<label class="form-check-label">Male</label>
						</div>
						<div class ="form-group col-md-2">
							<input class ="form-check-input" type="radio" name="reg_gender" value = "f">
							<label class="form-check-label">Female</label>
						</div>
						<div class ="form-group col-md-2">
							<input class ="form-check-input" type="radio" name="reg_gender" value ="l">
							<label class="form-check-label">LGBTQAI</label>
						</div>
					

					<div class = "form-group col-md-10">
						<input class="form-control" type="password" name="reg_password" placeholder="Password" required>
						<?php 
							if (in_array("Your password muct only contain english characters of numbers<br/>", $error_array)){
								echo "<span class ='required_field'>Your password muct only contain english characters of numbers</span>";
							}
						?>
					</div>
					<div class = "form-group col-md-10">		
						<input class="form-control" type="password" name="reg_password2" placeholder="Password Confirmation" required>
						<?php 
							if (in_array("Password must be between 8 to 25 characters<br/>",$error_array)){
								echo "<span class ='required_field'>Password must be between 8 to 25 characters<br/></span>";
							}
							if (in_array("Password does not match<br/>",$error_array)) {
								echo "<span class ='required_field'>Password does not match</span>";
							}
						?>
                    </div>
                    
                    <div class = "form-group col-md-5">
                        <select class = 'form-control' name = 'course'>
                            <option> Select Course </option>
                            <option> BS Accountancy </option>
                            <option> BS Business Administration </option>
                            <option> BS Management Accounting </option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <input type = 'text' class = 'form-control' name ='subject' placeholder ='Enter subject' />
                    </div>
					<div class ="form-group col-md-5">
						<input class = "form-control btn btn-primary" type="submit" name = "submit" value="Sign Up">
						<br/>
						<?php 
							if (in_array("Succefully registered. Continue to login<br/>", $error_array)){
								echo "Succefully registered. Continue to login<br/>";
							}
						?>
					</div>
				</div>
			</form>
		</div>
	</div>
<script src = 'assets/js/jquery-3.5.1.min.js'> </script> 
<script src = 'assets/js/bootstrap.min.js'> </script> 
</body>
</html>