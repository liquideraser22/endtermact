<?php
	$load = (isset($_GET['page'])&& $_GET['page'] !='')? $_GET['page'] : '';
	$id = $_GET['id'];
	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
	$data = json_decode($json,true);
	$details = array('records' => $data);
	$result = $details['records'];
	//category
	$jsonCat = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$catData = json_decode($jsonCat,true);
	$category = $catData['records'];
?>
<html>
<head>
<title></title>
</head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:800i|Oswald|Teko:600&display=swap">
<br/>
<br/>
<br/>
<div class="w3-container">
<form action="pro_update.php?id=<?php echo $id ?>" method="POST">
	<form class="w3-container w3-green"
	Name:<br/><input class="w3-input w3-border w3-round-large" type="text" name="name" value="<?php echo $result['name'];?>"/><br/><br/>
	Description:<br/><textarea class="w3-input w3-border w3-round-large" name="description"><?php echo $result['description']; ?></textarea><br/><br/>
	Price:<br/><input class="w3-input w3-border w3-round-large" type="number" name="price" value="<?php echo $result['price']; ?>"/><br/><br/>
	Category:<select class="w3-select w3-border" name="category">
		<option value="<?php echo $result['category_id'];?>"><?php echo $result['category_name'];?></option>
	<?php
      foreach($category as $cview){
    ?>
		<option value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
    <?php
      }
    ?>
	</select>
	<br/><br/><input class="w3-button w3-round-large w3-green" type="submit" name="submit" value="Done"/> <input class="w3-button w3-round-large w3-red" type="submit" name="submit" value="Cancel"/>	
</form>
</div>
</html>
