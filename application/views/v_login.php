<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
	<style>
		body {
			margin: 0;
			padding: 0;
			background-color: #17a2b8;
		}

		#login .container #login-row #login-column #login-box {
			margin-top: 20px;
			max-width: 600px;
			border-radius: 10px;
			background-color: white;
		}

		#login .container #login-row #login-column #login-box #login-form {
			padding: 20px;
		}

		#login .container #login-row #login-column #login-box #login-form #register-link {
			margin-top: -85px;
		}

		.btn-login input {
			width: 100%;
		}

		.hide-password {
			display: none
		}

	</style>
	<title>Login</title>
</head>

<body class="bg-info">
	<!-- login Form -->
	<div id="login" class="mt-5">
		<!-- <h1 class="text-center text-white pt-5">Login Admin</h1> -->
		<div class="container">
			<div id="login-row" class="row justify-content-center align-items-center">
				<div id="login-column" class="col-md-6 mt-5">
					<div id="login-box" class="col-md-12 p-4">
						<form id="login-form" class="form" action="<?php echo base_url('Login/aksi_login'); ?>"
							method="post">
							<h3 class="text-center text-info">E-Perpus Login</h3>
							<?php if($this->session->flashdata('flash')): ?>
		                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
		                            <?=$this->session->flashdata('flash'); ?>
		                            <button type="button", class="close", data-dismiss="alert" aria-label="Close">
		                                <span aria-hidden="true">&times;</span>
		                            </button>
		                        </div>
		                    <?php endif;?>   
                    
							<div class="form-group mt-4">
								<label for="username" class="text-info">Username:</label><br>
								<input type="text" name="username" id="username" class="form-control"
									placeholder="Enter Username">
							</div>
							<div class="pass form-group">
								<label for="password" class="text-info">Password:</label><br>
								<!-- <div class="input-group"> -->
								<input type="password" name="password" id="password" class="form-control"
									placeholder="Enter Password">
								<span class="btn">
									<span class="show-password"><i class="far fa-square"></i> Show Password</span>
									<span class="hide-password"><i class="far fa-check-square"></i> Show Password</span>
								</span>
								<!-- </div> -->
							</div>
							<div class="btn-login form-group mt-4">
								<input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
	<script>
		$(document).ready(function () {

			$(".show-password, .hide-password").on('click', function () {
				var passwordId = $('.pass').find('input').attr('id');
				if ($(this).hasClass('show-password')) {
					$("#" + passwordId).attr("type", "text");
					$(this).parent().find(".show-password").hide();
					$(this).parent().find(".hide-password").show();
				} else {
					$("#" + passwordId).attr("type", "password");
					$(this).parent().find(".hide-password").hide();
					$(this).parent().find(".show-password").show();
				}
			});
		});

	</script>

</body>

</html>
