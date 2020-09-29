 <head>
    <meta charset="UTF-8" />
    <title>View Game</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Games/Games.php"'><span>Back</span></button></br> 
		<h1>View Game</h1>
		<?php
		$Image = $_GET[ 'game_image_loc' ];
		$Game_ID = $_GET[ 'Game_ID' ];
		$Game_name = $_GET[ 'Game_name' ];
		$Game_ReleaseDate = $_GET[ 'Game_ReleaseDate' ];
		$Developer_Name = $_GET [ 'Developer_Name' ];
		$Publisher_Name = $_GET [ 'Publisher_Name' ];
		$Game_Sales = $_GET [ 'Game_Sales' ];
		$Game_Cost = $_GET [ 'Game_Cost' ];
		$Publisher_ID = $_GET [ 'Publisher_ID' ];
		$Developer_ID = $_GET [ 'Developer_ID' ];
		
		echo "<img src= $Image width = 100px height = 125px>";
		echo "<p>Game ID: $Game_ID</p>\n";
		echo "<p>Name: $Game_name</p>\n";
		echo "<p>Release Date: $Game_ReleaseDate</p>\n";
		echo "<p>Developer: $Developer_Name</p>\n";
		echo "<p>Publisher: $Publisher_Name</p>\n";
		echo "<p>Sales: $Game_Sales</p>\n";
		echo "<p>Cost: £$Game_Cost</p>";
		
		session_start();
		$_SESSION["Image_loc"] = $Image;
		$_SESSION["Game_ID"] = $Game_ID;
		$_SESSION["Game_Name"] = $Game_name;
		$_SESSION["Game_ReleaseDate"] = $Game_ReleaseDate;
		$_SESSION["Developer_ID"] = $Developer_ID;
		$_SESSION["Publisher_ID"] = $Publisher_ID;
		$_SESSION["Game_Sales"] = $Game_Sales;
		$_SESSION["Game_Cost"] = $Game_Cost;
		
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<p><button class = "viewbutton edit" onclick = "window.location.href =(\'/Database/Games/Edit_Game.php\');">Edit</button></p>',
			'<form action = "" method = "POST">',
			'<button class = "viewbutton delete" type = "submit" name = "delete"> Delete</button>',
			'</form>',
			'</div>', '<div class="footer">',
			'</div>';
		
		if ( isset( $_POST[ 'delete' ] ) )
		{
			$dbname = 'ck17427';
			$dbuser = 'ck17427';
			$dbpass = 'password';
			$dbhost = 'localhost';

			$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
			or die( "Unable to Connect to '$dbhost'" );

			mysqli_select_db( $link, $dbname )
			or die("Could not open the db '$dbname'");

			$query = "DELETE FROM Game WHERE Game_ID = $Game_ID";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Games/Games.php");
			} else {
				echo "ERROR: Could not execute $sql. " .
				mysqli_error($link);
			}
			
			mysqli_close($link);
		}
		exit;
		}
		?>
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>