 <head>
    <meta charset="UTF-8" />
    <title>Home</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<?php
		session_start();
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			echo '<button class = "back" onclick="window.location.href=(\'/Manager/Manager_Index.php\');"><span>Back</span></button></br>';
		}
		?>
		<h1>Database List</h1></br>
		<button class = "button blue" onclick="window.location.href='Consoles/Consoles.php'">View Consoles</button>
		<button class = "button blue" onclick="window.location.href='Developers/Developers.php'">View Developers</button>
		<button class = "button blue" onclick="window.location.href='Games/Games.php'">View Games</button>
		<button class = "button blue" onclick="window.location.href='Platforms/Platforms.php'">View Platforms</button>
		<button class = "button blue" onclick="window.location.href='Publishers/Publishers.php'">View Publishers</button>
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>