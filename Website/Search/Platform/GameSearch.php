 <head>
    <meta charset="UTF-8" />
    <title>Search by Game</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
	    <button class = "back" onclick='window.location.href="/Search/Platform/Platform.php"'><span>Back</span></button></br> 
		<h1>Search by Game</h1>
		<?php
		echo '<form action = "/Search/Platform/GameSearchResults.php" method = "POST" style="max-width:500px;margin:auto">', "\n",
			'<hr>', "\n",
			'<label for="game"><b>Game Name</b></label>', "\n",
			'<input type="text" class="input" name="game" required/><br/>', "\n",
			'<hr>', "\n",
			
			'<button type="submit" name = "submit" class="submitbutton">Submit</button>',
		'<p></form></p>', "\n";
		?>
	  
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>