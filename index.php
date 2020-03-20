<?php
$load = (isset($_GET['page'])&& $_GET['page'] !='')? $_GET['page'] : '';

include('google_config/google_read.php');
if($login_button == true){
    include('facebook_config/facebook_read.php');
?>

<html>
	<head>
		<title>Api Activity</title>
	</head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:800i|Oswald|Teko:600&display=swap">
<body>
	<p style="color: white;"> Logged in as <?php echo $_SESSION['user_first_name'] ?> <?php echo $_SESSION['user_last_name'] ?> </p>
	 <div class="w3-bar-block w3-dark-grey w3-center w3-margin w3-round">
			<li class="w3-bar-block w3-animate-left w3-large w3-button w3-green w3-hover-white  w3-text-decoration-none; text-align: center;"><a href="index.php?page=list">PRODUCT</a></li>
		 	<li class="w3-bar-block w3-animate-right w3-large w3-button w3-green w3-hover-white  w3-text-decoration-none; text-align: center;"><a href="index.php?page=create">CREATE</a></li>
	</div>
<?php
	switch($load){
		case 'list':
			require_once('showlist.php');
		break;
		case 'show_product':
			require_once('product_profile.php');
		break;	
		case 'create':
			require_once('form_create.php');
		break;
		case 'update':
			require_once('form_update.php');
		break;
		case 'delete':
			require_once('form_delete.php');
		break;
		default:
			require_once('showlist.php');
	}
?>
	</body>
	<a href="google_logout.php" onClick="location.href='facebook_logout.php'">Logout</a>
</html>
