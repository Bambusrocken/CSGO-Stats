<?php

	require '../steamauth/steamauth.php';
	require '../steamauth/userInfo.php';

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
	

	<link rel="stylesheet" href="../styles/main-style.css">
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
	      	<a class="navbar-brand" href="/">CSGO Core</a>
				</div>
				<div class="collapse navbar-collapse" id="navigationbar">
					<ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <p class="navbar-text" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		          	Welcome
		          	<span><?=$steamprofile['personaname']?></span> <span class="caret"></span>
          		</p>
		          <ul class="dropdown-menu u-Ta-C">
		            <li><a target="_blank" href="<?=$steamprofile['profileurl']?>">Steam Profile</a></li>
		            <li role="separator" class="divider"></li>
		            <li><?php echo logoutbutton(); ?></li>
		          </ul>
		        </li>
		      </ul>
	      </div>
    	</div>
		</nav>
		<div class="container">
			<div class="u-Ta-C" id="user-Details">
				<span class="user-Ava u-InlineB-M"><img src="<?=$steamprofile['avatarfull']?>"/></span>
				<div class="user-Info u-InlineB-M">
					<h1 class="user-H"><span class="u-Block"><?=$steamprofile['personaname']?></span></h1>
					<span class="u-Block"><?=$steamprofile['realname']?></span>
					<span class="u-Block"><a target="_blank" href="<?=$steamprofile['profileurl']?>">Steam</a></span>
					<span class="u-Block">Total time - <?php echo $CSGOtotalplaytime ?></span>
					<span class="u-Block">Recent time - <?php echo $CSGOrecentplaytime  ?></span>
				</div>
			</div>
			<div class="game-Info row panel panel-default">
				<div class="panel-heading">
					<h3>Last Match Played</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-3 u-Ta-R">
						<h4>Kills</h4>
						<span><?=$CSGOelastkills?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Deaths</h4>
						<span><?php echo $CSGOlastdeath ?></span>
					</div>
					<div class="col-md-6 u-Ta-R">
						<h4>MVP</h4>
						<span><?php echo $CSGOlastmvp ?></span>
					</div>
				</div>
			</div>
			<div class="game-Info row panel panel-default">
				<div class="panel-heading">
					<h3>Matches</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-3 u-Ta-R">
						<h4>Played</h4>
						<span><?php echo $CSGOplay ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Won</h4>
						<span><?php echo $CSGOwins ?></span>
					</div>
					<div class="col-md-6 u-Ta-R">
						<h4>Percentage Matches Won</h4>
						<span><?php echo(round($CSGOwl, 2)) ?>%</span>
					</div>
				</div>
			</div>
			<div class="game-Info row panel panel-default">
				<div class="panel-heading">
					<h3>Kill Death</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-3 u-Ta-R">
						<h4>Kills</h4>
						<span><?php echo $CSGOkills ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Deaths</h4>
						<span><?php echo $CSGOdeaths ?></span>
					</div>
					<div class="col-md-6 u-Ta-R">
						<h4>Kill Death Ratio</h4>
						<span><?php echo(round($CSGOkd, 3)) ?></span>
					</div>
				</div>
			</div>
			<div class="game-Info row panel panel-default">
				<div class="panel-heading">
					<h3>Rounds</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-3 u-Ta-R">
						<h4>Played</h4>
						<span ><?php echo $CSGOrounds ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>MVP</h4>
						<span ><?php echo $CSGOmvp ?></span>
					</div>
					<div class="col-md-6 u-Ta-R">
						<h4>Percentage MVP</h4>
						<span><?php echo(round($CSGOmvpR, 2)) ?>%</span>
					</div>
				</div>
			</div>
			<div class="game-Info row panel panel-default">	
				<div class="panel-heading">
					<h3>Shots</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-3 u-Ta-R">
						<h4>Fired</h4>
						<span><?php echo $CSGOshotsfired ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Hit</h4>
						<span><?php echo $CSGOshotshit ?></span>
					</div>
					<div class="col-md-6 u-Ta-R">
						<h4>Percentage Shots Hit</h4>
						<span><?php echo(round($CSGOhitP, 2)) ?>%</span>
					</div>
				</div>
			</div>
			<div class="game-Info row panel panel-default">	
				<div class="panel-heading">
					<h3>Global Stats</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-3 u-Ta-R">
						<h4>Bombs Planted</h4>
						<span><?php echo $CSGObombsplant ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Bombs Defused</h4>
						<span><?php echo $CSGObombsdefused ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Hostages Rescued</h4>
						<span><?php echo $CSGOhostagerescued ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Money Earned</h4>
						<span><?php echo $CSGOmoneyearned ?></span>
					</div>
				</div>
				<div class="panel-body">
					<div class="col-md-3 u-Ta-R">
						<h4>Damage Done</h4>
						<span><?php echo $CSGOdamagedone ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Knife Kills</h4>
						<span><?php echo $CSGOknifekills ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Grenade Kills</h4>
						<span><?php echo $CSGOgrenadekills ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Windows Broken</h4>
						<span><?php echo $CSGOripwindows ?></span>
					</div>
				</div>
				<div class="panel-body">
					<div class="col-md-3 u-Ta-R">
						<h4>Pistol Round Wins</h4>
						<span><?php echo $CSGOpistolroundwin ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Kills Enemy Blinded</h4>
						<span><?php echo $CSGOenemyblindedkill ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Weapons Donated</h4>
						<span><?php echo $CSGOweaponsdonated ?></span>
					</div>
					<div class="col-md-3 u-Ta-R">
						<h4>Kills On Zoomed Enemy</h4>
						<span><?php echo $CSGOkillsagainstzoomed ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>