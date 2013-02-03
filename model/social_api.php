<?php
require_once("../library/phpFlickr.php");
class social_api {


	public function  fetch_google_images_metadata($search)
	{
	
		$url='https://www.googleapis.com/customsearch/v1?key=AIzaSyCyEHtm102cQ7AFc-aNjJq_FvXj3LewNjo&cx=011737558837375720776:mbfrjmyam1g&q='.$search.'&alt=json&num=10';
		$results=$this->getdatabycurl($url);
		return json_decode($results);
	}
	
	public function  fetch_facebook_images_metadata($search)
	{
	
		$url='http://graph.facebook.com/'.$search.'/photos';
		$results=$this->getdatabycurl($url);
		return json_decode($results);
		
	}
	
	
	
	public function  fetch_twitter_images_metadata($search)
	{
	
		$url='http://search.twitter.com/search.json?q='.$search.'&size=bigger';
		$results=$this->getdatabycurl($url);
		return json_decode($results);

	}
	
	
	public function  fetch_flicker_images_metadata($search)
	{
		$f = new phpFlickr("a2f38fc0f6a97dcf29b98ec1f77f79b2");
		$user = $f ->people_findByUsername($search);
		$user_url = $f->urls_getUserPhotos($user['id']);
		$photos = $f->photos_getRecent();
		$count=0;
		if(!empty($photos))
		{
			foreach ($photos['photos'] as $photo)
			{
				if(is_array($photo))
				{
					foreach($photo as $p)
					{
					 
						 $data[]=$f->buildPhotoURL($p, "_z");
						 $count++;
						 if($count==20)
						 {
						 
							break;
						 
						 }
					}
				}
			}
		
	   }
		
		return $data;
	}
	
	public function getdatabycurl($url)
	{
	
		$ch = curl_init();   
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	
	}
	
	
	
}