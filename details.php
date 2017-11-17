<?php
	$id = $_GET["id"];
	include("lib/db.php");
	include("lib/Book.php");
	include("lib/Author.php");
	include("lib/Category.php");
	include("lib/Publisher.php");
	
	$sql = @"SELECT 
			Books.*, 
			Authors.Name as AuthorName, 
			Authors.Email as AuthorEmail, 
			Publishers.Name as PublisherName, 
			Publishers.Email as PublisherEmail,
			Publishers.Address as PublisherAddress,
			Categories.Name as CategoryName
			FROM 
			Books, Authors, Publishers, Categories
			WHERE
			Books.Id = $id 
			and 
			Authors.Id = Books.AuthorId 
			and 
			Publishers.Id = Books.PublisherId 
			and 
			Categories.Id = Books.CategoryId";
			
	
	
	$query = $dbh->prepare($sql);
	$query->execute();
	
	$book = new Book();
	while (($row = $query->fetch(PDO::FETCH_ASSOC)) !== false) {
		$book = new Book();
		$book->Id       = $row['Id'];
		$book->Name     = $row['Name'];
		$book->Description  = $row['Description'];
		$book->ImgUrl    = $row['ImgUrl'];
		$book->AuthorId      = $row['AuthorId'];
		$book->PublisherId   = $row['PublisherId'];
		$book->CategoryId    = $row['CategoryId'];
		$book->PublishDate    = $row['PublishDate'];
		$book->ISBN			= $row["ISBN"];	
		$Author           	= new Author();
		$Author->Name = $row['AuthorName'];
		$Author->Email = $row['AuthorEmail'];
		$Category			= new Category();
		$Category->Name = $row["CategoryName"];
		$Publisher			= new Publisher();
		$Publisher->Name = $row["PublisherName"];
		$Publisher->Email = $row["PublisherEmail"];
		$Publisher->Address = $row["PublisherAddress"];
		$book->Author     	= $Author;
		$book->Category 	= $Category;
		$book->Publisher	= $Publisher;
	}
	
	$sql_for_related =@"SELECT 
			Books.*, 
			Authors.Name as AuthorName, 
			Authors.Email as AuthorEmail, 
			Publishers.Name as PublisherName, 
			Publishers.Email as PublisherEmail,
			Publishers.Address as PublisherAddress,
			Categories.Name as CategoryName
			FROM 
			Books, Authors, Publishers, Categories
			WHERE
			Books.CategoryId = $book->CategoryId
			and 
			Authors.Id = Books.AuthorId 
			and 
			Publishers.Id = Books.PublisherId 
			and 
			Categories.Id = Books.CategoryId";
			
	$queryforrelated = $dbh->prepare($sql_for_related);
	$queryforrelated->execute();
	
	
	$relatedbooks = array();
	while (($row = $queryforrelated->fetch(PDO::FETCH_ASSOC)) !== false) {
		
		$relatedbook           = new Book();
		$relatedbook->Id       = $row['Id'];
		$relatedbook->Name     = $row['Name'];
		$relatedbook->Description  = $row['Description'];
		$relatedbook->ImgUrl    = $row['ImgUrl'];
		$relatedbook->AuthorId      = $row['AuthorId'];
		$relatedbook->PublisherId   = $row['PublisherId'];
		$relatedbook->CategoryId    = $row['CategoryId'];
		$relatedbook->PublishDate    = $row['PublishDate'];
		$Author           = new Author();
		$Author->Name = $row['AuthorName'];
		
		$relatedbook->Author     = $Author;
		$relatedbooks[] = $relatedbook;
	}
?>
<html>
	<title><?php echo $book->Name ?></title>
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
				<div class="col-md-6">
					<img src ="img/<?php echo $book->ImgUrl ?>"/>
				</div>
				<div class="col-md-6">
					<h2><?php echo $book->Name ?></h2>
					<p class="category_name"><?php echo $book->Category->Name ?></p>
					
					<p><?php echo $book->Description ?></p>
					<hr/>
					<table>
						<tr>
							<td style="min-width:100px;">Author</td>
							<td><b><?php echo $book->Author->Name ?></b></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $book->Author->Email ?></td>
						</tr>
						<tr>
							<td colspan = "2"><hr/></td>
						</tr>
						<tr>
							<td>Publisher</td>
							<td><b><?php echo $book->Publisher->Name ?></b></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $book->Publisher->Email ?></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><?php echo $book->Publisher->Address ?></td>
						</tr>
						<tr>
							<td colspan = "2"><hr/></td>
						</tr>
						<tr>
							<td>ISBN</td>
							<td><?php echo $book->ISBN ?></td>
						</tr>
						<tr>
							<td>Published Date</td>
							<td><?php echo $book->PublishDate ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class = "col-md-12">
				<h3>Related Books</h3>
				<?php
				foreach($relatedbooks as $row){
					echo "<div class = ' col-md-3'>";
					echo "<a href='details.php?id=$row->Id'>";
					echo "<div class='result_item'>";
					echo "<div class='image'>";
					print  "<img src = 'img/" . $row->ImgUrl . "'/>";
					echo "</div>";
					echo "<span class = 'book_name'>" . $row->Name . "</span><br/>";
					echo "<span class = 'author_name'>" . $row->Author->Name . "</span>";
					echo "</div>";
					echo "</a>";
					echo "</div>";
				}
			?>
				<div class="clearfix"></div>
			</div>
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