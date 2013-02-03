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

		<div>
			<h2 style="text-align:center">Search Criteria</h2>
			<p>
			<form action="" method="post"/>
				<table align="center">
				
				<tr>
				<td><label>Search Term</label></td>
				<td><input type="text" name="search_term"/></td>
				</tr>
				
				<tr>
				<td><label>Select a Service</label></td>
				<td><select name="service">
				<option value="google">Google</option>
				<option value="twitter">Twitter</option>
				<option value="facebook">Facebook</option>
				<option value="flicker">Flicker</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>
				<input type="hidden" name="result" value="1"/>
				<input type="submit" value="Search"/></td>
				</tr>	
				</table>
				</form>
			</p>
			<div id="success" style="color:#009933"></div>			
			<div style="width:800px; clear:both;">
			<ul >
			<?php
			if(!empty($data))
			{
				foreach($data as $d)
				{
					if($d!='')
					{
					
			?>
							<li style="margin-bottom:20px;"><div  style="width:200px; height:200px;"><img width="100" src="<?php echo $d;?>" /></div>
							<?php if($img!=''){?>
							<?php if(in_array($d,$img)){?><div style="color:#FF0000">Favourite Image</div><?php } ?>
							<?php if(!in_array($d,$img)){?><a  style="cursor:pointer" onClick="addfavourite('<?php echo $d;?>',1)">Add To Favourite</a><?php } ?>								 <?php } 
							else {?>
							<a  style="cursor:pointer" onClick="addfavourite('<?php echo $d;?>',1)">Add To Favourite</a>
							<?php } ?>
							
								</li>
			<?php		
					}
					
				}
			}
			else
			{
			?>
				<div>No Results Found!</div>			
			<?php
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