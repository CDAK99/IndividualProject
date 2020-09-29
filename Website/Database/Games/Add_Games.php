 <?php
 session_start();
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Games/Games.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Add Game</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
	    <button class = "back" onclick='window.location.href="/Database/Games/Games.php"'><span>Back</span></button></br> 
		<h1>Add Games</h1>
		<?php
		echo '<form action = "" method = "POST" style="max-width:500px;margin:auto">', "\n",
			'<hr>', "\n",
			'<label for ="image"><b>Image Location</b></label>', "\n",
			'<input type="text" class = "input" name="image" required/><br/>', "\n",
			
			'<label for="gamename"><b>Game Name</b></label>', "\n",
			'<input type="text" class = "input" name="gamename" required/><br/>', "\n",
		
			'<label for="gamereleasedate"><b>Release Date</b></label>', "\n",
			'<input type="text" class = "input" name="gamereleasedate" required/><br/>', "\n",
			
			'<label for="gamedeveloper"><b>Developer ID</b></label>', "\n",
			'<input type="number" class = "input" name="gamedeveloper" required/><br/>', "\n",
			
			'<label for="gamepublisher"><b>Publisher ID</b></label>', "\n",
			'<input type="number" class = "input" name="gamepublisher" required/><br/>', "\n",
			
			'<label for="gamesales"><b>Sales</b></label>', "\n",
			'<input type="number" class = "input" name="gamesales" required/><br/>', "\n",
			
			'<label for="gamecost"><b>Cost</b></label>', "\n",
			'<input type="number" class = "input" name="gamecost" required/><br/>', "\n",
			'<hr>', "\n",
			
			'<button type="submit" name = "submit" class="submitbutton">Submit</button>',
		'<p></form></p>', "\n";

		if ( isset( $_POST[ 'submit' ] ) )
		{
			$imageloc = $_REQUEST[ 'image' ];
			$gamename = $_REQUEST[ 'gamename' ];
			$gamereleasedate = $_REQUEST[ 'gamereleasedate' ];
			$gamedeveloper = $_REQUEST[ 'gamedeveloper' ];
			$gamepublisher = $_REQUEST[ 'gamepublisher' ];
			$gamesales = $_REQUEST[ 'gamesales' ];
			$gamecost = $_REQUEST[ 'gamecost' ];

			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$query = "INSERT INTO Game (game_image_loc, Game_Name, Release_Date, Developer, Publisher, Sales, Cost) VALUES 
			('" . $imageloc . "','" . $gamename . "','" . $gamereleasedate . "','" . $gamedeveloper . "','" . $gamepublisher . "','" . $gamesales . "','" . $gamecost . "')";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Games/Games.php");
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