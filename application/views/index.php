<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Apparel Television</title>
		

		<link href="<?php echo base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">

		
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>	
		<div class="header ">
			 <?php $this->load->view('home/header.php'); ?>
		</div>
		<div class="menu">
			 <?php $this->load->view('home/menu.php'); ?>
		</div>
		<div class="container">
			  <?php 
					if(isset($content))
					{
						echo $content;
					}
			?>
			<div class="footer">
			</div>
		</div>
		<div class="footer">
			 <?php $this->load->view('home/footer.php'); ?>
		</div>
	</body>
</html>

