<?php
 $json = file_get_contents('http://rdapi.herokuapp.com/product/read.php');
 $data = json_decode($json,true);
 
 $search = $_POST['search'];
 
 if(isset($search)){
	$jsearch = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$search);
	$res = json_decode($jsearch,true);

	$list = $res['records'];
	
 }else{
	$list = $data['records'];
 }
 
?>
<html>
<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<br/>
<div class="w3-container w3-margin w3-round">
	</br></br>
	<form action="index.php?page=list" method="POST">
	<div class="w3-display-container w3-display-topmiddle">
	Search:<input class="text" name="search" placeholder="Product Name">
		<button class="w3-button w3-blue-grey" type="submit" name="submit"><i class='fas fa-paper-plane'></i></button>
		</div>	
	</form>
	<hr/>
  <table class="w3-table-all w3-round w3-hoverable">
    <tr class="w3-dark-grey">
      <th class="w3-center">Product Name</th>
      <th class="w3-center">Price</th>
      <th class="w3-center">Description</th>
      <th class="w3-center">Category</th>
    </tr>
    <?php
      foreach($list as $result){
    ?>
    <tr>
      <td class="w3-center"> <a href="index.php?page=show_product&id=<?php echo $result['id'];?>"> <?php echo $result['name']; ?> </a> </td>
      <td class="w3-center"><?php echo $result['price']; ?> </td>
      <td class="w3-center"><?php echo $result['description']; ?> </td>
      <td class="w3-center"><?php echo $result['category_name'];?> </td>
    </tr>
    <?php
      }
    ?>
  </table>
 </div>
</html>
