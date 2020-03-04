<?php
	$load = (isset($_GET['page'])&& $_GET['page'] !='')? $_GET['page'] : '';
	$jsonCat = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$catData = json_decode($jsonCat,true);
	$category = $catData['records'];
?>
<html>
<br/>
<br/>
<br/>
<div class="w3-container">
<form action="pro_create.php" method="POST">
	<form class="w3-container w3-green">
	<label>Create Product</label>
	Name:<br/><input class="w3-input w3-border w3-round-large" type="text" name="name" placeholder="Enter Product Name"/><br/><br/>
	Description:<br/><textarea class="w3-input w3-border w3-round-large" name="description" placeholder="Enter Item Description"/></textarea><br/><br/>
	Price:<br/><input class="w3-input w3-border w3-round-large" type="number" name="price" placeholder="Enter Product Price"/><br/><br/>
	Category:<select class="w3-select w3-border" name="category">
		<option value="">--Select Category--</option>
	<?php
      foreach($category as $cview){
    ?>
		<option value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
    <?php
      }
    ?>
	</select>
	<br/><br/><input class="w3-button onclick="myFunction()" w3-right w3-round-large w3-green" type="submit" name="submit" value="Create Product"/>
	<script>
	function myFunction() {
 	 alert("Product Succesfully Created!");
	}
</script>
</form>
</div>
</html>
