 <head>
    <meta charset="UTF-8" />
    <title>View Platform</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Platforms/Platforms.php"'><span>Back</span></button></br> 
		<h1>View Platform</h1>
		<?php
		$Platform_ID = $_GET[ 'Platform_ID' ];
		$Game_name = $_GET[ 'Game_name' ];
		$Console_Name = $_GET[ 'Console_Name' ];
		$Game_ID = $_GET[ 'Game_ID' ];
		$Console_ID = $_GET[ 'Console_ID' ];
		
		echo "<p>Platform ID: $Platform_ID</p>\n";
		echo "<p>Game Name: $Game_name</p>\n";
		echo "<p>Console Name: $Console_Name</p>";
		
		session_start();
		$_SESSION["Platform_ID"] = $Platform_ID;
		$_SESSION["Game_Name"] = $Game_name;
		$_SESSION["Console_Name"] = $Console_Name;
		$_SESSION["Game_ID"] = $Game_ID;
		$_SESSION["Console_ID"] = $Console_ID;
		
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<p><button class = "viewbutton edit"  onclick = "window.location.href =(\'/Database/Platforms/Edit_Platform.php\');">Edit</button></p>', 
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

			$query = "DELETE FROM Platform WHERE Platform_ID = $Platform_ID";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Platforms/Platforms.php");
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