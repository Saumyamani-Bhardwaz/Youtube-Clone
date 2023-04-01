<?php 
include 'config.php';
error_reporting(0);
session_start();
if (isset($_SESSION['username'])) {
header("Location: form.php");
}
if (isset($_POST['submit'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);
	if ($password == $cpassword) {
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
		$sql = "INSERT INTO users (username, email, password)
				VALUES ('$username', '$email', '$password')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('YIPPEE! YOU HAVE SUCCESSFULLY COMPLETED THE REGISTRATION')</script>";
			$username = "";
			$email = "";
			$_POST['password'] = "";
			$_POST['cpassword'] = "";
		} else {
			echo "<script>alert('OHHO! I SMELL SOME ERROR HERE.')</script>";
		}
    	} else {
	    echo "<script>alert('THIS EMAIL IS ALREADY REGISTERED')</script>";
		}
		} else {
		echo "<script>alert('PASSWORD MISMATCH')</script>";
	}
}
?>
     <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>REGISTRATION FORM YOUTHOOB</title>
</head>
<body background="https://i.pinimg.com/originals/41/b5/62/41b562a70b3c5f9ceaed62ad5bf599f8.jpg">
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">YOU CAN REGISTER HERE FOR A BRAND NEW ACCOUNT</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">REGISTER NOW</button>
			</div>
			<p class="login-register-text">Aleady Having An Account?<a href="form.php"><br><u>Login with Existing Login Credentials</u></a></p>
		</form>
	</div>
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            width: 100%;
            min-height: 100vh;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
            .container {
            width: 400px;
            min-height: 400px;
            background: #FFF;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, .3);
            padding: 40px 30px;
        }
        
        .container .login-text {
            color: #111;
            font-weight: 500;
            font-size: 1.1rem;
            text-align: center;
            margin-bottom: 20px;
            display: block;
            text-transform: capitalize;
        }
        
        .container .login-social {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
            margin-bottom: 25px;
        }
        
        .container .login-social a {
            padding: 12px;
            margin: 10px;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0, 0, 0, .3);
            text-decoration: none;
            font-size: 1rem;
            text-align: center;
            color: #FFF;
            transition: .3s;
        }
        
        .container .login-social a i {
            margin-right: 5px;
        }
        
        .container .login-social a.facebook {
            background: #4267B2;
        }
        
        .container .login-social a.twitter {
            background: #1DA1F2;
        }
        
        .container .login-social a.google-plus {
            background: #db4a39;
        }
        
        .container .login-social a.linkedin {
            background: #0e76a8;
        }
        
        .container .login-social a.facebook:hover {
            background: #3d5fa3;
        }
        
        .container .login-social a.twitter:hover {
            background: #1991db;
        }
        
        .container .login-social a.google-plus:hover {
            background: #ca4334;
        }
        
        .container .login-social a.linkedin:hover {
            
        }
        
        .container .login-email .input-group {
            width: 100%;
            height: 50px;
            margin-bottom: 25px;
        }
        
        .container .login-email .input-group input {
            width: 100%;
            height: 100%;
            border: 2px solid #e7e7e7;
            padding: 15px 20px;
            font-size: 1rem;
            border-radius: 30px;
            background: white;
            outline: none;
            transition: .3s;
        }
        
        .container .login-email .input-group input:focus,
        .container .login-email .input-group input:valid {
            border-color:red;
        }
        
        .container .login-email .input-group .btn {
            display: block;
            width: 100%;
            padding: 15px 20px;
            text-align: center;
            border: none;
            background: #000000;
            outline: none;
            border-radius: 50px;
            font-size: 1.2rem;
            color: #ff0000;
            cursor: pointer;
            transition: .3s;
        }
        
        .container .login-email .input-group .btn:hover {
            transform: translateY(-5px);
            background: #ff0000;
            color:#000000
        }
        
        .login-register-text {
            color: #111;
            font-weight: 600;
        }
        
        .login-register-text a {
            text-decoration: none;
            color: #ff0000;
        }
        
        @media (max-width: 430px) {
            .container {
                width: 300px;
            }
            .container .login-social {
                display: block;
            }
            .container .login-social a {
                display: block;
            }
        }
    </style>
</body>

</html>
