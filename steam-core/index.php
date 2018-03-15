<?php

	require 'steamauth/steamauth.php';

	if(isset($_SEESION['steamid']))
	{
		$id = $_session['steamid'];
	}
	else
	{
		#
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	

	<link rel="stylesheet" href="styles/main-style.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

</head>

<body>
	<div id="app">
		<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
						<span class="sr-only">Toggle navigation</span>
	      		<span class="icon-bar"></span>
	      		<span class="icon-bar"></span>
	      		<span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="/">Steam Core</a>
				</div>
				<div class="collapse navbar-collapse" id="navigationbar">
					<ul class="nav navbar-nav navbar-right">
		        <!-- <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">LOGOUT BTN</a></li>
		          </ul>
		        </li> -->
		        <li>
		        	<?php echo loginbutton(); ?>
		        </li>
		      </ul>
	      </div>
    	</div>
		</nav>
		<div class="container">
		</div>
			
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>