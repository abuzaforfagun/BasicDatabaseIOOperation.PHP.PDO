<?php
session_start();
	if($_POST['search_keyword'] || $_GET["page"]){
		if($_POST['search_keyword']){
			$_SESSION['keyword'] = $_POST['search_keyword'];
			$keyword = $_SESSION['keyword'];
		}else{
			$keyword = $_SESSION['keyword'];
		}
		$keyword = strtolower($keyword);
		include("lib/db.php");
		include("lib/Book.php");
		include("lib/Author.php");
		include("lib/Category.php");
		include("lib/Publisher.php");
		
		$query_for_count = @"SELECT COUNT(Books.Id) as Count
			FROM Books, Authors, Publishers, Categories
			WHERE
			(LCASE(Books.Name) like '%$keyword%' or LCASE(Books.Description) like '%$keyword%' or LCASE(Authors.Name) like '%$keyword%' or LCASE(Publishers.Name) like '%$keyword%' or LCASE(Categories.Name) like '%$keyword%')
			AND
			(Books.AuthorId = Authors.Id and Books.PublisherId = Publishers.Id and Books.CategoryId = Categories.Id)";
		$query_for_count = $dbh->prepare($query_for_count);
		$query_for_count->execute();
		$result_count = $query_for_count->fetchAll();		
		$total_number = $result_count[0]["Count"];
		if($_GET["page"]){
			
			$limit_from_get = $_GET["page"];
			$offset = $limit_from_get - 1;
			$take = 4;
			$query = @"
			SELECT 
			Books.*, Authors.Name as AuthorName, Publishers.Name as PublisherName, Categories.Name as CategoryName
			FROM Books, Authors, Publishers, Categories
			WHERE
			(LCASE(Books.Name) like '%$keyword%' or LCASE(Books.Description) like '%$keyword%' or LCASE(Authors.Name) like '%$keyword%' or LCASE(Publishers.Name) like '%$keyword%' or LCASE(Categories.Name) like '%$keyword%')
			AND
			(Books.AuthorId = Authors.Id and Books.PublisherId = Publishers.Id and Books.CategoryId = Categories.Id)
			LIMIT $offset, $take ";
		}else{
			
		$query = @"
			SELECT 
			Books.*, Authors.Name as AuthorName, Publishers.Name as PublisherName, Categories.Name as CategoryName
			FROM Books, Authors, Publishers, Categories
			WHERE
			(LCASE(Books.Name) like '%$keyword%' or LCASE(Books.Description) like '%$keyword%' or LCASE(Authors.Name) like '%$keyword%' or LCASE(Publishers.Name) like '%$keyword%' or LCASE(Categories.Name) like '%$keyword%')
			AND
			(Books.AuthorId = Authors.Id and Books.PublisherId = Publishers.Id and Books.CategoryId = Categories.Id)
			LIMIT 4 ";
		}
		$query = $dbh->prepare($query);
		$query->execute();
//		$result = $query->fetchAll(PDO::FETCH_CLASS, "book");
		$books = array();
		while (($row = $query->fetch(PDO::FETCH_ASSOC)) !== false) {
			
			$book           = new Book();
			$book->Id       = $row['Id'];
			$book->Name     = $row['Name'];
			$book->Description  = $row['Description'];
			$book->ImgUrl    = $row['ImgUrl'];
			$book->AuthorId      = $row['AuthorId'];
			$book->PublisherId   = $row['PublisherId'];
			$book->CategoryId    = $row['CategoryId'];
			$book->PublishDate    = $row['PublishDate'];
			$Author           = new Author();
			$Author->Name = $row['AuthorName'];
			
			$book->Author     = $Author;
			$books[] = $book;
		}
		
		
		$num_rows = $query->rowCount();
		
		$pages = ceil($total_number / 4);
		
		
	}
?>
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
					  <li class="active"><a href="index.php">Search</a></li>
					  <li><a href="design.php">Design</a></li>
					</ul>
				  </div>
				</nav>
			</div>
		</header>
		<content>
			<div class = "search_container">
				<form method="POST">
					<div class="form-group align_center">
						<input name="search_keyword" type = "search" class="input-sm" placeholder="Search keyword..."/>
						<input type = "submit" class = "btn btn-primary" value="Search now.."/><br/>
						
					</div>
				</form>
			</div>
			<div class = "search_result">
			<?php if($total_number){
			?>
				<label><?php echo $total_number ?> book(s) matched for your queries</label>
			<?php } ?>
			</div>
			<div class = "result">
			<?php
				foreach($books as $row){
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
				<?php if($pages > 0) {
					for($i =0; $i <= $pages; $i++){
					    $j = $i+1;
						echo "<a href = '?page=$j'> " . $j . "</a>" ;
					}
				}
					?>
					
			</div>
				
		</content>
		</div>
		
	</div>
	<div class="clearfix"></div>
	<footer>
			<p>Copyright &copy; 2017</p>
		</footer>
</body>
</html>