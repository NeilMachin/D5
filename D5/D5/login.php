<!DOCTYPE html>
<html>

<head>
<title>DotFive - Login</title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>


<section id="container">
	<header>
	    <div style="font-size: 24px">
	        DotFive Coding Test
	    </div>
	    <!--div>
	        <a href='logoff_action.php'>Logoff</a>
	    </div-->
	</header>
	
	<main>
		<form action='login_action.php' method='POST'>
			<table style='margin-left: auto; margin-right: auto; padding-top: 200px'>
				<tr>
					<td>User</td>
					<td><input type='text' name='user'></td>
				</tr>
				<tr>
					<td style='padding-top: 10px'>Password</td>
					<td><input type='password' name='password'></td>
				</tr>
				<tr>
					<td colspan=2 style='padding-top: 20px;text-align: center'><input type='submit' value='Logon'></td>
				</tr>
			</table>
		</form>
	</main>

	<footer>
		<?php
		    echo 'Not signed on';
		?>
	</footer>
</section>

</body>

</html>