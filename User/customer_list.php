<?php
	// Start the session
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Customers</title>
	<!-- For-Mobile-Apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps -->

	<!-- Style -->
	<link rel="stylesheet" href="css/user-dashboard.css" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/user-dashboard.js"></script>
	<link rel="stylesheet" type="text/css" href="searchBoxPlugin/css/tablesort.css">
	<link rel="stylesheet" type="text/css" href="searchBoxPlugin/css/styles.css">
	<!-- Web-Fonts -->
		<link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<!-- //Web-Fonts -->
	<?php 
		include 'business_edit_nav.html';
		require '../config.php';		
	?>		
	<style type="text/css">
		.customerTable{
			width: 100%;
			height: 400px;
			background-color: #ECF7A7;
			padding: 3%;
			overflow: auto;
			text-align: center;
			
		}
		.customerTable th{
			text-align: center;
		}
		body{
			padding: 0px!important;
		}
		.custTable{
			border: 1px solid green;
			padding: 2%;
			border-collapse: collapse!important;
    		border-spacing: 1px!important;
		}
		.heading{
			font-size: 150%;
			margin-bottom: 3%;
		}
	</style>
</head>
<body>
	<h1></h1>
	<div class="container">

		<div class="customerTable">
			<p class="heading">Your customers</p>
			<?php 
				$userid = $_SESSION['userid']; 

		$query = "SELECT c.userid, c.balance, c.businessid, u.firstname, u.lastname
					  FROM customerbusiness c, userdetail u
					  WHERE u.userid = c.userid and c.businessid = ".$userid." order by c.modified desc";
			$result = $mysqli->query($query);
			?>
			<table border='1' class="table-sort table-sort-search table-sort-show-search-count">
				<thead>
						<tr>
							<th>Name</th>
							<th>Rewards</th>
						</tr>
				</thead>
				
			<?php
			if ($result->num_rows > 0) {
				while($row = $result->fetch_array()){	  
			?>
				<tr>
					<td><?php echo $row["firstname"]." ".$row["lastname"];?></td>
					<td><?php echo $row["balance"];?></td>	
				</tr>	
					<?php	
				}
			}	
			?>
		</table>	
		</div>
	</div>
	<?php include 'footer.php' ?>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script> 
<script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script> 
<script type="text/javascript" src="searchBoxPlugin/tablesort.js"></script> 
<script type="text/javascript">
            // For Demo Purposes
            $(function () {
                $('table.table-sort').tablesort();
                hljs.initHighlightingOnLoad(); // Syntax Hilighting
            });
        </script>
</body>
</html>