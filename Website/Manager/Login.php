 <?php
 session_start();
 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /Manager/Manager_Index.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Login</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<h1>Login</h1></br>
		<?php
		echo '<form action = "" method = "POST" style="max-width:500px;margin:auto">', "\n",
		'<div class="inputbox">
			<i class="square"></i>
			<input class="inputfield" type="text" placeholder="Username" name="username">
		</div>', "\n",
		'<div class="inputbox">
			<i class="square"></i>
			<input class="inputfield" type="password" placeholder="Password" name="password">
		</div>', "\n",
		'<button type = "submit" class = "loginbutton" >Submit</button>', "\n",
		'<p></form></p>', "\n";

		if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) )
		{
			$username = $_REQUEST[ 'username' ];
			$password = $_REQUEST[ 'password' ];

			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$password_query = "select * from Users WHERE Username = '" .
			$username . "' and password = MD5( '" . $password . "' )";
			$result = mysqli_query( $link, $password_query );

			if ( mysqli_num_rows( $result ) == 1 )
			{
				session_start();
				$_SESSION[ 'username' ] = $username;
				$_SESSION[ 'loggedin'] = true;
				header( 'Location: /Manager/Manager_Index.php' );
				exit();
			}

			else
			{
				echo '<p>Login failed. Please try again.</p>', "\n";
				'</p>';
			}
		}
		?>
	  
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>