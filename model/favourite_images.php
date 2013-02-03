<?php
include('connection.php');
class favourite_images {
		
  public function addfavouriteimages($imageurl,$favourite)
  {
  
  		$sql="insert into favourite_images(image_url,favourite)values('".$imageurl."','".$favourite."')";
		mysql_query($sql);
   		return 1;
  }
  
  
  public function deletefavouriteimages($id)
  {
  
  		$sql="delete from favourite_images where id=".$id."";
		mysql_query($sql);
		return 1;
  }
  
  
  public function addfavouriteimagedescription($id,$description)
  {
  
  		$sql="update favourite_images set description='".$description."' where id=".$id."";
		mysql_query($sql);
  		return 1;
  }
  
  public function getallfavouriteimages()
  {
  
  		$sql="select * from favourite_images where favourite=1";
		$results=mysql_query($sql);
		$data=array();
		while($rows=mysql_fetch_assoc($results))
		{
		
			$data[]=$rows;
		
		
		}
		
  		return $data;
  }
  
}

?>