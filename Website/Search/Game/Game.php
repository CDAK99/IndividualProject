 <head>
    <meta charset="UTF-8" />
    <title>Search for a Game</title>
	<link rel="stylesheet" href="/Css.css">
</head>
  <body>
    <div class="container">
	  <div class="header">
		<a href="/Index.php">Home</a>
      </div>
      <div class="content">
		<button class = "back" onclick='window.location.href="/Search/Search_Index.php"'><span>Back</span></button></br>
		<h1>Search for a Game</h1>
		<button class = "button blue" onclick="window.location.href='/Search/Game/DeveloperSearch.php'">Search by Developer</button>
		<button class = "button blue" onclick="window.location.href='/Search/Game/NameSearch.php'">Search by Name</button>
		<button class = "button blue" onclick="window.location.href='/Search/Game/PublisherSearch.php'">Search by Publisher</button>
		<button class = "button blue" onclick="window.location.href='/Search/Game/ReleaseDateSearch.php'">Search by Release Date</button>
	  </div>
	  <div class="footer">
	  </div>
	</div>
   </body>