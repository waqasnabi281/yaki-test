<?php

include('../model/social_api.php');
include('../model/favourite_images.php');

class controller {

	public function getimages($search,$service)
	{
		$func_name='fetch_'.$service.'_images_metadata';
		
		$social_api=new social_api();
		$results=$social_api->$func_name($search);
		return $results;
	
	
	}
	
}


if(isset($_POST['result']))
{
	
	$search=mysql_escape_string($_POST['search_term']);
	$service=mysql_escape_string($_POST['service']);
	$controller=new controller();
	$images=$controller->getimages($search,$service);
	$data=array();
	if($service=='facebook')
	{

				foreach($images as $i)
				{
					
						foreach($i as $img)
						{
							$data[]=$img->picture;
						
						}
				}
				
	}
	
	else if($service=='google')
	{
	
				$data1=$images->items;
				foreach($data1 as $i)
				{
				
					$data2=$i->pagemap->cse_image;
					if(!empty($data2))
					{
						foreach($data2 as $d)
						{
						
							$data[]=$d->src;
						}
					
					}			
				}
				
				$width='width=300';
				$height='height=300';

	}	
	
	else if($service=='twitter')
	{
				$data1=$images->results;
				foreach($data1 as $d)
				{
				
					$data[]=$d->profile_image_url;
				
				}
	}	
	
	
	else if($service=='flicker')
	{
	
		
		$data=$images;
	
	
	
	}
	

}

$favourite=new favourite_images();

if($_POST['addfav']==1)
{
	$url=mysql_escape_string($_POST['url']);
	$fav=mysql_escape_string($_POST['fav']);
	if($favourite->addfavouriteimages($url,$fav))
	{
		
		echo "1";

	
	}
	exit();
}


if($_POST['rmvfav']==1)
{
	$id=mysql_escape_string($_POST['id']);
	
	if($favourite->deletefavouriteimages($id))
	{
		
		echo "1";

	
	}
	exit();
}


if($_POST['adddesc']==1)
{
	$id=mysql_escape_string($_POST['id']);
	$desc=mysql_escape_string($_POST['desc']);
	
	if($favourite->addfavouriteimagedescription($id,$desc))
	{
		
		echo "1";

	
	}
	exit();
}


$rows=$favourite->getallfavouriteimages();
if(!empty($rows))
{
	$img=array();
	foreach($rows as $r)
	{
	$img[]=$r['image_url'];
	}
}
?>