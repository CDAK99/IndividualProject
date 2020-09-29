 <?php
 session_start();
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Platforms/Platforms.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Add Console</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Platforms/Platforms.php"'><span>Back</span></button></br> 
		<h1>Add Platform</h1>
		<?php
		echo '<form action = "" method = "POST" style="max-width:500px;margin:auto">', "\n",
			'<hr>', "\n",
			'<label for="consoleid"><b>Console ID</b></label>', "\n",
			'<input type="number" class = "input" name="consoleid" required/><br/>', "\n",
			
			'<label for="gameid"><b>Game ID</b></label>', "\n",
			'<input type="number" class = "input" name="gameid" required/><br/>', "\n",
			
			'<hr>', "\n",
			
			'<button type="submit" name = "submit" class="submitbutton">Submit</button>',
		'<p></form></p>', "\n";

		if ( isset( $_POST[ 'submit' ] ) )
		{
			$gameid = $_REQUEST[ 'gameid' ];
			$consoleid = $_REQUEST[ 'consoleid' ];

			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$query = "INSERT INTO Platform (Console_ID, Game_ID) VALUES ('" .
			$consoleid . "','" . $gameid . "')";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Platforms/Platforms.php");
			} else {
				echo "ERROR: Could not execute $sql. " .
				mysqli_error($link);
			}
			
			mysqli_close($link);
		}
		?>
	  
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>