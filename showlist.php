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
<br/>
<br/>
<br/>
<div class="w3-display-container w3-middle w3-margin w3-round">
	</br></br>
	<form action="index.php?page=list" method="POST">
	Search:<input type="text" name="search" placeholder="Search Product Name">
		<input type="submit" name="submit"><i class="fa fa-search"> </i>
	</form>
	<hr/>
  <table class="w3-table-all w3-round w3-hoverable">
    <tr class="w3-dark-grey">
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Category</th>
    </tr>
    <?php
      foreach($list as $result){
    ?>
    <tr>
     <td> <a href="index.php?page=show_product&id=<?php echo $result['id'];?>"> <?php echo $result['name']; ?> </a> </td>
      <td><?php echo $result['price']; ?> </td>
      <td><?php echo $result['description']; ?> </td>
      <td><?php echo $result['category_name'];?> </td>
    </tr>
    <?php
      }
    ?>
  </table>
 </div>
</html>
