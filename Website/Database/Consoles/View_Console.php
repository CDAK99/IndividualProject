 <head>
    <meta charset="UTF-8" />
    <title>View Console</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Consoles/Consoles.php"'><span>Back</span></button></br> 
		<h1>View Console</h1>
		<?php
		$Image = $_GET[ 'item_image_loc' ];
		$Console_ID = $_GET[ 'Console_ID' ];
		$Console_Name = $_GET[ 'Console_Name' ];
		$Console_Brand = $_GET[ 'Console_Brand' ];
		$Console_ReleaseDate = $_GET[ 'Console_ReleaseDate' ];
		$Console_Sales = $_GET [ 'Console_Sales' ];
		$Console_Cost = $_GET [ 'Console_Cost' ];
		
		echo "<img src= $Image width = 150px height = 75px>";
		echo "<p>Console ID: $Console_ID</p>\n";
		echo "<p>Name: $Console_Name</p>\n";
		echo "<p>Release Date: $Console_ReleaseDate</p>\n";
		echo "<p>Developer: $Console_Brand</p>\n";
		echo "<p>Sales: $Console_Sales</p>\n";
		echo "<p>Cost: £$Console_Cost</p>";
		
		session_start();
		$_SESSION["Image_loc"] = $Image;
		$_SESSION["Console_ID"] = $Console_ID;
		$_SESSION["Console_Name"] = $Console_Name;
		$_SESSION["Console_Brand"] = $Console_Brand;
		$_SESSION["Console_ReleaseDate"] = $Console_ReleaseDate;
		$_SESSION["Console_Sales"] = $Console_Sales;
		$_SESSION["Console_Cost"] = $Console_Cost;
		
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<p><button class = "viewbutton edit" onclick = "window.location.href =(\'/Database/Consoles/Edit_Console.php\');">Edit</button></p>', 
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

			$query = "DELETE FROM Console WHERE Console_ID = $Console_ID";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Consoles/Consoles.php");
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