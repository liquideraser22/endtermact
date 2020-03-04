<?php
 $id = $_GET['id'];
 $json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
 $data = json_decode($json,true);
 $details = array('records' => $data);
 $result = $details['records'];
?>
<html>
<br/>
<br/>
<br/>
<br/>
<div class="w3-container">
	<div class="w3-card-4">
		<header class="w3-container w3-dark-grey w3-round-large">
			<h1><b><?php echo $result['name']; ?></b></h1>
		</header>
	<table class="w3-table-all w3-round w3-hoverable">
		 <tr class="w3-dark-grey">
		<th class="w3-center w3-animate-top"><?php echo $result['description']; ?> </th>
		<th class="w3-center w3-animate-top"><?php echo $result['price']; ?> </th>
		<th class="w3-center w3-animate-top"><?php echo $result['category_name'];?> </th>
	  </tr>
	</div>
		<footer class="w3-container w3-dark-grey w3-padding-small w3-round-large">
			<a class="w3-button w3-round-large w3-right w3-teal w3-margin" href="form_update.php?id=<?php echo $id ?>">Edit</a>
			<a class="w3-button w3-round-large w3-right w3-red w3-margin" href="pro_delete.php?id=<?php echo $id ?>">Delete</a>
		</footer>
	</div>
  </div>
</html>
