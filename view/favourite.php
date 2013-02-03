<?php include('../controller/controller.php'); ?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>YakimbiICT Image Web Hosting Service</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!--[if IE 7]>
		<link rel="stylesheet" href="css/ie7.css" type="text/css">
	<![endif]-->

<script>
function addfavourite(url,favourite)
{

	$.ajax({
				type: "POST",
				url: "http://184.173.227.206/~websoftt/test/view/",
			data: {url:url,fav:favourite,addfav:1},
	
			success: function(msg)
			{
							  $('#success').html('Images successfully added to favourite');
	
			}
		});
}

function removefavourite(id)
{

	$.ajax({
				type: "POST",
				url: "http://184.173.227.206/~websoftt/test/view/",
			data: {id:id,rmvfav:1},
	
			success: function(msg)
			{
				
				 $('#des_'+id).remove();
	
			}
		});
}

function adddescription(id)
{
	desc=$('#desc_'+id).val();
	$.ajax({
				type: "POST",
				url: "http://184.173.227.206/~websoftt/test/view/",
			data: {id:id,desc:desc,adddesc:1},
	
			success: function(msg)
			{
				
				 $('#success1').html('Description added successfully');
	
			}
		});
}

</script>


</head>
<body>
	<div class="header">
		<div>
			<a href="index.php" style="color:#FFFFFF" id="logo">Yakimibi Image Web Hosting Service</a>
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="favourite.php">View Favourite Images</a>
				</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="body">
	<div class="about">

		    <div id="success1" style="color:#009933"></div>
			<div>
			<h3>Favourite Images</h3>
			<ul >
			<?php
			if(!empty($rows))
			{
				foreach($rows as $r)
				{
					
			?>
					<li id="des_<?php echo $r['id'];?>" style="margin-bottom:20px;"><div  style="width:200px; height:200px;"><img id="img_<?php echo $r['id'];?>" width="100" src="<?php echo $r['image_url'];?>" /></div>
					<?php if(in_array($d,$img)){?><div style="color:#FF0000">Favourite Image</div><?php } ?>
					<a  style="cursor:pointer; color:#FF0000" id="rmv_<?php echo $r['id'];?>" onClick="removefavourite('<?php echo $r['id'];?>')">Remove Favourite</a>	
					<textarea id="desc_<?php echo $r['id'];?>"><?php echo $r['description'];?></textarea><br/>
					<a  style="cursor:pointer" onClick="adddescription('<?php echo $r['id'];?>')">Submit</a>
				    </li>
			<?php		
					
				}
			}
			?>
			</ul>
			
			
			</div>
				
		</div>
	</div>
</div>	
	<div class="footer">
		<div>
			
			<div class="connect">
			</div>
		</div>
	</div>
</body>
</html>