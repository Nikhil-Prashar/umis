<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Register</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		body {
			background: #f5f7fb;
		}

		.register-card {

			margin-top: 40px;

			border: none;

			border-radius: 12px;

			box-shadow: 0 0 20px rgba(0, 0, 0, .15);

		}

		.card-header {

			background: #198754;

			color: #fff;

			text-align: center;

			font-size: 24px;

			font-weight: bold;

		}
	</style>

</head>

<body>

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-md-6">

				<div class="card register-card">

					<div class="card-header">

						Create Account

					</div>

					<div class="card-body">

						<form action="<?php echo site_url('auth/register'); ?>" method="post">

							<div class="mb-3">

								<label>Full Name</label>

								<input type="text"
									class="form-control"
									name="name"
									required>

							</div>

							<div class="mb-3">

								<label>Email Address</label>

								<input type="email"
									class="form-control"
									name="email"
									required>

							</div>

							<div class="mb-3">

								<label>Password</label>

								<input type="password"
									class="form-control"
									name="password"
									required>

							</div>

							<div class="mb-3">

								<label>Confirm Password</label>

								<input type="password"
									class="form-control"
									name="confirm_password"
									required>

							</div>

							<button class="btn btn-success w-100">

								Register

							</button>

						</form>

					</div>

					<div class="card-footer text-center">

						Already have an account?

						<a href="<?php echo base_url('login'); ?>">

							Login

						</a>

					</div>

				</div>

			</div>

		</div>

	</div>

</body>

</html>
