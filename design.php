<html>
	<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css"/>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
	<div class = " warpper_container">
	<div class="col-md-12">
		<header>
			<div class = "logo_warpper">
			</div>
			<div class = "menu_warpper">
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Library</a>
					</div>
					<ul class="nav navbar-nav">
					  <li><a href="index.php">Search</a></li>
					  <li><a href="design.php">Design</a></li>
					</ul>
				  </div>
				</nav>
			</div>
		</header>
		<content>
			
			<div class = "details_container">
				<div class = "heading">
					<h2>Library Book Store</h2>
				</div>
				<div class = "description">
					<p>Library book store is a web application developed with PHP, deisgned with Bootstrap, HTML and CSS. It can be used to display available books in library and also user can search books using thier name, author name or category name. No matter what you are looking for, but library book store will provide you the best match.</p>
				</div>
				<div class = "class_diagram">
					<h2>Class Diagram</h2>
					<img src = "ClassDiagram.png"/>
				</div>
				<div class = "class_diagram">
					<h2>Physical Data Model</h2>
					<img src = "DbDiagram.png"/>
				</div>
				<h3>Database Dump</h3>
				<div class = "db_dump">
					<ul class="nav nav-pills">
					  <li class="active"><a data-toggle="pill" href="#author">Author</a></li>
					  <li><a data-toggle="pill" href="#categories">Categories</a></li>
					  <li><a data-toggle="pill" href="#publishers">Publishers</a></li>
					  <li><a data-toggle="pill" href="#books">Books</a></li>
					  
					  
					</ul>

					<div class="tab-content">
					  <div id="author" class="tab-pane fade in active">
					  
						<h3>Author Table</h3>
						<table class = "table table-bordered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
							<?php
								include("lib/db.php");
								$query = $dbh->prepare("SELECT * FROM Authors");
								$query->execute();
								$result = $query->fetchAll();
								
							foreach($result as $row)
							{
								echo "<tr>";
								echo "<td>" . $row['Id'] . "</td>";
								echo "<td>" . $row['Name'] . "</td>";
								echo "<td>" . $row['Email'] . "</td>";
								echo "</tr>";
							}
							?>
							</tbody>
						</table>
					  </div>
					  
					  <div id="categories" class="tab-pane fade">
						<h3>Categories Table</h3>
						<table class = "table table-bordered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$query = $dbh->prepare("SELECT * FROM Categories");
								$query->execute();
								$result = $query->fetchAll();
								
							foreach($result as $row)
							{
								echo "<tr>";
								echo "<td>" . $row['Id'] . "</td>";
								echo "<td>" . $row['Name'] . "</td>";
								echo "</tr>";
							}
							?>
							</tbody>
						</table>
					  </div>
					  <div id="publishers" class="tab-pane fade">
						<h3>Publishers Table</h3>
						<table class = "table table-bordered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Address</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$query = $dbh->prepare("SELECT * FROM Publishers");
								$query->execute();
								$result = $query->fetchAll();
								
							foreach($result as $row)
							{
								echo "<tr>";
								echo "<td>" . $row['Id'] . "</td>";
								echo "<td>" . $row['Name'] . "</td>";
								echo "<td>" . $row['Email'] . "</td>";
								echo "<td>" . $row['Address'] . "</td>";
								echo "</tr>";
							}
							?>
							</tbody>
						</table>
						
					  </div>
					  <div id="books" class="tab-pane fade">
						<h3>Books Table</h3>
						<table class = "table table-bordered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Description</th>
									<th>ISBN</th>
									<th>CategoryId</th>
									<th>AuthorId</th>
									<th>PublisherId</th>
									<th>ImgUrl</th>
									<th>PublishDate</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$query = $dbh->prepare("SELECT * FROM Books");
								$query->execute();
								$result = $query->fetchAll();
								
							foreach($result as $row)
							{
								echo "<tr>";
								echo "<td>" . $row['Id'] . "</td>";
								echo "<td>" . $row['Name'] . "</td>";
								echo "<td>" . $row['Description'] . "</td>";
								echo "<td>" . $row['ISBN'] . "</td>";
								echo "<td>" . $row['CategoryId'] . "</td>";
								echo "<td>" . $row['AuthorId'] . "</td>";
								echo "<td>" . $row['PublisherId'] . "</td>";
								echo "<td>" . $row['ImgUrl'] . "</td>";
								echo "<td>" . $row['PublishDate'] . "</td>";
								echo "</tr>";
							}
							?>
							</tbody>
						</table>
					  </div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			
			</div>
		</content>
	</div>
	
	<div class="clearfix"></div>
	</div>
	<footer>
			<p>Copyright &copy; 2017</p>
		</footer>
</body>
</html>