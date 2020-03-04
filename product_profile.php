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
		<header class="w3-container w3-dark-grey w3-round-large">
			<h1><b><?php echo $result['name']; ?></b></h1>
		</header>
		<table class="w3-table-all w3-round w3-hoverable">
		<tr class="w3-dark-grey">
		<th class="w3-center w3-animate-top">Price</th>
     	       	<th class="w3-center w3-animate-top">Description</th>
      		<th class="w3-center w3-animate-top">Category</th>
		</tr>	
		
		<tr>
		<td class="w3-center"><?php echo $result['description']; ?></td>
		<td class="w3-center"><?php echo $result['price']; ?> </td>
		<td class="w3-center"><?php echo $result['category_name'];?> </td>
	 	 </tr>
		<footer class="w3-container w3-dark-grey w3-padding-small w3-round-large">
			<a class="w3-button w3-round-large w3-right w3-teal w3-margin" href="form_update.php?id=<?php echo $id ?>">Edit</a>
			<a class="w3-button w3-round-large w3-right w3-red w3-margin" href="pro_delete.php?id=<?php echo $id ?>">Delete</a>
		</footer>
	</div>
  </div>
</html>
