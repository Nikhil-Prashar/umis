<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background:#f5f7fb;
        }

        .login-card{
            margin-top:80px;
            border:none;
            border-radius:12px;
            box-shadow:0 0 20px rgba(0,0,0,.15);
        }

        .card-header{
            background:#0d6efd;
            color:#fff;
            text-align:center;
            font-size:24px;
            font-weight:bold;
        }

        .captcha-box{
            background:#e9ecef;
            border:1px solid #ced4da;
            border-radius:5px;
            padding:10px;
            text-align:center;
            font-size:24px;
            letter-spacing:5px;
            font-weight:bold;
            color:#0d6efd;
            user-select:none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card login-card">
                <div class="card-header">
                    Sign In
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('login');?>" method="post">
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter Email"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Enter Password"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label>Captcha</label>
                            <div class="captcha-box mb-2">
                                <?php
								echo $captcha;?>
                            </div>
                            <input type="text"
                                   name="captcha"
                                   class="form-control"
                                   placeholder="Enter Captcha"
                                   required>
                        </div>
                        <button class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Don't have an account?
                    <a href="<?php echo base_url('register');?>">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
