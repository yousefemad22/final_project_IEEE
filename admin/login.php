<?php
    $page_title="Sign In";
    $css_file="login.css";
    include_once("../includes/header.php");
    require_once("includes/function.php");
    
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
      
    
      $email  = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
      $password  = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

      login($email,$password);
    }
    
?>

	<!-- LOGIN FORM -->

	<div class="login">
			<form  action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
					<p class="login100-form-title">
							Admin Login
					</p>


			    <!-- USERNAME INPUT -->

					<div class="form-input">
							<p class="txt1">Username</p>
								<input type="text" name="email" autocomplete="off" required>
					</div>

					<!-- PASSWORD INPUT -->
			
					<div class="form-input">
							<p class="txt1">Password</p>
							<input type="password" name="password" required>
					</div>

					<!-- SIGNIN BUTTON -->
			
					<p>
							<button type="submit" name="submit" >Sign In</button>
					</p>

					<!-- FORGOT PASSWORD PART -->

					<p class="forgotPW">Forgot your password ? <a href="resetPassword.php">Reset it here.</a></p>

				</form>
		</div>




<?php
    include_once("../includes/footer.php");
    ?>