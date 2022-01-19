<!DOCTYPE html>
<html>
<head>
	<title> User Login And Registration </title>
	<link rel="stylesheet" type="text/css"
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style1.css">
</head>
<body>
<p id="demo"></p>

	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			</div>
				<div class="col-sm-4">
					<form class="form-conatiner">
						<img src="my.jpg" alt="Paris" class="center">			   
					<form action="assignment2.php" method="post">
						<h1>New User</h1>
						<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="gmail">
						</div>
						<div class="form-group">
						<label for="exampleInputPassword1" >Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Password">
						</div>
						<div class="checkbox">
						<label>
							<input type="checkbox"> Remember me
						</label>
						</div>
						<button type="submit" class="btn btn-success btn-block" name="submit" value="Submit">Log in</button>
					</form>
					</div>
					<script>
						document.getElementById("demo").innerHTML = 55+55;
						</script>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</body>
</html>
