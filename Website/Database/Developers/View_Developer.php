 <head>
    <meta charset="UTF-8" />
    <title>View Developer</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Database/Developers/Developers.php"'><span>Back</span></button></br> 
		<h1>View Developer</h1>
		<?php
		$Image = $_GET[ 'item_image_loc' ];
		$Developer_ID = $_GET[ 'Developer_ID' ];
		$Developer_Name = $_GET[ 'Developer_Name' ];
		
		echo "<img src= $Image width = 100px height = 75px>";
		echo "<p>Developer ID: $Developer_ID</p>\n";
		echo "<p>Name: $Developer_Name</p>\n";
		
		session_start();
		$_SESSION["Image_loc"] = $Image;
		$_SESSION["Developer_ID"] = $Developer_ID;
		$_SESSION["Developer_Name"] = $Developer_Name;
		
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<p><button class = "viewbutton edit" onclick = "window.location.href =(\'/Database/Developers/Edit_Developer.php\');">Edit</button></p>', 
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

			$query = "DELETE FROM Developer WHERE Developer_ID = $Developer_ID";
			
			if(mysqli_query($link, $query)){
				header("location: /Database/Developers/Developers.php");
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