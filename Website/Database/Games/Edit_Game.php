 <?php
 session_start();
 $Image_Location = $_SESSION["Image_loc"];
 $Game_ID = $_SESSION["Game_ID"];
 $Game_Name = $_SESSION["Game_Name"];
 $Game_ReleaseDate = $_SESSION["Game_ReleaseDate"];
 $Developer_ID = $_SESSION["Developer_ID"];
 $Publisher_ID = $_SESSION["Publisher_ID"];
 $Game_Sales = $_SESSION["Game_Sales"];
 $Game_Cost = $_SESSION["Game_Cost"];
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Games/Games.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Edit Game</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
	    <button class = "back" onclick='window.location.href="/Database/Games/Games.php"'><span>Back</span></button></br> 
		<h1>Edit Game</h1>
		<form action = "" method = "POST" style="max-width:500px;margin:auto">
			<hr>
			<label for="imageloc"><b>Image Location</b></label>
			<input type="text" class = "input" name="imageloc" required value = <?php echo "'$Image_Location'" ?> /><br/>
			
			<label for="gamename"><b>Game Name</b></label>
			<input type="text" class = "input" name="gamename" required value = <?php echo "'$Game_Name'" ?> /><br/>
			
			<label for="releasedate"><b>Release Date</b></label>
			<input type ="text" class = "input" name="releasedate" required value = <?php echo $Game_ReleaseDate ?> /><br/>
			
			<label for="developerid"><b>Developer ID</b></label>
			<input type="number" class = "input" name="developerid" required value = <?php echo $Developer_ID ?> /><br/>
			
			<label for="publisherid"><b>Publisher ID</b></label>
			<input type="number" class = "input" name="publisherid" required value = <?php echo $Publisher_ID ?> /><br/> 
			
			<label for="gamesales"><b>Sales</b></label>
			<input type="number" class = "input" name="gamesales" required value = <?php echo $Game_Sales ?> /><br/>
			
			<label for="gamecost"><b>Cost</b></label>
			<input type="number" class = "input" name="gamecost" required value = <?php echo $Game_Cost ?> /><br/>
			<hr>
			
			<button type="submit" name = "submit" class="submitbutton">Submit</button>
		</form>
		<?php

		if ( isset( $_POST[ 'submit' ] ) )
		{
			$imageloc = $_REQUEST[ 'imageloc' ];
			$gamename = $_REQUEST[ 'gamename' ];
			$gamereleasedate = $_REQUEST[ 'gamereleasedate' ];
			$gamedeveloper = $_REQUEST[ 'developerid' ];
			$gamepublisher = $_REQUEST[ 'publisherid' ];
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

			$query = "UPDATE Game SET game_image_loc = '$imageloc', Game_Name = '$gamename', Release_Date = '$gamereleasedate', 
			Developer = '$gamedeveloper', Publisher = $gamepublisher, Sales = '$gamesales', 
			Cost = '$gamecost' WHERE Game_ID = $Game_ID";
			
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