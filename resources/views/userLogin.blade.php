<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>User login page</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script defer src="{{asset('js/loginScript.js')}}"></script>
</head>
<body>
	<div class="user-login">
		<nav>
			<a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}"></a>
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times-circle" onclick="hideMenu()"></i>
				<ul>
					<li><a href="{{url('/userHome')}}">HOME</a></li>
					<li><a href="{{url('/userEvents')}}">EVENTS</a></li>
					<li><a href="{{url('/evRegistration')}}">REGISTRATION</a></li>
					<li><a href="{{url('/userLogin')}}">PROFILE</a></li>
				</ul>
			</div>
			<i class="fa fa-bars" onclick="ShowMenu()"></i>
		</nav>
		<div class="login-container">
			<div class="form-container">
				<div class="hdr">
					<h2>Sign-in</h2>
				</div>
				<form class="form" id="form" action="userHome.html" method="GET">
					<div class="form-control">
						<label>Email</label>
						<input type="email" placeholder="Sol123@ggrev.com" id="email">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Password</label>
						<input type="password" placeholder="solDragonInstall" id="password">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<button type="submit">Submit</button>
					<div>don't have an account? <a href="{{url('/userRegister')}}">register</a></div>
				</form>
		</div>
	</div>
</body>
<script>
		var navLinks = document.getElementById('navLinks');
		function ShowMenu() {
			navLinks.style.right = "0";
		}
		function hideMenu() {
			navLinks.style.right = "-200px";
		}
	</script>
</html>