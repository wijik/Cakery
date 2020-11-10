<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('login/images/icons/favicon.ico'); ?>" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/animate/animate.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/css-hamburgers/hamburgers.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/animsition/css/animsition.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/select2/select2.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/daterangepicker/daterangepicker.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('login/css/main.css'); ?>">
	<!--===============================================================================================-->
</head>

<body>
	<?php
	$session = session();
	$errors = $session->getFlashdata('errors');
	?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url('login/images/bg-01.jpg'); ?>');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form action="<?= site_url('Auth/register'); ?>" method="POST" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-53">
						Sign Up
					</span>
					<?php if ($errors != null) : ?>
						<div class="alert alert-danger" role="alert">
							<h4 class="alert-heading">Terjadi kesalahan</h4>
							<hr>
							<p class="mb-0">
								<?php
								foreach ($errors as $err) {
									echo $err . '<br>';
								}
								?>
							</p>
						</div>
					<?php endif ?>
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100" type="text" name="username" id="username" value="">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Email
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<input class="input100" type="email" name="email" id="email" value="">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
					</div>
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Repeat Password
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="repeatPassword" id="repeatPassword">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit">
							Sign Up
						</button>
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Sudah memiliki akun?
						</span><br>

						<a href="<?= site_url('Auth/login'); ?>" class="txt2 bo1">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= base_url('login/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('login/vendor/animsition/js/animsition.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('login/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?= base_url('login/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('login/vendor/select2/select2.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('login/vendor/daterangepicker/moment.min.js'); ?>"></script>
	<script src="<?= base_url('login/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('login/vendor/countdowntime/countdowntime.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('login/js/main.js'); ?>"></script>

</body>

</html>