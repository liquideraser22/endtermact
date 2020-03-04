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
	<div class="w3-container w3-show">
	<input class="w3-border w3-right w3-round-large" type="text"name="search" placeholder="Search product name"> 
		<button class="w3-button w3-right w3-light-grey w3-round w3-animate-zoom" type="submit" name="submit"><i class='fa fa-search'></i></button>
		</div>	
	</form>
	<hr/>
  <table class="w3-table-all w3-round w3-hoverable">
    <tr class="w3-dark-grey">
      <th class="w3-center w3-animate-top">Product Name</th>
      <th class="w3-center w3-animate-top">Price</th>
      <th class="w3-center w3-animate-top">Description</th>
      <th class="w3-center w3-animate-top">Category</th>
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
