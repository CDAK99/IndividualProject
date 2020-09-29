 <head>
    <meta charset="UTF-8" />
	<?php
		session_start();
		if(isset($_SESSION["loggedin"]) === false){
			header("location: /Index.php");
			exit;
		}
	?>
    <title>Manager Index</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<h1>Manager Page</h1></br>
		<button class = "button blue" onclick="window.location.href='/Database/Database_List.php'">View Database</button>
		<button class = "button blue" onclick="window.location.href='/Search/Search_Index.php'">Search Database</button>
		<button class = "button blue" onclick="window.location.href='/Manager/Download/Download.php'">Downloads</button>
		<button class = "button blue" onclick="window.location.href='/Manager/Logout.php'">Logout</button>
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>