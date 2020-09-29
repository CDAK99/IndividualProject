 <?php
 session_start();
 $Platform_ID = $_SESSION["Platform_ID"];
 $Console_ID = $_SESSION["Console_ID"];
 $Game_ID = $_SESSION["Game_ID"];
 if(isset($_SESSION["loggedin"]) === false){
    header("location: /Database/Platforms/Platforms.php");
    exit;
}
?>
 <head>
    <meta charset="UTF-8" />
    <title>Edit Platform</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Platforms/Platforms.php"'><span>Back</span></button></br> 
		<h1>Edit Platform</h1>
		<form action = "" method = "POST" style="max-width:500px;margin:auto">
			<hr>
			<label for="gameid"><b>Game ID</b></label>
			<input type="number" class = "input" name="gameid" required value = <?php echo $Game_ID ?> /><br/>
			
			<label for="consoleid"><b>Console ID</b></label>
			<input type ="number" class = "input" name="consoleid" required value = <?php echo $Console_ID ?> /><br/>
			<hr>
			
			<button type="submit" name = "submit" class="submitbutton">Submit</button>
		</form>
		<?php

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

			$query = "UPDATE Platform SET Console_ID = '$consoleid', Game_ID = '$gameid' 
			WHERE Platform_ID = $Platform_ID";
			
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